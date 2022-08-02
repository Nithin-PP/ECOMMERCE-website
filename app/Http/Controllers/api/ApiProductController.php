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
        $result1 = $this->product->countData($category_id);
        try {

            if($result1 > 0) {
                $result = $this->product->productData($category_id);
                return response()->json($result, 200);
            }
            throw new Exception('No data available for this id');
            
            
        }
        catch (Exception $e) {

            return response()->json($e->getMessage());
        }
    }
}
