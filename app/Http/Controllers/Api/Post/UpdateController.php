<?php

namespace App\Http\Controllers\Api\Post;


use App\Http\Requests\PostApiRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class UpdateController extends BaseApiController
{
    /**
     * @param  PostApiRequest  $request
     * @param  Post  $post
     * @return PostResource|JsonResponse
     */
    public function __invoke(PostApiRequest $request, Post $post)
    {
        $postData = $this->service->updatePost($request, $post);
        return $postData instanceof Post ? new PostResource($postData) : $postData;
    }
}
