@extends('layouts.app')
 
@section('title', 'Users')
 
@section('content')
<div class="header_fixed">
    <table>
        <thead>
            <tr>
                <th>ID No.</th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Role</th>
                <th>Update At</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $user)
            <tr key ={{ $key }}>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->middle_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ date_format($user->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($user->created_at,'m/d/Y') }}</td>
                <td>
                    <a href="{{ route('dashboard.users.edit', $user->id) }}"><button>Edit</button></a>
                    <button data-toggle="modal" data-target="#deleteModal{{$user->id}}">Delete</button>
                </td>
            </tr>
            <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{$user->id}}">Are you sure?</h5>
                        </div>
                        <div class="modal-body">
                            By clicking the <b>"Yes, delete the record"</b> button, the data will be <b>permanently deleted</b>.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{Form::open(['url' => route('dashboard.users.destroy', $user), 'method' => 'delete'])}}
                            <button type="submit" class="btn btn-danger">Yes, delete the record</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="100%">---</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="primary-button">
        <a href="{{ route('dashboard.index') }}"><button class="btn-primary" type="button">Back</button></a>
        <a href="{{ route('dashboard.users.create') }}"><button class="btn-primary" type="button">Create</button></a>
    </div>
</div>

@push('head')
    <link rel="stylesheet" href="{{ asset('css/table_style.css')}}" />
@endpush

@push('scripts')
@endpush

@endsection