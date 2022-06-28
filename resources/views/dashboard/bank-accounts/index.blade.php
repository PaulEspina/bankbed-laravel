@extends('layouts.app')
 
@section('title', 'Bank Accounts')
 
@section('content')
    <h1>Bank Accounts</h1>
    
    <button>
        <a href="{{ route('dashboard.index') }}">Back</a>
    </button>
    <button>
        <a href="{{ route('dashboard.bank-accounts.create') }}">Create</a>
    </button>
    <div>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>User</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Updated At</th>
                <th>Created At</th>
                <th width="1%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bankAccounts as $key => $bankAccount)
                <tr key={{ $key }}>
                <td>{{ $bankAccount->id }}</td>
                <td>{{ $bankAccount->user->username }}</td>
                <td>{{ $bankAccount->account_number }}</td>
                <td>{{ $bankAccount->balance }}</td>
                <td>{{ date_format($bankAccount->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($bankAccount->created_at,'m/d/Y') }}</td>
                <td>
                    <button>
                        <a href="{{ route('dashboard.bank-accounts.show', $bankAccount->id) }}">Show</a>
                    </button>
                    <button>
                        <a href="{{ route('dashboard.bank-accounts.edit', $bankAccount->id) }}">Edit</a>
                    </button>
                    {{Form::open(['url' => route('dashboard.bank-accounts.destroy', $bankAccount), 'method' => 'delete'])}}
                        <button type="submit">Delete</button>
                    {{Form::close()}}
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