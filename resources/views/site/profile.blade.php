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
                            <tr>
                                <td>2022-000007-0</td>
                                <td>2225.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row header_fixed mb-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Account</th>
                                <th>Running Balance</th>
                                <th>Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2022-000006-0</td>
                                <td>2022-000007-0</td>
                                <td>2225.00</td>
                                <td>2225.00</td>
                                <td>Transfer</td>
                                <td>06/30/2022</td>
                            </tr>
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