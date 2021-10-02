<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationInternational extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function departement(){
        return $this->belongsTo(Departement::class, 'id_study');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'id_faculties');
    }
}

