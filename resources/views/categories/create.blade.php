@extends('layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="jumbotron">
      <h1>Create New Category</h1>
    </div>

    <div class="">

      <form action="{{ route('categories.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" /> 
        </div>

        <button class="btn btn-primary" type="submit">Create New Category</button>
      </form>

    </div>

  </div>

@endsection