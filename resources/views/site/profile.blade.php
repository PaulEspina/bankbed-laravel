@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Profile</h1>
    <button>
        <a href="{{ route('site.index') }}">Back</a>
    </button>
    
    <div>
        <label><strong>Username</strong></label>
        <p>{{ Auth::user()->username }}</p>
    </div>
    <div>
        <label><strong>First Name</strong></label>
        <p>{{ Auth::user()->first_name }}</p>
    </div>
    <div>
        @if(Auth::user()->middle_name)
        <label><strong>Middle Name</strong></label>
        <p>{{ Auth::user()->middle_name }}</p>
        @endif
    </div>
    <div>
        <label><strong>Last Name</strong></label>
        <p>{{ Auth::user()->last_name }}</p>
    </div>
@endsection