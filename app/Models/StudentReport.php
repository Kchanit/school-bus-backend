<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReport extends Model
{
    use HasFactory;

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
