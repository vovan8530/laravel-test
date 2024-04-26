<?php

namespace App\Http\Controllers\Api\Post;


use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseApiController
{
    /**
     * @param  PostRequest  $request
     * @return PostResource|string
     */
    public function __invoke(PostRequest $request)
    {
        $post = $this->service->storePost($request);
        return $post instanceof Post ? new PostResource($post) : $post;
    }
}
