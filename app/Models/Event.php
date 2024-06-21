<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'start',
        'startTime',
        'end',
        'endTime',
        'description',
        'state',
        'categories_id',
    ];

}
