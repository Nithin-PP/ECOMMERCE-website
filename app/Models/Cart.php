<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['products_id', 'purchasers_id', 'quantity'];

    public function cartData(){

        return $this->belongsTo(Product::class, 'products_id');
        
    }
}
