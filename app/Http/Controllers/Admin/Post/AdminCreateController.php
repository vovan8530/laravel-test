<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\View\View;

class AdminCreateController extends BaseController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {

        $categories = $this->service->allCategories();
        $tags = $this->service->allTags();
        return view('admin.posts.create', compact('categories', 'tags'));
    }
}
