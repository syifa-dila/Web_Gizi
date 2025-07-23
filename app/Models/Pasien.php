<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';

    protected $fillable = [ 
        'user_id', 
        'name',
        'gender',
        'birth_date',
        'motherName',
        'fatherName',
        'address',
        'noKK',
        'phone_number',
        'medical_History',
        'medical_Alergi',
        'drug_allergy',
        'body_weight',
        'height'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
