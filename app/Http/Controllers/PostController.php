<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $posts = Post::paginate(5);

        return view('post.index', ['posts' => $posts]);

    }

    public function store(PostRequest $request)
    {
        return Post::create($request->validated());
    }

    public function show(Request $request): View
    {
        if ($request->has('id')) {
            dd($request->is('post/*'));
        }

        return view('post.show');
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json();
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @param  string  $slug
     * @return View
     */
    public function form(Request $request, int $id, string $slug): View
    {
        echo $request->is('post/*');
        if ($request->has('title') and $request->has('slug')) {
            $post = $request->only('title', 'slug');
            return view('post.result', ['post' => $post]);
        }
        return view('post.form');
    }

}
