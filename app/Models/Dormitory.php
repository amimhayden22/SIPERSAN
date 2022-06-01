<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function room()
    {
        return $this->hasMany(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
