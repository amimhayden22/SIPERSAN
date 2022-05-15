<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Dormitory;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('rooms.create', [
            'rooms' => Room::all(),
            'dormitories' => Dormitory::all(),
            'users' => User::all()
        ]);
    }

}
