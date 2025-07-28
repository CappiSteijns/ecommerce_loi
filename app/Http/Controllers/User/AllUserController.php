<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
 
use App\Mail\OrderMail;

class AllUserController extends Controller
{
    public function MyOrders(){
		// Hier halen we de bestellingen van de ingelogde gebruiker op en tonen we deze in de order view.

    	$orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_view',compact('orders'));

    } // end mehtod 



    public function OrderDetails($order_id){
		// Hier halen we de details van een specifieke bestelling op op basis van het order_id en tonen we deze in de order details view.

    	$order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_details',compact('order','orderItem'));

    } // end mehtod 


}
 