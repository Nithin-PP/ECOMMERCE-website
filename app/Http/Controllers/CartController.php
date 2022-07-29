<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function addCart(Request $request)
    {
        if(!empty(Auth::guard('purchasers')->user()->id)) {
            $purchasersid = Auth::guard('purchasers')->user()->id;
            $stocks = Stock::where('products_id', $request->get('productid'))->first();

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


                // DB::table('stocks')->where('id', $stock->id)->update(['available_stock' => $current_stock]); 
                // $message='cart added successfully';
                return true;
            }
        } else {
            $validate = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
    
            if (Auth::guard('purchasers')->attempt($validate)) {
                $request->session()->regenerate();
                return redirect()->route('');
            } else {
                return redirect()->intended('purchaser-login');
            }
        }
    }

    public function viewCart()
    {
        $cartstore = Cart::with('cartData')->orderBy('carts.id', 'desc')->get();
        return view('front.cart', compact('cartstore'));
    }

    public function deleteCart($id)
    {

        
        $delete = Cart::find($id);
        $delete->delete();
        return redirect()->back();
    }
    public function deleteAll()
    {
        $ids = Auth::guard('purchasers')->user()->id;
        // $product = Product::get();
        Cart::where('purchasers_id', $ids)->delete();
        // return view('front.cart', compact(['product', 'cart']));
        // Cart::where('purchasers_id', $ids)->delete();         
        return redirect()->back();
    }
}
