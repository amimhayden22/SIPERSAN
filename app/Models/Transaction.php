<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id', 'user_id', 'start_date', 'end_date', 'due_date', 'description', 'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
