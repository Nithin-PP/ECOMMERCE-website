<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=['categories_id', 'product', 'description', 'image', 'price', 'stock'];

    public function categoryData()
    {
    return $this->belongsTo(Category::class, 'categories_id');
    }

    public function productData()
    {
    return $this->hasOne(Stock::class, 'products_id');
    }
    public function cartData()
    {
    return $this->hasMany(Cart::class, 'products_id');
    }

}
