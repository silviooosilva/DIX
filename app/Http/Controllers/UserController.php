<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function add()
    {
        return view('users.add');
    }

    public function addUser(UserCreateRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return back()->withStatus(__('User created'));
    }

    public function editUser(int $id)
    {
        $data = User::find($id);
        return view('users.edit', ['data' => $data]);
    }

    public function updateUser(updateUserRequest $request, int $id)
    {
        DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $request['name'],
                'email' => $request['email']
            ]);

        return back()->withStatus(__('User updated'));
    }

    public function deleteUser(int $id)
    {
        if (User::where('id', $id)->exists()) {
            $data = User::find($id);
            $data->delete();
            return redirect('/user')->withStatus(__('User deleted'));
        }
    }
}
