<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Diagnoses extends Model
{
    use HasFactory;

    protected $table = 'diagnoses';

    protected $fillable = [
        'code_diagnosis',
        'date',
        'result_diagnosis',
        'pasiens_id',
        'gejalas_id',
        'diseases_id',
        'rules_id',
    ];

    // Relasi ke pasien
    public function pasiens()
    {
        return $this->belongsTo(Pasiens::class, 'pasiens_id');
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