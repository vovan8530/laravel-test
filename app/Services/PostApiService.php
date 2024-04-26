<?php

namespace App\Services;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostApiRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;


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
     * @param  PostApiRequest  $request
     * @return Post|JsonResponse
     */
    public function storePost(PostApiRequest $request): Post|JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            $category = $data['category'];
            $tags = $data['tags'];

            unset($data['category'], $data['tags']);

            $categoryId = $this->getCategoryIdOrCreateNew($category);
            $tagIds = $this->getTagIdsOrCreateNew($tags);

            $post = Post::create($this->postMergeCategoryId($data, $categoryId));
            $post->tags()->attach($tagIds);
            DB::commit();

            return $post;

        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * @param  PostApiRequest  $request
     * @param  Post  $post
     * @return Post|JsonResponse
     */
    public function updatePost(PostApiRequest $request, Post $post): Post|JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $category = $data['category'];
            $tags = $data['tags'];

            unset($data['category'], $data['tags']);

            $categoryId = $this->updateCategoryOrCreateNew($category);
            $tagIds = $this->updateTagsOrCreateNew($tags);

            if (!$post->exists()) {
                throw new \Exception('Post does not exist.');
            }

            $post->update($this->postMergeCategoryId($data, $categoryId));

            $post->tags()->sync($tagIds);

            DB::commit();

            return $post->fresh();

        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json(['error' => $exception->getMessage()], 500);
        }
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
    private function getCategoryIdOrCreateNew($category): int
    {
        $category = !isset($category['id']) ? Category::create($category) : Category::find($category['id']);
        return $category->id;
    }

    /**
     * @param  array  $tags
     * @return array
     */
    private function getTagIdsOrCreateNew(array $tags): array
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }


    /**
     * @param $category
     * @return int
     * @throws \Exception
     */
    private function updateCategoryOrCreateNew($category): int
    {
        if (isset($category['id'])) {
            $newCategory = Category::findOrFail($category['id']);
            $newCategory->update($category);
            $category = $newCategory->fresh();
        } else {
            $category = Category::create($category);
        }

        return $category->id;
    }

    /**
     * @param  array  $tags
     * @return array
     * @throws \Exception
     */
    private function updateTagsOrCreateNew(array $tags): array
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (isset($tag['id'])) {
                $newTag = Tag::findOrFail($tag['id']);
                $newTag->update($tag);
                $tag = $newTag->fresh();
                $tagIds[] = $tag->id;
            }else{
                $tag = Tag::create($tag);
                $tagIds[] = $tag->id;
            }
        }
        return $tagIds;
    }

    /**
     * @param $post
     * @param $categoryId
     * @return array
     */
    private function postMergeCategoryId($post, $categoryId): array
    {
        return array_merge($post, ['category_id' => $categoryId]);
    }
}
