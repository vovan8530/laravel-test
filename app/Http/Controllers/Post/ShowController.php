<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * @param  Post  $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $post = $this->service->showAndEdit($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
