@extends('layouts.app')
 
@section('title', 'Transactions')
 
@section('content')
    <h1>Users</h1>
    
    <button>
        <a href="{{ route('dashboard.index') }}">Back</a>
    </button>
    <div>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>User</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Updated At</th>
                <th>Created At</th>
                <th width="1%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $key => $transaction)
                <tr key={{ $key }}>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->username }}</td>
                <td>{{ $transaction->sender }}</td>
                <td>{{ $transaction->receiver }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ date_format($transaction->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($transaction->created_at,'m/d/Y') }}</td>
                <td>
                    <button>
                        <a href="{{ route('dashboard.transactions.show', $transaction->id) }}">Show</a>
                    </button>
                </td>
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