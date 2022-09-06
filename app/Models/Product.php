<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'photo',
        'store_id'
    ];
    public function storeid(){
        return $this->belongsTo(Store::class,'store_id','id');
    }
}
