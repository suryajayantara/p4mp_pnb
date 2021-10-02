<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name',
        'desc'
    ];

    public function departement(){
        return $this->hasMany(Departement::class);
    }

    public function certificationInternational(){
        return $this->hasMany(CertificationInternational::class);
    }
}
