@extends('layouts.app')

@section('content')

    <h2>{{ $category->name }}</h2>

    <a href="{{ route('categories.edit', $category->id) }}" >edit</a>

    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
      {{ method_field('delete') }}
      {{ csrf_field() }}
      <button class="btn btn-danger ">Delete</button>
    </form>

    <div>
      @foreach($category->blog as $blog)
        <div>
          <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
        </div>
      @endforeach

    </div>
      
  
@endsection