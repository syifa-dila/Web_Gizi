<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisGejala extends Model
{
    use HasFactory;

    protected $table = 'diagnosis_gejala'; // penting! karena bukan jamak

    protected $fillable = [
        'diagnosis_id',
        'gejala_id',
        'nilai_cf_user',
    ];

    // Relasi ke Diagnosis
    public function diagnosis()
    {
        return $this->belongsTo(Diagnoses::class);
    }

    // Relasi ke Gejala
    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
