<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_study',
        'id_level',
        'id_result',
        'start_date',
        'end_date'
    ];

    public function departement(){
        return $this->belongsTo(Departement::class,'id_study');
    }

    public function level(){
        return $this->belongsTo(Level::class,'id_level');
    }

    public function result(){
        return $this->belongsTo(Accreditation::class,'id_result');
    }

}
