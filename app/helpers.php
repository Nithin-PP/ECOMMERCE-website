<?php

use App\Models\Category;
use Illuminate\Support\Facades\Crypt;

if (!function_exists('product_id')){
    function product_id($id){
        
        // $ts = "\0\0\0\0" . pack('N', '1464284796');
        $product_id = Crypt::encrypt($id,'AES-128-CBC', hex2bin('b35901b480ca658c8be4341eefe21a80'), 
        null, '0000000000000000');

        return $product_id;
    }
}