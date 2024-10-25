<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'category_id',
        'sub_category_id',
        'price',
        'discount',
        'description',
        'image',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class,'id');
    }
    
    

    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }



    public function sub_category(){
        return $this->belongsTo(sub_category::class,'sub_category_id');
    }
}
