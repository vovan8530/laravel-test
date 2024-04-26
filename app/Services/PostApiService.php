<?php

namespace App\Services;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class PostApiService
{
    /**
     * @param  FilterRequest  $request
     * @return LengthAwarePaginator
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(FilterRequest $request): LengthAwarePaginator
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        return Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * @param  PostRequest  $request
     * @return Post|string
     */
    public function storePost(PostRequest $request): Post|string
    {

        try {
            DB::beginTransaction();

            $data = $request->validated();
            $category = $data['category'] ?? null;
            $tags = $data['tags'];

            unset($data['category'], $data['tags']);

            $data['category_id'] = $this->categoryId($category);
            $tagIds = $this->tagIds($tags);

            $post = Post::create($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }

        return $post;
    }

    /**
     * @param  PostRequest  $request
     * @param  Post  $post
     * @return Post
     */
    public function updatePost(PostRequest $request, Post $post): Post
    {
        $tags = $request->tags;
        $data = $request->replace($request->except('tags'))->toArray();

        $post->update($data);

        $post->tags()->sync($tags);

        return $post;
    }

    /**
     * @param  Post  $post
     * @return bool|null
     */
    public function destroyPost(Post $post): bool|null
    {
        return $post->delete();
    }

    /**
     * @param $category
     * @return int
     */
    private function categoryId($category): int
    {
        $category = !isset($category['id']) ? Category::create($category) : Category::find($category['id']);
        return $category->id;
    }

    /**
     * @param array $tags
     * @return array
     */
    private function tagIds(array $tags): array
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
}
