@extends('layouts.app')

@include('partials.meta_static')

@section('content')

<div class="container-fluid">
  <h1>Published</h1>
  @foreach($publishedBlogs as $blog)

    <h2><a href="{{ route('blogs.show', [$blog->id]) }}">{{ $blog->title }}</a></h2>

    {!! str_limit($blog->body, 100) !!}</p>

    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <input type="checkbox" name="status" value="0" checked>
        <button type="submit" class="btn btn-warning btn-xs">Save as Draft</button>
       
    </form>


  @endforeach
</div>

<div class="container-fluid draft-posts">
  <h1>Drafts</h1>

  @foreach($draftBlogs as $blog)

    <h2><a href="{{ route('blogs.show', [$blog->id]) }}">{{ $blog->title }}</a></h2>
    <p> {!! str_limit($blog->body, 100) !!}</p>

    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <input type="checkbox" name="status" value="1" checked>
        <button type="submit" class="btn btn-success btn-xs">Publish</button>
    </form>

  @endforeach

</div>

@endsection