<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function stock($id)
    {
    $value=Stock::where('products_id', $id)->get();
    return view('admin.stock', compact('value'));
    }

    public function store(Request $request)
    { 
    $ids=$request->id;
    $stock=Stock::find($ids);
    $new_current_stock = $stock->stock + $request->stock;
    $new_available_stock =$stock->available_stock + $request->stock;

    $stock->stock= $new_current_stock;
    $stock->available_stock= $new_available_stock;
    $stock->update();
    return redirect('product-list');   
    }

    public function cart($id)
    {
        // $product = Product::find($id);
        $stock = Stock::with('stockData')->where('available_stock', '>=', 0)->where('products_id', $id)->get();
        return view('front.popup', compact(['id', 'stock']));
    }

}
