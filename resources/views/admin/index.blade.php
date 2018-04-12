@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <h1>Admin Dashboard</h1>
</div>

<div class="col-md-12">
  
  <a class="btn btn-primary" href="{{ route('blogs.create') }}" >Create Blog</a>
  <a class="btn btn-primary" href="{{ route('blogs.trash') }}">Trashed Blogs</a>
  <a class="btn btn-primary" href="{{ route('categories.create') }}">Create Categories</a>

</div>

@endsection