<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;

class AdminStoreController extends BaseController
{
    /**
     * @param  PostRequest  $request
     * @return RedirectResponse
     */
    public function __invoke(PostRequest $request): RedirectResponse
    {
        $this->service->storePost($request);
        return redirect()->route('admin.posts.index');
    }
}
