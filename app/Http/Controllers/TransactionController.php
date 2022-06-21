<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Student;
use App\Models\Dormitory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role === 'Ketua Kamar'){
            $transactions = Transaction::with('student')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        if(Auth::user()->role === 'Pengurus Asrama'){
            // $transactions = Transaction::with('student')->orderBy('created_at', 'desc')->get();
            $transactions = DB::select('SELECT
            transactions.id, students.name, transactions.start_date, transactions.end_date, transactions.description, transactions.return_date, transactions.status,
            students.id as student_id, dormitories.user_id, transactions.updated_at
            FROM `transactions`
            INNER JOIN students ON transactions.student_id=students.id
            INNER JOIN rooms ON students.room_id=rooms.id
            INNER JOIN dormitories ON rooms.dormitory_id=dormitories.id
            WHERE dormitories.user_id='.Auth::user()->id.'
            ORDER BY transactions.updated_at DESC');
            // return $transactions;
        }
        if(Auth::user()->role === 'Pengurus Pondok'){
            $transactions = Transaction::with('student')->whereStatus('Disetujui')->orderBy('updated_at', 'desc')->get();
        }

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = Room::where('user_id', Auth::user()->id)->first();
        $students = Student::where('room_id', $room->id)->orderBy('name')->get();

        return view('transactions.create', compact('students'));
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
            'student_id'    => 'required|not_in:0',
            'description'   => 'required|string'
        ]);

        if(!Auth::user()->role === 'Ketua Kamar'){
            return abort(403);
        }

        $createTransaction = Transaction::create([
            'student_id'    => $request->student_id,
            'user_id'       => Auth::user()->id,
            'description'   => $request->description
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role === 'Ketua Kamar') {
            $room = Room::where('user_id', Auth::user()->id)->first();
            $students = Student::where('room_id', $room->id)->orderBy('name')->get();
        }else{
            $students = Student::orderBy('name')->get();
        }

        $editTransaction = Transaction::find($id);
        if (is_null($editTransaction)) {
            return abort(404);
        }

        return view('transactions.edit', compact('editTransaction', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        if(Auth::user()->role === 'Ketua Kamar'){
            $request->validate([
                'student_id'    => 'required|not_in:0',
                'description'   => 'required|string',
            ]);
        }
        if(Auth::user()->role === 'Pengurus Asrama'){
            $request->validate([
                'status'        => 'required|not_in:0',
            ]);
        }
        if(Auth::user()->role === 'Pengurus Pondok'){
            $request->validate([
                'start_date'    => 'required|date',
                'end_date'      => 'required|date',
                'return_date'   => 'nullable|date',
            ]);
        }

        $transaction->student_id    = $request->student_id;
        $transaction->start_date    = $request->start_date;
        $transaction->end_date      = $request->end_date;
        $transaction->return_date   = $request->return_date;
        $transaction->description   = $request->description;
        $transaction->status        = $request->status;
        $transaction->save();

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
        $deleteTransaction = Transaction::find($id);
        if (is_null($deleteTransaction)) {
            return abort(404);
        }
        $deleteTransaction->delete();

        return redirect()->back()->with(['success' => 'Delete data successfully']);
    }
}
