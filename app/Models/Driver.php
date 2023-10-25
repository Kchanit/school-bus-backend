<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
