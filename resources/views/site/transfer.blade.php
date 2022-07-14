@extends('layouts.app')
 
@section('title', 'Transfer')
 
@section('content')
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="signup-form">
                {{Form::open(['route' => 'site.transfer.submit', 'class' => 'form-container mt-5 border p-4 bg-light shadow'])}}
                    <a href="{{ route('site.index') }}"><button type="button" class="btn-close" aria-label="Close"></button></a>
                    <h3 class="my-3 text-secondary">Withdraw</h3>
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="row-mx-5">
                        <div class="form-floating">
                            {{Form::select('account_number', $bankAccounts, null, ['class' => 'form-select'])}}
                            <label for="account_number">Account</label>
                        </div>
                        <div class="form-floating my-3">
                            {{Form::text('receiver', null, ['class' => 'form-control', 'placeholder' => 'Ex. 2022-321123-0'])}}
                            <label for="receiver">Transfer To</label>
                        </div>
                        <div class="form-floating my-3">
                            {{Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 200.00])}}
                            <label for="amount">Amount</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">TRANSFER</button>
                        </div>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/card.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection