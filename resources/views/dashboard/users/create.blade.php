@extends('layouts.app')
 
@section('title', 'Create User')
 
@section('content')
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="form-fields">
                {{ Form::open(['route' => 'dashboard.users.store', 'method' => 'POST', 'class' => 'form-container mt-5 border p-4 bg-light shadow']) }}
                    <h3 class="mb-3 text-secondary">Create User</h3>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="username">Username<span class="text-danger">*</span></label>
                            {{Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Ex. User123', 'required'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ex. secretpassword123', 'required'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="first_name">First Name<span class="text-danger">*</span></label>
                            {{Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Ex. Neil Ritsard', 'required'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="middle_name">Middle Name</label>
                            {{Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Ex. Bugayong'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="last_name">Last Name<span class="text-danger">*</span></label>
                            {{Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Ex. Punzalan', 'required'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label>Role<span class="text-danger">*</span></label>
                            {{Form::select('role', ['user' => 'User', 'admin' => 'Admin'], null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md">
                            <a href="{{ route('dashboard.users.index') }}" style="text-decoration:none">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button">BACK</button>
                                </div>
                            </a>
                        </div>
                        <div class="col-md">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit">CREATE</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/card.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection