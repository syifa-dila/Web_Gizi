<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    protected $fillable = [
        'date',
        'result',
        'user_id',
        'pasiens_id',
        'diseases_id',
        'motherName',
        'fatherName', 
    ];
        protected $casts = [
        'date' => 'date',
    ];




    // Relasi ke pasien
public function pasien()
{
    return $this->belongsTo(Pasien::class, 'pasiens_id');
}
    public function user()
{
    return $this->belongsTo(User::class);
}

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'diseases_id');
    }


public function tingkatKeyakinan()
{
    $result = $this->result;

    if ($result >= 90) {
        return 'Sangat Yakin';
    } elseif ($result >= 70) {
        return 'Yakin';
    } elseif ($result >= 50) {
        return 'Kemungkinan';
    } else {
        return 'Ragu-ragu';
    }
}

    public function combinations()
    {
        return $this->hasMany(Combination::class, 'pasiens_id', 'pasiens_id');
    }
    
}