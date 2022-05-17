<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesteam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'joined_date',
        'current_routes',
        'comment'
    ];
}
