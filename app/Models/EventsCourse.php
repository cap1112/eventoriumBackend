<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'events_id',
        'courses_id',
    ];
}
