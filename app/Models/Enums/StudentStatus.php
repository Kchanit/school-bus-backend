<?php

namespace App\Models\Enum;

enum StudentStatus: string
{
    case ARRIVED = 'arrived';
    case DEPARTED = 'departed';
}
