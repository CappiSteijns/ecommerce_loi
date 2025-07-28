<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request)
    {
        // Verzamel de gegevens
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['street_name'] = $request->street_name;
        $data['house_number'] = $request->house_number;
        $data['house_number_suffix'] = $request->house_number_suffix;
        $data['city'] = $request->city;
        $data['province'] = $request->province;
        $data['delivery_day'] = $request->delivery_day;
        $data['delivery_time'] = $request->delivery_time;
        $data['delivery_cost'] = $request->delivery_cost;
        $data['notes'] = $request->notes;

        // Hier berekenen we het totale bedrag van de winkelwagen
        $cartTotal = Cart::total();
        $grandTotal = $cartTotal + $request->delivery_cost;

        // Voeg het totale bedrag toe aan de data-array
        $data['amount'] = $grandTotal;

        // Hier bepalen we de betaalmethode en retourneren we de juiste view
        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal', 'grandTotal'));
        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            return 'cash';
        }
    }
}