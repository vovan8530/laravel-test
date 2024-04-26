<?php

namespace App\Http\Controllers\Admin\Post;



use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class AdminUpdateController extends BaseController
{
    /**
     * @param  PostRequest  $request
     * @param  Post  $post
     * @return RedirectResponse
     */
    public function __invoke(PostRequest $request, Post $post): RedirectResponse
    {
        $post = $this->service->updatePost($request, $post);
        return redirect()->route('admin.posts.show', $post);
    }
}
