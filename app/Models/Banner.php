<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image'
    ];


    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'brand_category');
    // }
}
