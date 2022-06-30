@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Welcome</h1>
    <button>
        <a href="{{ route('site.profile') }}">Profile</a>
    </button>
    <button>
        <a href="{{ route('site.withdraw') }}">Withdraw</a>
    </button>
    <button>
        <a href="{{ route('site.deposit') }}">Deposit</a>
    </button>
@endsection