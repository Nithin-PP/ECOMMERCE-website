<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {

        $idss = Auth::guard('purchasers')->user()->id;
        $cartstore = Cart::with('cartData')->where('purchasers_id', $idss)->get();
        $product[] = 0;
        $gtotal = 0;
        foreach ($cartstore as $value) {
            $qun = $value->quantity;
            $price = $value->cartData->price;
            $total = $qun * $price;
            $gtotal += $total;

            $product['items'][] = [

                'name' => $value->cartData->product,
                'price' => $value->cartData->price,
                'desc'  => $value->cartData->description,
                'qty' => $value->quantity

            ];
        }

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] =  $gtotal;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);
    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }

        dd('Error occured!');
    }
}
