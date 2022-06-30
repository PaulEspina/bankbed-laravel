@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Withdraw</h1>
    <button>
        <a href="{{ route('site.index') }}">Back</a>
    </button>

    {{Form::open(['route' => 'site.transfer.submit'])}}
    <div>
        {{Form::label('account_number', 'Account')}}
        {{Form::select('account_number', $bankAccounts)}}
    </div>
    <div>
        {{Form::label('receiver', 'Transfer To')}}
        {{Form::text('receiver')}}
    </div>
    <div>
        {{Form::label('amount', 'Amount')}}
        {{Form::number('amount', null, ['step' => 'any'])}}
    </div>
    <button type="submit">Submit</button>
    {{Form::close()}}
@endsection