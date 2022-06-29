@extends('layouts.app')
 
@section('title', 'Users')
 
@section('content')
    <h1>Create User</h1>
    <button>
        <a href="{{ route('dashboard.users.index') }}">Back</a>
    </button>

    {{Form::open(['route' => 'dashboard.users.store'])}}
    <div>
        {{Form::label('first_name', 'First Name')}}
        {{Form::text('first_name')}}
    </div>
    <div>
        {{Form::label('middle_name', 'Middle Name')}}
        {{Form::text('middle_name')}}
    </div>
    <div>
        {{Form::label('last_name', 'Last Name')}}
        {{Form::text('last_name')}}
    </div>
    <div>
        {{Form::label('username', 'Username')}}
        {{Form::text('username')}}
    </div>
    <div>
        {{Form::label('password', 'Password')}}
        {{Form::text('password')}}
    </div>
    <div>
        {{Form::label('role', 'Role')}}
        {{Form::text('role')}}
    </div>
    <button type="submit">Submit</button>
    {{Form::close()}}
</div>

@endsection