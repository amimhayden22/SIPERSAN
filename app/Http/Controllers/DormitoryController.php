<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dormitory;
use App\Models\User;

class DormitoryController extends Controller
{
    public function index()
    {
        $dormitories = Dormitory::all();

        return view('dormitories.index', compact('dormitories'));
    }

    public function create()
    {
        $users = User::where('role', 'Pengurus Asrama')->get();

        return view('dormitories.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'user_id'   => 'required|int',
        ]);

        Dormitory::create([
            'name'      => $request->name,
            'user_id'   => $request->user_id,
        ]);

        return redirect()->route('dormitories.index')->with(['success' => 'Add data successfully']);
    }

    public function edit($id)
    {
        $editDormitory = Dormitory::find($id);
        $users = User::where('role', 'Pengurus Asrama')->get();

        if (is_null($editDormitory)) {
            return abort(404);
        }

        return view('dormitories.edit', compact('editDormitory', 'users'));
    }

    public function update(Request $request, Dormitory $dormitory)
    {
        $request->validate([
            'name'      => 'required|string',
            'user_id'   => 'required|int',
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
