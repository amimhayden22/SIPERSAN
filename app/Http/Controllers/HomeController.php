<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Student;
use App\Models\Dormitory;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dormitories = Dormitory::count();
        $rooms = Room::count();
        $students = Student::count();
        $users = User::count();

        // Membuat line chart
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        $monthCustom = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
        ];

        $getStudents = [];
        foreach ($monthCustom as $value) {
            $getStudents[] = Transaction::whereStatus('Disetujui')
                            ->whereMonth('created_at', $value)
                            ->count();
        }

        return view('dashboard', compact([
            'dormitories', 'rooms', 'students', 'users'
        ]))
        ->with('monthNames',json_encode($monthNames,JSON_NUMERIC_CHECK))
        ->with('getStudents',json_encode($getStudents,JSON_NUMERIC_CHECK));
    }
}
