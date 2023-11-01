<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Address extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['district', 'home_address'];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
