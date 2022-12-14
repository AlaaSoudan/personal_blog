@extends('layouts.app')
@section('content')
<div class="columns  is-multiline">
           <form action="{{ route('filter') }}" method="GET">
     {{--  <form action="{{ route('show.filter', ['categories' => $categories]) }}" method="POST">
 --}}

      <div class="control">
            <div class="select">
              <select name="category_id" >
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                @endforeach
              </select>
            </div>
                <button type="submit">Search</button>
            </form>
        <div class="buttons is-centered">
            <a href="/show" class="button is-info"> all posts</a>
        </div>

     <div class="columns  is-multiline">
        @foreach ($article as $article)
            <div class="column is-4 is-centered">
                <div class="card">
                    {{ $article->title}}

                    <div class="card-content">
                        <div class="media">

                        </div>
                        <div class="media-content">
                        </div>

                        <div class="content">
                            {{ $article->content}}

                            <br>
                            {{__('messages.categories')}}: {{ $article->category->cate_name }}
                            <br>
                            {{__('messages.tags')}}:
                            @foreach ($article->tags as $tag)
                                <span class="tag is-warning">{{ $tag->name }}</span>
                            @endforeach

                            </a> <a href="#"></a>
                            <br>
                            {{ $article->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
<style>
.card {

   height: 100%;
}
</style>
