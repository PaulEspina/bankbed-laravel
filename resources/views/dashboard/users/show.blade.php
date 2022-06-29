@extends('layouts.app')
 
@section('title', 'Users')
 
@section('content')
    <h1>Show User</h1>
    <button>
        <a href="{{ route('dashboard.users.index') }}">Back</a>
    </button>
    
    <div>
        <label><strong>Username</strong></label>
        <p>{{ $user->username }}</p>
    </div>
    <div>
        <label><strong>First Name</strong></label>
        <p>{{ $user->first_name }}</p>
    </div>
    <div>
        <label><strong>Middle Name</strong></label>
        <p>{{ $user->middle_name }}</p>
    </div>
    <div>
        <label><strong>Last Name</strong></label>
        <p>{{ $user->last_name }}</p>
    </div>
    <div>
        <label><strong>Role</strong></label>
        <p>{{ $user->role }}</p>
    </div>

</div>

@endsection