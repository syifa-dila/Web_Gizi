<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rules extends Model
{
    use HasFactory;

protected $fillable = [
    'disease_id',
    'gejala_id',
    'cf_pakar',
];

        public function disease()
    {
        // return $this->belongsTo(Disease::class);
            return $this->belongsTo(Disease::class, 'disease_id');

    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
