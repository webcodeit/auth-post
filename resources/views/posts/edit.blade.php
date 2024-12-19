@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Post</button>
        </form>
    </div>
@endsection
