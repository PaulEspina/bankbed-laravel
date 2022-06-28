@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Dashboard</h1>
    <button>
        <a href="{{ route('dashboard.bank-accounts.index') }}">Bank Accounts</a>
    </button>
@endsection