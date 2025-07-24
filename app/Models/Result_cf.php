<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gejala;

class Result_cf extends Model
{
    use HasFactory;
    protected $table = 'result_cf';

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
        return $this->belongsTo(Gejala::class, 'gejalas_id');
    }
    public function rules()
{
    return $this->hasMany(Rules::class, 'gejala_id', 'gejala_id');
}
}
