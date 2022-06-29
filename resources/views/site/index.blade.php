@extends('layouts.app')
 
@section('title', 'Welcome')
 
@section('content')
    <h1>Welcome</h1>
    <button>
        <a href="{{ route('site.profile') }}">Profile</a>
    </button>
@endsection