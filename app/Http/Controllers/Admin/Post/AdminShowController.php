<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use Illuminate\View\View;

class AdminShowController extends BaseController
{
    /**
     * @param  Post  $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $post = $this->service->showAndEdit($post);
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }
}
