@extends('layouts.app')
 
@section('title', 'Edit Bank Account')
 
@section('content')
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="form-fields">
                {{ Form::model($bankAccount, ['route' => ['dashboard.bank-accounts.update', $bankAccount->id], 'method' => 'patch', 'class' => 'form-container mt-5 border p-4 bg-light shadow']) }}
                    <h3 class="mb-3 text-secondary">Edit Bank Account</h3>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="user_id">User ID</label>
                            {{Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => 'Ex. 69'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="account_number">Account Number</label>
                            {{Form::text('account_number', null, ['class' => 'form-control', 'placeholder' => 'Ex. 2022-321123-0'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="balance">Balance</label>
                            {{Form::number('balance', null, ['class' => 'form-control', 'placeholder' => 'Ex. 200.50', 'step' => 'any'])}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md">
                            <a href="{{ route('dashboard.bank-accounts.index') }}" style="text-decoration:none">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button">BACK</button>
                                </div>
                            </a>
                        </div>
                        <div class="col-md">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit">SAVE</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
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