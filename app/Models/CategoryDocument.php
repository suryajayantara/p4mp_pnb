<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'desc'
    ];

    public function document(){
        return $this->hasMany(Document::class);
    }
}
