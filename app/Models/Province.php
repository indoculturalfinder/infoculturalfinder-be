<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = "provinces";
    protected $primarykey = "id";
    protected $fillable = [
        'name'
    ];

    public function cultures(){
        return $this->hasMany(Culture::class, 'province_id', 'id');
    }
}
