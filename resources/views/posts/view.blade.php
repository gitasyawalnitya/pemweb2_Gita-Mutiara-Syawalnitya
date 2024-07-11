@extends('layouts.app')

@section('title', 'View Post')

@section('header-title', 'View Post')

@section('content')
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title}}</h5>
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3" alt="Post Image" style="max-width: 100%;">
            @else
            <p class="test-muted">No Image</p>
            @endif
            
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('post.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
