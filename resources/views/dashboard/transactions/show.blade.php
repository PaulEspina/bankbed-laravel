@extends('layouts.app')
 
@section('title', 'ShowTransactions')
 
@section('content')
    <h1>Show Transaction</h1>
    <button>
        <a href="{{ route('dashboard.transactions.index') }}">Back</a>
    </button>
    
    <div>
        <label><strong>User</strong></label>
        <p>ID: {{ $transaction->user->id }}</p>
        <p>Username: {{ $transaction->user->username }}</p>
    </div>
    <div>
        <label><strong>Sender</strong></label>
        <p>{{ $transaction->sender }}</p>
    </div>
    <div>
        <label><strong>Receiver</strong></label>
        <p>{{ $transaction->receiver }}</p>
    </div>
    <div>
        <label><strong>Amount</strong></label>
        <p>{{ $transaction->amount }}</p>
    </div>
    <div>
        <label><strong>Type</strong></label>
        <p>{{ $transaction->type }}</p>
    </div>

</div>

@endsection