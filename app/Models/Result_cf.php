<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result_cf extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasiens_id',
        'gejalas_id',
        'nilai_cf',
    ];

     public function user()
{
    return $this->belongsTo(User::class);
}
public function pasien()
{
    return $this->hasOne(Pasiens::class, 'user_id');
}

    public function gejala()
    {
        return $this->belongsTo(Gejalas::class, 'gejalas_id');
    }
}
