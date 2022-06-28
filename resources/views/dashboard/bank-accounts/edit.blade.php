@extends('layouts.app')
 
@section('title', 'Bank Accounts')
 
@section('content')
    <h1>Edit Bank Account</h1>
    <button>
        <a href="{{ route('dashboard.bank-accounts.index') }}">Back</a>
    </button>

    {{Form::model($bankAccount, ['route' => ['dashboard.bank-accounts.update', $bankAccount->id], 'method' => 'patch'])}}
    <div>
        {{Form::label('user_id', 'User ID')}}
        {{Form::text('user_id', $bankAccount->user->id)}}
    </div>
    <div>
        {{Form::label('account_number', 'Account Number')}}
        {{Form::text('account_number')}}
    </div>
    <div>
        {{Form::label('balance', 'Balance')}}
        {{Form::number('balance')}}
    </div>
    <button type="submit">Submit</button>
    {{Form::close()}}
</div>

@endsection