<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'name', 
        'position',
        'gender',
        'birth_date',
        'phone_number',
        'address',
    ];

     public function user()
{
    return $this->belongsTo(User::class);
}
}
