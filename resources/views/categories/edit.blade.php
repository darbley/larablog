@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="jumbotron">
      <h1>Edit Category</h1>
    </div>

    <div class="">

      <form action="{{ route('categories.update', $category->id) }}" method="post">
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" value="{{ $category->name }}"/> 
        </div>

        <button class="btn btn-primary" type="submit">Update Category</button>
      </form>

    </div>

  </div>

@endsection