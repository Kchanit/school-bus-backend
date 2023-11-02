<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'first_name', 'last_name'];


    public function parent()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
