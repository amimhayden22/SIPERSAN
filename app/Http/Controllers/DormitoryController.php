<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dormitory;
use App\Models\User;

class DormitoryController extends Controller
{
    public function index()
    {
        return view('dormitories.index', [
            'dormitories' => Dormitory::all()
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('dormitories.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:150',
            'user_id'   => 'required|int|max:10',
        ]);

        Dormitory::create([
            'name'      => $request->name,
            'user_id'   => $request->user_id,
        ]);

        return redirect()->route('dormitories.index')->with(['success' => 'Add data successfully']);
    }

    //Nggak paham dipakai dimana
    public function show($id)
    {
        $showDormitories = Dormitory::find($id);
        if (is_null($showDormitories)) {
            return abort(404);
        }

        return view('update-profile', compact('showDormitories'));
    }

    public function edit($id)
    {
        $editDormitory = Dormitory::find($id);
        $users = User::all();

        if (is_null($editDormitory)) {
            return abort(404);
        }

        return view('dormitories.edit', compact('editDormitory', 'users'));
    }

    public function update(Request $request, Dormitory $dormitory)
    {
        $request->validate([
            'name'      => 'required|string|max:150',
            'user_id'   => 'required|int|max:10',
        ]);

        $dormitory->name     = $request->name;
        $dormitory->user_id  = $request->user_id;
        $dormitory->save();

        return redirect()->route('dormitories.index')->with(['success' => 'Update data successfully']);

    }

    public function destroy($id)
    {
        $deleteDormitory = Dormitory::find($id);
        if (is_null($deleteDormitory)) {
            return abort(404);
        }
        $deleteDormitory->delete();

        return redirect()->back()->with(['success' => 'Delete data successfully']);
    }

}
