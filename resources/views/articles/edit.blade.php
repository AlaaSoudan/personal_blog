@extends('layouts.app')

@section('content')

  <section class="section">
    <div class="container">
    <div class='title has-text-centered '>Edit {{ $article->title }}</div>

    <div class='columns '>
        <div class="card  column is-half is-offset-one-quarter">
    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
     @method('PUT')
        @csrf
        <div class="field">
            <label class="label">title</label>
            <div class="control">
                <input class="input" type="text" placeholder="title" name='title' value="{{ old('title',$article->title) }}">
            </div>
        </div>

        <div class="field">
            <label class="label">Category</label>

            <div class="control">
                <div class="select">
                    <select name="category_id"  value="{{ old('category_id',$article->category_id) }}">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('category_id')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Tags</label>

            <div class="control">
                <div class="select is-multiple @error('tags') is-danger @enderror">
                    <select name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

<div class="file has-name">
  <label class="file-label">
    <input class="file-input"   type="file" name="image" value="{{ old('image',$article->image) }}">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a image
      </span>
    </span>


  </label>
</div>
        <div class="field">
            <label class="label">content</label>

             <input class="textarea text-is-multiline" type="textarea " placeholder="content" name='content' value="{{ old('content',$article->content) }}">


            @error('content')
                <p class="help is-danger">minmum is 100</p>
            @enderror
       </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-link is-light">Cancel</button>
                </div>
            </div>


    @endsection
