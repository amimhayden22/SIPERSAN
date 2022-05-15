<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:150',
            'email'     => 'required|string|email|max:150|unique:users,email',
            'password'  => 'required|string|min:8',
            'role'      => 'required|not_in:0'
        ]);

        $createUser = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
        ]);

        return redirect()->back()->with(['success' => 'Add data successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showUser = User::find($id);
        if (is_null($showUser)) {
            return abort(404);
        }

        return view('update-profile', compact('showUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = User::find($id);
        if (is_null($editUser)) {
            return abort(404);
        }

        return view('users.edit', compact('editUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required|string|max:150',
            'email'     => 'required|string|email|max:150',
            'role'      => 'required|not_in:0'
        ]);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role     = $request->role;
        $user->save();

        return redirect()->back()->with(['success' => 'Update data successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::find($id);
        if (is_null($deleteUser)) {
            return abort(404);
        }
        $deleteUser->delete();

        return redirect()->back()->with(['success' => 'Delete data successfully']);
    }

    public function updateProfile(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|',
            'password'  => 'confirmed',
        ]);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with(['success' => 'Update profile successfully']);
    }
}
