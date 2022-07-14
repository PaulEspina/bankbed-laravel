@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
<div class="cards-container">
    <div class="card card-one">
        <header>
            <div class="avatar">
                <img src="{{ asset('storage/Logo_Black_Square.jpg') }}" alt="Logo" />
            </div>
        </header>
        <h3>{{ Auth::user()->first_name . " " . (Auth::user()->middle_name ? Auth::user()->middle_name . " " : "") . Auth::user()->last_name }}</h3>
        <div class="desc">
            <a href="{{ route('site.profile') }}" class="btn btn-primary">Profile</a>
            <a href="{{ route('site.withdraw') }}" class="btn btn-primary">Withdraw</a>
            <a href="{{ route('site.deposit') }}" class="btn btn-primary">Deposit</a>
            <a href="{{ route('site.transfer') }}" class="btn btn-primary">Transfer</a>
            <a href="/logout" class="btn btn-primary">Logout</a>
        </div>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/profile_styles.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection