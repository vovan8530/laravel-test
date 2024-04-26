<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\FilterRequest;
use Illuminate\Support\Facades\Auth;

class AdminIndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $this->authorize('view', Auth::user());

        $posts = $this->service->index($request);
        return view('admin.posts.index', ['posts' => $posts]);
    }
}
