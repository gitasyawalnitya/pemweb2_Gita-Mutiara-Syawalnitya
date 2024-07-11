@extends('layouts.app')

@section('title', 'Edit Post')

@section('header-title', 'Edit Post')

@section('content')
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="rounded mt-2" style="width: 150px" alt="Post Image">
                    @endif
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('post.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

