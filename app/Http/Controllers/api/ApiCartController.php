<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    public function add(Request $request){

        $purchasersid = auth('sanctum')->user()->id;
        $stocks = Stock::where('products_id', $request->get('productid'))->first();
        // return response()->json($stocks->available_stock, 200);
        if ($stocks->available_stock >= $request->get('product') && $request->get('product') != 0) {
            $cart = new Cart();
            $cart->products_id = $request->get('productid');
            $cart->purchasers_id = $purchasersid;
            $cart->quantity = $request->get('product');
            $cart->save();

            $stock = Stock::where('products_id', $cart->products_id)->first();
            $current_stock = $stock->available_stock - $cart->quantity;
            $stock->available_stock = $current_stock;
            $stock->update();
            return response()->json([$cart, $stock], 200);
        }
    } 
    public function cartView($purchaser_id){
        $cart=Cart::where('purchasers_id', $purchaser_id)->get();
        return response()->json($cart, 200);
    }
}
