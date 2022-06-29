<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use DB;

use App\Models\User;
use App\Http\Requests\Dashboard\Users\StoreUserRequest;
use App\Http\Requests\Dashboard\Users\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index')->with(['users' => User::all()]);
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();

        $user = new User();
        $user->username         = $data['username'];
        $user->first_name       = $data['first_name'];
        $user->middle_name      = $data['middle_name'] ?? "";
        $user->last_name        = $data['last_name'];
        $user->password         = bcrypt($data['password']);
        $user->role             = $data['role'];
        $user->save();

        DB::commit();

        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show')->with(['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit')->with(['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();
        $data = $request->validated();

        if(User::where('id', '!=', $user->id)->where('username', $data['username'])->first())
        {
            return back()->with(['errors' => collect(['Username is not unique'])]);
        }

        $user->username         = $data['username'];
        $user->first_name       = $data['first_name'] ?? $user->first_name;
        $user->middle_name      = $data['middle_name'] ?? $user->middle_name;
        $user->last_name        = $data['last_name'] ?? $user->last_name;
        $user->password         = bcrypt($data['password']) ?? $user->password;
        $user->role             = $data['role'] ?? $user->role;
        $user->save();

        DB::commit();

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
