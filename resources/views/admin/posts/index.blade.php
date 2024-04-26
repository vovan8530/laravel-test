<?php

use App\Enums\PublishedTypes;

/* @var \App\Models\Post[] $posts */
?>

@extends('layouts.admin')

@section('content')
    <h2>Posts Table</h2>
    <button onclick="createPost()" type="button" class="btn btn-dark">Create post</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Likes</th>
            <th scope="col">Published</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->likes}}</td>
                <td>{{PublishedTypes::$LABELS[$post->is_published]}}</td>
                <td>{{$post->category->title??''}}</td>
                <td>
                    @foreach($post->tags as $tag)
                        <div> {{$tag->title}} </div>
                    @endforeach
                </td>
                <td>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button onclick="showPost({{ $post->id }})" class="btn btn-primary" type="button">Show</button>
                        <button onclick="editPost({{ $post->id }})" class="btn btn-success" type="button">Edit</button>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div>{{$posts->withQueryString()->links()}}</div>
@endsection
