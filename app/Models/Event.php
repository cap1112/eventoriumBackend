<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'date',
        'hour',
        'description',
        'state',
        'label',
    ];
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'users_events');
    // }
}
