<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_study',
        'level',
        'result',
        'start_date',
        'end_date'
    ];

    public function departement(){
        return $this->belongsTo(Departement::class,'id','id_study');
    }
}
