@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="jumbotron">
      <h1>Edit Post</h1>
    </div>

    <div class="">

      <form action="{{ route('blogs.update', $blog->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{ $blog->title }}" /> 
        </div>

        <div class="form-group">
          <label for="body">Post Body</label>
          <textarea name="body" class="form-control" /> {{ $blog->body }}</textarea>
        </div>

        {{ $blog->category->count() ? 'Current Categories ' : '' }}
        @foreach($blog->category as $category)
          <div class="form-group">
            <label class="" >{{ $category->name }}</label>
            <input type="checkbox" name="category_id[]" value="{{ $category->id }}" checked />
           <br />
          </div>
        @endforeach  

        {{ $filtered->count() ? 'Other Categories ' : '' }}
      
        @foreach($filtered as $category)
          <div class="form-group">
            <label class="" >{{ $category->name }}</label>
            <input type="checkbox" name="category_id[]" value="{{ $category->id }}"  />
           <br />
          </div>
        @endforeach  

        <button class="btn btn-primary" type="submit">Update Blog Post</button>

      </form>

    </div>

  </div>

@endsection