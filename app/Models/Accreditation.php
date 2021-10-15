<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    protected $fillable = [
        'accreditation_name',
        'desc'
    ];

    public function certification(){
        return $this->hasMany(Certification::class);
    }

}
