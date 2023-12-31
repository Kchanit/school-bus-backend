<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function studentReports()
    {
        return $this->hasMany(StudentReport::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
