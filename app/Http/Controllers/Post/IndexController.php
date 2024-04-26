<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * @param  FilterRequest  $request
     * @return View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __invoke(FilterRequest  $request): View
    {
        $posts = $this->service->index($request);

//        return PostResource::collection($posts);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
}
