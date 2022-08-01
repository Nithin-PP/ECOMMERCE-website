<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->product = $ProductRepository;
    }

    public function show($category_id)    
    {  
        try{
        $result = $this->product->productData($category_id);
        return response()->json($result,200);   
        throw new Exception('invalid'); 
    }
    catch(Exception $e){

        return response()->json($e->getMessage(), 202);
    }
    }
}
