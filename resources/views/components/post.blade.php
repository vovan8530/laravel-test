<?php
/**@var App\Models\Post $post */
?>

<div  {{$attributes}}>
    {{ $message }}
</div>


<div>
    @foreach($posts as $post)
        <a href="{{$post}}">{{$post->category->title}}</a>
    @endforeach
</div>
