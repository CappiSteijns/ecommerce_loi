<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
 
class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        // Hier voegen we een product toe aan het winkelwagentje.

         if (Session::has('coupon')) {
           Session::forget('coupon');
        }
          
    	$product = Product::findOrFail($id);

    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->selling_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
    		]);

    		return response()->json(['success' => 'Product succesvol toegevoegd aan uw winkelwagentje']);
    		 
    	}else{

    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->discount_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Product succesvol toegevoegd aan uw winkelwagentje']);
    	}

    } // end mehtod 


    // Mini Cart Section
    public function AddMiniCart(){
        // Hier halen we de inhoud van het winkelwagentje op en tonen we deze in de mini cart.

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => round($cartTotal),

    	));
    } // end method 


/// remove mini cart 
    public function RemoveMiniCart($rowId){
        // Hier verwijderen we een product uit de mini cart op basis van de rowId.
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product verwijderd uit winkelwagentje']);

    } // end mehtod 


    // add to wishlist mehtod 

    public function AddToWishlist(Request $request, $product_id){
        // Hier voegen we een product toe aan de verlanglijst.

        if (Auth::check()) {

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            }else{

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);

            }            
            
        }else{

            return response()->json(['error' => 'Je moet eerst inloggen']);

        }

    } // end method 




    public function CouponApply(Request $request){
        // Hier passen we een kortingsbon toe op het winkelwagentje. Maar deze gebruiken wij niet in productie.

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
 
            return response()->json(array(

                'success' => 'Coupon Applied Successfully'
            ));
            
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    } // end method 


    public function CouponCalculation(){
        // Gebruiken wij ook niet.

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    } // end method 


 // Remove Coupon 
    public function CouponRemove(){
        // Hier verwijderen we de kortingsbon uit de sessie maar deze gebruiken wij niet in productie.
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }



 // Checkout Method 
    public function CheckoutCreate(){
        // Hier controleren we of de gebruiker is ingelogd en of er producten in het winkelwagentje zijn.

        if (Auth::check()) {
            if (Cart::total() > 0) {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        
        return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal'));
                
            }else{

            $notification = array(
            'message' => 'Selecteer minstens 1 product',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification);

            }

            
        }else{

             $notification = array(
            'message' => 'Je moet eerst inloggen',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification);

        }

    } // end method 






}
 