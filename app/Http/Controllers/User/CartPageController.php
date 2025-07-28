<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function MyCart(){
        // Hier tonen we de winkelwagen pagina aan de gebruiker.
        // We gebruiken de view 'frontend.wishlist.view_mycart' om de inhoud van de winkelwagen weer te geven.
        // Deze view bevat een lijst van producten die in de winkelwagen zijn toegevoegd.
        // De gebruiker kan hier zijn winkelwagentje bekijken en producten verwijderen of bijwerken.
    	return view('frontend.wishlist.view_mycart');

    }


    public function GetCartProduct(){
        // Hier halen we de inhoud van de winkelwagen op en retourneren we deze als JSON.
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => round($cartTotal),

    	));

    } //end method 



    public function RemoveCartProduct($rowId){
        // Hier verwijderen we een product uit de winkelwagen op basis van de rowId.
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);
    }


    // Cart Increment 
    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json('increment');

    } // end mehtod 


   // Cart Decrement  
    public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('Decrement');

    }// end mehtod 



} 