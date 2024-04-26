<?php

namespace App\Services\Api;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
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
     * @param  Post  $post
     * @return Post
     */
    public function showAndEdit(Post $post): Post
    {
        return Post::with(['category', 'tags'])->find($post->id);
    }

    /**
     * @param  PostRequest  $request
     * @return Post
     */
    public function storePost(PostRequest $request): Post
    {
        $tags = $request->tags;
        $data = $request->replace($request->except('tags'))->toArray();

        $post = Post::create($data);
        $post->tags()->sync($tags);

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
     * @return Collection
     */
    public function allCategories(): Collection
    {
        return Category::all();
    }

    /**
     * @return Collection
     */
    public function allTags(): Collection
    {
        return Tag::all();
    }

}
