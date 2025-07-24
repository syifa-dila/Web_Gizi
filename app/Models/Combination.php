<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    use HasFactory;
        protected $fillable = [
        'pasiens_id',
        'diseases_id',
        'result_cf_id',
        'rules_id',
        'cf_value',
    ];


// Combination.php

     public function user()
{
    return $this->belongsTo(User::class);
}
public function pasien()
{
    return $this->hasOne(Pasiens::class, 'user_id');
}
public function result_cf()
{
    return $this->belongsTo(Result_cf::class, 'result_cf_id');
}

public function rules()
{
    return $this->belongsTo(Rules::class, 'rules_id');
}
        public function disease()
    {
        // return $this->belongsTo(Disease::class);
            return $this->belongsTo(Disease::class, 'disease_id');

    }

}
