<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_name',
        'desc'
    ];

    public function certification(){
        return $this->hasMany(Certification::class);
    }

    public function certificationInternational(){
        return $this->hasMany(CertificationInternational::class);
    }
}
