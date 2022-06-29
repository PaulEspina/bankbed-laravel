@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Dashboard</h1>
    <button>
        <a href="{{ route('dashboard.users.index') }}">Users</a>
    </button>
    <button>
        <a href="{{ route('dashboard.bank-accounts.index') }}">Bank Accounts</a>
    </button>
    <button>
        <a href="{{ route('dashboard.transactions.index') }}">Transactions</a>
    </button>
@endsection