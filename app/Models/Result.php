<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'accreditation_name',
        'desc'
    ];

    public function accreditation(){
        return $this->hasMany(Accreditation::class);
    }
}
