<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_disease', 
        'disease_code',
        'information',
        'suggestion'
    ];

    public function rules()
{
    return $this->hasMany(Rule::class);
}

}

