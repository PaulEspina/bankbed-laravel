@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Deposit</h1>
    <button>
        <a href="{{ route('site.index') }}">Back</a>
    </button>

    {{Form::open(['route' => 'site.deposit.submit'])}}
    <div>
        {{Form::label('account_number', 'Account')}}
        {{Form::select('account_number', $bankAccounts)}}
    </div>
    <div>
        {{Form::label('amount', 'Amount')}}
        {{Form::number('amount')}}
    </div>
    <button type="submit">Submit</button>
    {{Form::close()}}
@endsection