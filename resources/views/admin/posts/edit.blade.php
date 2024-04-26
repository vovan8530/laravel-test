<?php

use App\Enums\PublishedTypes;

/* @var \App\Models\Post $post */
/* @var \App\Models\Category[] $categories */
/* @var \App\Models\Tag[] $tags */
?>

@extends('layouts.admin')

@section('content')
    <h2>Post Edit</h2>
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST" class="row g-3">
        @method('PATCH')
        @csrf
        <div class="col-md-6">
            <label for="validationServer01" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{$post->title}}" required>
            @error('title')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                          rows="3">{{$post->description}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationServer01" class="form-label">Likes</label>
            <input name="likes" type="number" class="form-control" value="{{$post->likes}}" required>
            @error('likes')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="validationServer04" class="form-label">Published</label>
            <select name="is_published" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach(PublishedTypes::$LABELS as $key => $label)
                    <option value="{{ $key }}" {{ $key == $post->is_published ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
                @error('is_published')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </select>
        </div>

        <div class="col-md-6">
            <label for="validationServer04" class="form-label">Category</label>
            <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach($categories as $category)
                    <option
                        value="{{$category->id}}" {{ $category->id == $post->category_id? 'selected' : '' }}>{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="validationServer04" class="form-label">Tags</label>
            <select name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                    <option
                        value="{{$tag->id}}" {{ $tag->id == $post->tags->contains('id', $tag->id) ? 'selected' : '' }}>{{$tag->title}}</option>
                @endforeach
            </select>
            @error('tags')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update post</button>
        </div>
    </form>
@endsection
