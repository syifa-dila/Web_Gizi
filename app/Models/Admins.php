<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'position',
        'gender',
        'birth_date',
        'phone_number',
        'address',
    ];
}
