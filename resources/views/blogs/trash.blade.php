@extends('layouts.app')

@section('content')

  <h1>Trashed Blogs</h1>

  @foreach($trashedBlogs as $blog)

    <h2>{{ $blog->title }}</h2>

    <p>{{ $blog->body }}</p>

    {{-- restore --}}
    <form action="{{ route('blogs.restore', $blog->id) }}" method="get">
      {{ csrf_field() }}
        <button type="submit" class="btn-success btn-xs">Restore</button>
    </form>

    {{-- permanent delete --}} 
    <form action="{{ route('blogs.permanent-delete', $blog->id) }}" method="post">
      {{ method_field('delete') }}
      {{ csrf_field() }}
     
      <button type="submit" class="btn-success btn-xs btn-danger">Delete</button>
    </form>

  @endforeach

@endsection