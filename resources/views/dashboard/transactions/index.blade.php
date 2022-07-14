@extends('layouts.app')
 
@section('title', 'Transactions')
 
@section('content')
<div class="header_fixed">
    <table>
        <thead>
            <tr>
                <th>ID No.</th>
                <th>User</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Running Balance</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $key => $transaction)
            <tr key ={{ $key }}>
                <td>{{ $transaction->id }}</td>
                @if(isset($transaction->user))
                    <td>{{ $transaction->user->username }}</td>
                @else
                    <td>User ID {{ $transaction->user_id }} (Deleted)</td>
                @endif
                <td>{{ $transaction->sender }}</td>
                <td>{{ $transaction->receiver }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->running_balance }}</td>
                <td>{{ $transaction->type }}</td>
                <td>{{ date_format($transaction->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($transaction->created_at,'m/d/Y') }}</td>
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
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/table_style.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection