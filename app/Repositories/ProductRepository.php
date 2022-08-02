<?php 
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductRepository{

public function productData($category_id){

    return Product::where('categories_id', $category_id)->get(); 
 
}
public function countData($category_id){
  
 return Product::where('categories_id', $category_id)->count();
    
}

}