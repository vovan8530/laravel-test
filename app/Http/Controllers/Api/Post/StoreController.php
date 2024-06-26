<?php

namespace App\Http\Controllers\Api\Post;


use App\Http\Requests\PostApiRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class StoreController extends BaseApiController
{
    /**
     * @param  PostApiRequest  $request
     * @return PostResource|JsonResponse
     */
    public function __invoke(PostApiRequest $request)
    {
        $postData = $this->service->storePost($request);
        return $postData instanceof Post ? new PostResource($postData) : $postData;
    }
}
