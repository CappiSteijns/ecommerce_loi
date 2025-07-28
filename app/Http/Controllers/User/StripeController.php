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

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    // Hier verwerken we de Stripe-betaling en slaan we de bestelling op in de database.
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        $total_amount += $request->delivery_cost;


        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'Easy Online Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // Insert order into the database
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'shipping_name' => $request->name,
            'shipping_email' => $request->email,
            'shipping_phone' => $request->phone,

            // Nederlandse adresvelden
            'street_name' => $request->street_name,
            'house_number' => $request->house_number,
            'house_number_suffix' => $request->house_number_suffix,
            'post_code' => $request->post_code,
            'city' => $request->city,
            'province' => $request->province,

            // Bezorging
            'delivery_day' => $request->delivery_day,
            'delivery_time' => $request->delivery_time,
            'delivery_cost' => $request->delivery_cost,

            'notes' => $request->notes,

            // Betalingsinformatie
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount, // Inclusief delivery_cost
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),

            'confirmed_date' => null,
            'processing_date' => null,
            'picked_date' => null,
            'shipped_date' => null,
            'delivered_date' => null,
            'cancel_date' => null,
            'return_date' => null,
            'return_reason' => null,
            'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }
}