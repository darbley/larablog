@extends('layouts.app')

@include('partials.meta_static')

@section('content')


  @foreach($blogs as $blog)

    <h2><a href="{{ route('blogs.show', [$blog->id]) }}">{{ $blog->title }}</a></h2>

    {!! $blog->body !!}</p>

  @endforeach

@endsection