<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class ApiPaypalController extends Controller
{
    public function processTransaction()
    {
        $ids = auth('sanctum')->user()->id;
        $cartstore = Cart::with('cartData')->where('purchasers_id', $ids)->get();
        $gtotal = 0;
        foreach ($cartstore as $value) {
            $qun = $value->quantity;
            $price = $value->cartData->price;
            $total = $qun * $price;
            $gtotal += $total;

        }
        if($gtotal > 0){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('viewcart')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('viewcart')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }else{
        return redirect()->route('viewcart')->with('status' ,'no cart available');
    }
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $id=Auth::guard('purchasers')->user()->id;
            Cart::where('purchasers_id', $id)->delete();
            return redirect()
                ->route('viewcart')->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('viewcart')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('viewcart')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
