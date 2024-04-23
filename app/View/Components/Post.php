<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post as PostModel;

class Post extends Component
{


    public function __construct(private  $type, private $message)
    {
    }

    public function render(): View
    {
        $posts = PostModel::orderBy('likes', 'desc')->with('category')->take(5)->get();
        return view('components.post', ['posts' => $posts, 'type' => $this->type, 'message' => $this->message]);
    }
}
