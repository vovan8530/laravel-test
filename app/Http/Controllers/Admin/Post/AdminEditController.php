<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;

class AdminEditController extends BaseController
{
    /**
     * @param  Post  $post
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $post = $this->service->showAndEdit($post);
        $categories = $this->service->allCategories();
        $tags = $this->service->allTags();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
