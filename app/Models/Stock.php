<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=['products_id', 'stock', 'available_stock'];

    public function stockData(){
        
    return $this->belongsTo(Product::class, 'products_id');
    }
}
