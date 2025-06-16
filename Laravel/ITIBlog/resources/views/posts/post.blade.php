@extends('layout')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
            <p class="card-text">{{ $post['description'] }}</p>
            <a href="{{ url('/posts') }}" class="btn btn-primary">All Posts</a>
        </div>
    </div>
@endsection
