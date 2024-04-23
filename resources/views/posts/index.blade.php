<?php
/* @var \App\Models\Post[] $posts */
?>

<x-layout>
    <x-slot:title>Post index</x-slot:title>
    <div class="container">
        @foreach($posts as $post)
            <div>
                <p>{{$post->id}}</p>
                <p>{{$post->title}}</p>
            </div>
        @endforeach
    </div>
</x-layout>
