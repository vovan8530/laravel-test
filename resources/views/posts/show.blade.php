<?php

use App\Enums\PublishedTypes;

/* @var \App\Models\Post $post */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">
            <div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <h2>Post</h2>
                </div>
                <div class=" justify-content-md-end">
                    <a href="{{route('posts.index')}}" class="btn btn-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Title</h6>
                                    <span class="text-secondary">{{$post->title}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Description</h6>
                                    <span class="text-secondary">{{$post->description}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Likes</h6>
                                    <span class="text-secondary">{{$post->likes}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Published</h6>
                                    <span class="text-secondary">{{PublishedTypes::$LABELS[$post->is_published]}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Category</h6>
                                    <span class="text-secondary">{{$post->category->title??''}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Tags</h6>
                                    <textarea>
                                        @foreach($post->tags as $tag)
                                            {{$tag->title}}
                                        @endforeach
                                    </textarea>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
