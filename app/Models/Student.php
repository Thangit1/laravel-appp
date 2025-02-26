<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'dob', 'classroom_id'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}

