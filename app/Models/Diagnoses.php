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
        'recommendation',
        'user_id',
        // 'admin_id',
        // 'aturan_id',
    ];

    // Relasi ke Pasien
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    // Relasi ke Admin
    // public function admin()
    // {
    //     return $this->belongsTo(Admin::class);
    // }

    // Relasi ke Aturan CF
    // public function aturan()
    // {
    //     return $this->belongsTo(AturanCf::class, 'aturan_id');
    // }
}
