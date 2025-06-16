@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Posts List</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['description'] }}</td>
                    <td><a href="{{ url('/posts/show/' . $post['id']) }}" class="btn btn-primary btn-sm">View</a></td>
                    <td><a href="{{ url('/posts/edit/' . $post['id']) }}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a href="{{ url('/posts/delete/' . $post['id']) }}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
