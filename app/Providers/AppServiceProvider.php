<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        
        $product_stock = Cart::with('cartData')->orderBy('carts.id', 'desc')->get();
        view()->share('results' , $product_stock);

    }
}
