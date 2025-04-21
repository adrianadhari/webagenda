<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'date',
        'jam',
        'tempat',
        'disposition',
    ];
}
