<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Room;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $rooms = Room::all();

        return view('students.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|int',
            'name'          => 'required|string',
            'address'       => 'required|string',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'wali'          => 'required',
            'room_id'       => 'required|int'
        ]);

        Student::create([
            'nis'           => $request->nis,
            'name'          => $request->name,
            'address'       => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender'        => $request->gender,
            'wali'          => $request->wali,
            'room_id'       => $request->room_id,
        ]);


        return redirect()->route('students.index')->with(['success' => 'Add data successfully']);
    }

    public function edit($id)
    {
         $editStudent = Student::find($id);
         $rooms = Room::all();

        if (is_null($editStudent)) {
            return abort(404);
        }

        return view('students.edit', compact('editStudent', 'rooms'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis'           => 'required|int',
            'name'          => 'required|string',
            'address'       => 'required|string',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'wali'          => 'required',
            'room_id'       => 'required|int'
        ]);

        $student->nis           = $request->nis;
        $student->name          = $request->name;
        $student->address       = $request->address;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender        = $request->gender;
        $student->wali          = $request->wali;
        $student->room_id       = $request->room_id;
        $student->save();

        return redirect()->route('students.index')->with(['success' => 'Update data successfully']);

    }

    public function destroy($id)
    {
        $deleteStudent = Student::find($id);
        if (is_null($deleteStudent)) {
            return abort(404);
        }
        $deleteStudent->delete();

        return redirect()->back()->with(['success' => 'Delete data successfully']);
    }
}
