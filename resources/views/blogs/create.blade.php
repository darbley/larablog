@extends('layouts.app')

@section('content')


@include('partials.tinymce')

  <div class="container-fluid">
    <div class="jumbotron">
      <h1>Create New Post</h1>
    </div>

    <div class="">

      <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" /> 
        </div>

        <div class="form-group">
          <label for="body">Post Body</label>
         {{--  <textarea name="body" class="form-control" /> </textarea> --}}
         <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
        </div>

       
        @foreach($categories as $category)
          <div class="form-group">
            <label class="" >{{ $category->name }}</label>
            <input type="checkbox" name="category_id[]" value="{{ $category->id }}" />
           <br />
          </div>
        @endforeach
        
        <div class="form-group">
          <label for="featured_image"></label> 
          <input type="file" name="featured_image" class="form-control" />
        </div>

        <button class="btn btn-primary" type="submit">Create New Blog Post</button>
      </form>

    </div>

  </div>

@endsection