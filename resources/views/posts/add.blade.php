@extends('layouts.app')

@section('title', 'Tambah Post')

@section('header-title', 'Tambah Post')

@section('content')


<div class="card border-0 shadow-sm rounded">
    <div class="card-body">
        <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Post">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Konten</label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Masukkan Konten Post"></textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('post.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
