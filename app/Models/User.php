<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'name',
        'lastname',
        'email',
        'password',
        'profile',
        'image',
        'sleep_hours',
        'diseases',
        'physical_activity',
    ];
}
