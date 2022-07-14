@extends('layouts.app')
 
@section('title', 'Show Bank Account')
 
@section('content')
    <h1>Show Bank Account</h1>
    <button>
        <a href="{{ route('dashboard.bank-accounts.index') }}">Back</a>
    </button>

    <div>
        <label><strong>User</strong></label>
        <p>ID: {{ $bankAccount->user->id }}</p>
        <p>Username: {{ $bankAccount->user->username }}</p>
    </div>
    <div>
        <label><strong>Account Number</strong></label>
        <p>{{ $bankAccount->account_number }}</p>
    </div>
    <div>
        <label><strong>Balance</strong></label>
        <p>{{ $bankAccount->balance }}</p>
    </div>

</div>

@endsection