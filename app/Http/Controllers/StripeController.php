<?php
    
namespace App\Http\Controllers;

use App\Models\Perdoruesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Models\Order;
use App\Models\CCart;
use App\Models\Cart;
use Currencies;
use App\Models\currency;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $total = 0;
        if(Auth::guard('perdoruesit')->check()){
            $total = Cart::find(Auth::guard('perdoruesit')->user()->id)->total;
        }
        else{
            if(Session::get('cart') != null){
                $total = Session::get('cart')->total;
            }
            else{
                $total = 0;
            }

        }
        $curr = currency::first()->currency;
        return view('stripe',compact('total','curr'));
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
     
    }
}