@extends('layouts.app')
 
@section('title', 'Profile')
 
@section('content')
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md" style="width:1000px">
            <div class="form-container mt-5 border p-5 bg-light shadow">
                <a href="{{ route('site.index') }}"><button type="button" class="btn-close" aria-label="Close"></button></a>
                <h3 class="my-3 text-secondary">{{ Auth::user()->first_name . " " . (Auth::user()->middle_name ? Auth::user()->middle_name . " " : "") . Auth::user()->last_name }} ({{ Auth::user()->username }})</h3>
                <div class="row header_fixed mb-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bankAccounts as $key => $bankAccount)
                            <tr>
                                <td>{{$bankAccount->account_number}}</td>
                                <td>{{$bankAccount->balance}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%">---</td>
                            </tr>
                             @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row header_fixed mb-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Amount</th>
                                <th>Running Balance</th>
                                <th>Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $key => $transaction)
                            <tr>
                                <td>{{$transaction->sender ?? "NULL "}}</td>
                                <td>{{$transaction->receiver ?? "NULL "}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->running_balance}}</td>
                                <td>{{$transaction->type}}</td>
                                <td>{{$transaction->created_at}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%">---</td>
                            </tr>
                             @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/table_style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/card.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection