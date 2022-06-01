<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Dormitory;
use App\Models\User;

class RoomController extends Controller
{
    public function index()
    {
        return view('rooms.index', [
            'rooms' => Room::all()
        ]);
    }

    public function create()
    {
        $dormitories = Dormitory::all();
        $users = User::where('role', 'Ketua Kamar')->get();

        return view('rooms.create', compact('dormitories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:150',
            'dormitory_id'   => 'required|int|max:10',
            'user_id'        => 'required|int|max:10',
        ]);

        Room::create([
            'name'          => $request->name,
            'dormitory_id'  => $request->dormitory_id,
            'user_id'       => $request->user_id,
        ]);

        return redirect()->route('rooms.index')->with(['success' => 'Add data successfully']);
    }

    public function edit($id)
    {
        $editRoom = Room::find($id);
        $dormitories = Dormitory::all();
        $users = User::all();

        if (is_null($editRoom)) {
            return abort(404);
        }

        return view('rooms.edit', compact('editRoom', 'users', 'dormitories'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name'           => 'required|string|max:150',
            'dormitory_id'   => 'required|int|max:10',
            'user_id'        => 'required|int|max:10',
        ]);

        $room->name         = $request->name;
        $room->dormitory_id = $request->dormitory_id; 
        $room->user_id      = $request->user_id;
        $room->save();

        return redirect()->route('rooms.index')->with(['success' => 'Update data successfully']);

    }

    public function destroy($id)
    {
        $deleteRoom = Room::find($id);
        if (is_null($deleteRoom)) {
            return abort(404);
        }
        $deleteRoom->delete();

        return redirect()->back()->with(['success' => 'Delete data successfully']);
    }

}
