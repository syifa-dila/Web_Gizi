<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    protected $fillable = [
        'user_id',
        'code_diagnosis',
        'date',
        'result_diagnosis',
        'user_id',
        'pasiens_id',
        'gejalas_id',
        'diseases_id',
        'rules_id',
    ];

    // Relasi ke pasien
public function pasien()
{
    return $this->hasOne(Pasiens::class, 'user_id');
}
    public function user()
{
    return $this->belongsTo(User::class);
}

    // Relasi ke gejala
    public function gejala()
    {
        return $this->belongsTo(Gejalas::class, 'gejalas_id');
    }

    // Relasi ke penyakit
    public function disease()
    {
        return $this->belongsTo(Disease::class, 'diseases_id');
    }

    // Relasi ke aturan (rule)
    public function rule()
    {
        return $this->belongsTo(Rules::class, 'rules_id');
    }
}