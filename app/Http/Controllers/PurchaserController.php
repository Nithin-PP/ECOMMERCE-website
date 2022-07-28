<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaserController extends Controller
{

    public function index()
    {
    return view('front.purchaserlogin');
    }
    public function login(Request $request)
    {
        
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('purchasers')->attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->intended('purchaser-login');
        }
    }

    public function logout()
    {
        Auth::guard('purchasers')->logout();
        return redirect()->route('purchaser-login');
    }

    public function productview($id)
    {
        $category = Category::get();
        $product = Product::where('categories_id', $id)->get();
        return view('front.home', compact(['category', 'product']));
    }

}
