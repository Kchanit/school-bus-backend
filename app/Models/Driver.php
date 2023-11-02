<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Sortable;

    public $sortable = ['id', 'first_name', 'last_name', 'email'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function route()
    {
        return $this->hasOne(Route::class);
    }
}
