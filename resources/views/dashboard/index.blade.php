@extends('layouts.app')
 
@section('title', 'Admin Dashboard')
 
@section('content')
<div class="cards-container">
    <div class="card card-one">
        <header>
            <div class="avatar">
                <img src="{{ asset('storage/Logo_Black_Square.jpg') }}" alt="Logo" />
            </div>
        </header>
        <h3 class="mb-5">{{ Auth::user()->first_name . " " . (Auth::user()->middle_name ? Auth::user()->middle_name . " " : "") . Auth::user()->last_name }}</h3>
        <div class="desc">
            <a href="{{ route('dashboard.users.index') }}">
                <button type="button" class="btn btn-primary">Users</button>
            </a>
            <a href="{{ route('dashboard.bank-accounts.index') }}">
                <button type="button" class="btn btn-primary">Bank Accounts</button>
            </a>
            <a href="{{ route('dashboard.transactions.index') }}">
                <button type="button" class="btn btn-primary">Transactions</button>
            </a>
            <a href="/login">
                <button type="button" class="btn btn-primary lgbtn">Logout</button>
            </a>
        </div>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/profile_styles.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection