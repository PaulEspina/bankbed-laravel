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
                @if(isset($bankAccount->user))
                <td>{{ $bankAccount->user->username }}</td>
                @else
                <td>User ID {{ $bankAccount->user_id }} (Deleted)</td>
                @endif
                <td>{{ $bankAccount->account_number }}</td>
                <td>{{ $bankAccount->balance }}</td>
                <td>{{ date_format($bankAccount->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($bankAccount->created_at,'m/d/Y') }}</td>
                <td>
                    <a href="{{ route('dashboard.bank-accounts.edit', $bankAccount->id) }}"><button>Edit</button></a>
                    <button data-toggle="modal" data-target="#deleteModal{{$bankAccount->id}}">Delete</button>
                </td>
            </tr>
            <div class="modal fade" id="deleteModal{{$bankAccount->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{$bankAccount->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{$bankAccount->id}}">Are you sure?</h5>
                        </div>
                        <div class="modal-body">
                            By clicking the <b>"Yes, delete the record"</b> button, the data will be <b>permanently deleted</b>.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{Form::open(['url' => route('dashboard.bank-accounts.destroy', $bankAccount), 'method' => 'delete'])}}
                            <button type="submit" class="btn btn-danger">Yes, delete the record</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
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

<!-- Modal -->


@push('head')
    <link rel="stylesheet" href="{{ asset('css/table_style.css')}}" />
@endpush

@push('scripts')
@endpush
@endsection