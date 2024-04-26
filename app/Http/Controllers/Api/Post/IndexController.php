<?php

namespace App\Http\Controllers\Api\Post;


use App\Http\Requests\FilterRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexController extends BaseApiController
{
    /**
     * @param  FilterRequest  $request
     * @return ResourceCollection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __invoke(FilterRequest  $request): ResourceCollection
    {
        $posts = $this->service->index($request);

        return PostResource::collection($posts);
    }
}
