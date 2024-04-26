<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class AdminDestroyController extends BaseController
{
    /**
     * @param  Post  $post
     * @return RedirectResponse
     */
    public function __invoke(Post $post): RedirectResponse
    {
        $this->service->destroyPost($post);
        return redirect()->route('admin.posts.index');
    }
}
