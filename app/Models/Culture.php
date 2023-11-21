<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $table = "cultures";
    protected $primarykey = "id";
    protected $fillable = [
        'province_id',
        'category_id',
        'name',
        'img',
        'video',
        'desc'
    ];

    public function provinces(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    
    public function categories(){
        return $this->belongsTo(Categorie::class, 'category_id', 'id');
    }

}
