<?php

use App\Enums\PublishedTypes;
use App\Models\Category;
use App\Models\Tag;

/* @var Category[] $categories */
/* @var Tag[] $tags */
?>

@extends('layouts.admin')

@section('content')
    <h2>Post Create</h2>
    <form action="{{route('admin.posts.store')}}" class="row g-3" method="POST">
        @csrf
        <div class="col-md-6">
            <label for="validationServer01" class="form-label">Title</label>
            <input name="title" type="text" class="form-control"
                   value="{{old('title')}}"
                   required>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                          rows="3">{{old('description')}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationServer01" class="form-label">Likes</label>
            <input name="likes" type="number" class="form-control"
                   value="{{old('likes')}}"
                   required>
            @error('likes')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="validationServer04" class="form-label">Published</label>
            <select name="is_published" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach(PublishedTypes::$LABELS as $key => $label)
                    <option value="{{ $key }}" {{ $key == old('is_published') ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('is_published')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="validationServer04" class="form-label">Category</label>
            <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach($categories as $category)
                    <option
                        value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="validationServer04" class="form-label">Tags</label>
            <select name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                    <option
                        value="{{$tag->id}}" {{ old('tags') ? 'selected' : '' }}>{{$tag->title}}</option>
                @endforeach
            </select>
            @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create post</button>
        </div>
    </form>
@endsection
