@extends('layouts.app')
 
@section('title', 'Bank Accounts')
 
@section('content')
<div class="header_fixed">
    <table>
        <thead>
            <tr>
                <th>ID No.</th>
                <th>User</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bankAccounts as $key => $bankAccount)
            <tr key ={{ $key }}>
                <td>{{ $bankAccount->id }}</td>
                <td>{{ $bankAccount->user->username }}</td>
                <td>{{ $bankAccount->account_number }}</td>
                <td>{{ $bankAccount->balance }}</td>
                <td>{{ date_format($bankAccount->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($bankAccount->created_at,'m/d/Y') }}</td>
                <td>
                    <a href="{{ route('dashboard.bank-accounts.edit', $bankAccount->id) }}"><button>Edit</button></a>
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
    <div class="primary-button">
        <a href="{{ route('dashboard.index') }}"><button class="btn-primary" type="button">Back</button></a>
        <a href="{{ route('dashboard.bank-accounts.create') }}"><button class="btn-primary" type="button">Create</button></a>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/table_style.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection