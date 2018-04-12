@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

  <div class="container-fluid">
    <article>

      <div class="jumbotron">
        <h1>{{ $blog->title }}</h1>
        <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
        <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger btn-xs">Delete</button>
         
        </form>

        <div class="featured-image-wrap">

          @if($blog->featured_image)
            <img 
              src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" 
              alt="{{ str_limit($blog->title, 50) }}" 
              class="img-responsive featured_image"
            />
          @endif

        </div>
      </div>

      <div class="">

        {!! $blog->body !!}

        <div class="categories">
          <h5>Categories:</h5>
          @foreach($blog->category as $category)
            <div class="form-group">
              <a href="{{ route('categories.show', $category->slug) }}" class="" >{{ $category->name }}</a>
            </div>
          @endforeach  

        </div>
         
      </div>

    </article>
  </div>

@endsection