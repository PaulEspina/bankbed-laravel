@extends('layouts.app')
 
@section('title', 'Users')
 
@section('content')
    <h1>Users</h1>
    
    <button>
        <a href="{{ route('dashboard.index') }}">Back</a>
    </button>
    <button>
        <a href="{{ route('dashboard.users.create') }}">Create</a>
    </button>
    <div>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Updated At</th>
                <th>Created At</th>
                <th width="1%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $key => $user)
                <tr key={{ $key }}>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->middle_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ date_format($user->updated_at,'m/d/Y') }}</td>
                <td>{{ date_format($user->created_at,'m/d/Y') }}</td>
                <td>
                    <button>
                        <a href="{{ route('dashboard.users.show', $user->id) }}">Show</a>
                    </button>
                    <button>
                        <a href="{{ route('dashboard.users.edit', $user->id) }}">Edit</a>
                    </button>
                    {{Form::open(['url' => route('dashboard.users.destroy', $user), 'method' => 'delete'])}}
                        <button type="submit">Delete</button>
                    {{Form::close()}}
                </td>
                </tr>
                @empty
                <tr>
                <td colspan="100%">---</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection