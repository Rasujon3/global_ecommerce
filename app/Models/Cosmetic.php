<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosmetic extends Model
{
    use HasFactory;

    protected $table = 'cosmetics';

    protected $fillable = [
        'title',
        'description',
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
