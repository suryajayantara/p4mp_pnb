<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationInternational extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'id_faculties',
        'id_study',
        'id_level',
        'result',
        'country',
        's_assessment',
        'e_assessment',
        'start_date',
        'end_date'
    ];

    public function departement(){
        return $this->belongsTo(Departement::class, 'id_study');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'id_faculties');
    }

    public function level(){
        return $this->belongsTo(Level::class,'id_level');
    }
}

