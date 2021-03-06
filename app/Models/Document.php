<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'url_file',
        'title',
        'id_category',
        'desc'
    ];

    public function categoryDocument(){
        return $this->belongsTo(CategoryDocument::class, 'id_category');
    }
}
