@extends('layouts.app')

@section('title', 'Login')

@section('header-title', 'Login')

@section('content')
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <h3 class="text-center text-primary mb-4">Login</h3>
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="#">Lupa Password?</a>
        </div>
    </div>
@endsection
