@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="list-group">
            @foreach ($posts as $post)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $post->title }}</h5>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                    </div>
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
