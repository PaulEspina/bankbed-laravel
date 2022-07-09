@extends('layouts.app')
 
@section('title', 'Login')

@section('content')
<div class="container-fluid bg">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <form class="form-container mt-5 border p-4 bg-light shadow" method="POST" action="/login">
            @csrf
                <h1>Login</h1>
                <div class="form-floating my-3">
                    <input type="input" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating my-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Login</button>
                    {{-- <button class="btn btn-primary" type="button" onclick="location.href='register.html'">Register</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/login.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection