@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <div>
        <h1>Profile</h1>
        <button>
            <a href="{{ route('site.index') }}">Back</a>
        </button>
        
        <div>
            <label><strong>Username</strong></label>
            <p>{{ Auth::user()->username }}</p>
        </div>
        <div>
            <label><strong>First Name</strong></label>
            <p>{{ Auth::user()->first_name }}</p>
        </div>
        <div>
            @if(Auth::user()->middle_name)
            <label><strong>Middle Name</strong></label>
            <p>{{ Auth::user()->middle_name }}</p>
            @endif
        </div>
        <div>
            <label><strong>Last Name</strong></label>
            <p>{{ Auth::user()->last_name }}</p>
        </div>
    </div>
    <div>
        <h3>Bank Accounts</h3>
        <table>
            <thead>
                <tr>
                <th>Account Number</th>
                <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bankAccounts as $bankAccount)
                <td>{{ $bankAccount->account_number }}</td>
                <td>{{ $bankAccount->balance }}</td>
                </tr>
                @empty
                <tr>
                <td colspan="100%">---</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        <h3>Transaction History</h3>
        <table>
            <thead>
                <tr>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $key => $transaction)
                <tr key={{ $key }}>
                <td>{{ $transaction->sender }}</td>
                <td>{{ $transaction->receiver }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                </tr>
                @empty
                <tr>
                <td colspan="100%">---</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection