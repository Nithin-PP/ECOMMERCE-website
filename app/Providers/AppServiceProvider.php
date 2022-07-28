<?php

namespace App\Providers;

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
        
        $product_stock = DB::table('products')->join('carts', 'products.id', '=', 'carts.products_id')->orderBy('carts.id','desc')->get();
        view()->share('resultss' , $product_stock);

    }
}
