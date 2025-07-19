<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rules extends Model
{
    use HasFactory;

    protected $fillable = [
        'CF_user', 
        'CF_pakar',
        'combine'
    ];

        public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
