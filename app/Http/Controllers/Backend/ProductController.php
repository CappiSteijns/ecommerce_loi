<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;

use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    
	public function AddProduct(){
		// Hier halen we de laatste categorieën en merken op voor de product toevoeging.
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands'));

	}


	public function StoreProduct(Request $request){
		// Hier valideren we de input van het product.

 
        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

      $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_nl' => $request->product_name_nl,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_nl' => str_replace(' ', '-', $request->product_name_nl),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_nl' => $request->product_tags_nl,
      	'product_size_en' => $request->product_size_en,
      	'product_size_nl' => $request->product_size_nl,
      	'product_color_en' => $request->product_color_en,
      	'product_color_nl' => $request->product_color_nl,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_nl' => $request->short_descp_nl,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_nl' => $request->long_descp_nl,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

      	'product_thambnail' => $save_url,


      ]);


     ////////// Multiple Image Upload Start ///////////

	 $images = $request->file('multi_img');
	 foreach ($images as $img) {
		 $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
	   Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
	   $uploadPath = 'upload/products/multi-image/'.$make_name;

	   MultiImg::insert([

		   'product_id' => $product_id,
		   'photo_name' => $uploadPath,
		   'created_at' => Carbon::now(), 

	   ]);

	 }

	 ////////// End Multiple Image Upload Start ///////////


	  $notification = array(
		   'message' => 'Product Inserted Successfully',
		   'alert-type' => 'success'
	   );

	   return redirect()->route('manage-product');


   } // end method

   public function ManageProduct(){
	// Hier halen we de laatste producten op en tonen we ze in de product beheer view.
	$products = Product::latest()->get();
	return view('backend.product.product_view',compact('products'));

   }

   public function EditProduct($id){
	// Hier halen we de product gegevens op die we willen bewerken.
	// We halen ook de bijbehorende afbeeldingen op.

	$multiImgs = MultiImg::where('product_id',$id)->get();

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products','multiImgs'));


   }

   public function ProductDataUpdate(Request $request){
	// Hier valideren we de input van het product en werken we de gegevens bij.

	$product_id = $request->id;

	Product::findOrFail($product_id)->update([
		'brand_id' => $request->brand_id,
		'category_id' => $request->category_id,
		'subcategory_id' => $request->subcategory_id,
		'subsubcategory_id' => $request->subsubcategory_id,
		'product_name_en' => $request->product_name_en,
		'product_name_nl' => $request->product_name_nl,
		'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
		'product_slug_nl' => str_replace(' ', '-', $request->product_name_nl),
		'product_code' => $request->product_code,

		'product_qty' => $request->product_qty,
		'product_tags_en' => $request->product_tags_en,
		'product_tags_nl' => $request->product_tags_nl,
		'product_size_en' => $request->product_size_en,
		'product_size_nl' => $request->product_size_nl,
		'product_color_en' => $request->product_color_en,
		'product_color_nl' => $request->product_color_nl,

		'selling_price' => $request->selling_price,
		'discount_price' => $request->discount_price,
		'short_descp_en' => $request->short_descp_en,
		'short_descp_nl' => $request->short_descp_nl,
		'long_descp_en' => $request->long_descp_en,
		'long_descp_nl' => $request->long_descp_nl,

		'hot_deals' => $request->hot_deals,
		'featured' => $request->featured,
		'special_offer' => $request->special_offer,
		'special_deals' => $request->special_deals,


	]);

	return redirect()->route('manage-product');


   } // end method

   public function MultiImageUpdate(Request $request){
	// Hier valideren we de input van de afbeeldingen en werken we de afbeeldingen bij.
	$imgs = $request->multi_img;

	foreach ($imgs as $id => $img) {
	$imgDel = MultiImg::findOrFail($id);
	unlink($imgDel->photo_name);
	 
	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
	Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
	$uploadPath = 'upload/products/multi-image/'.$make_name;

	MultiImg::where('id',$id)->update([
		'photo_name' => $uploadPath,
		'updated_at' => Carbon::now(),

	]);

 } // end foreach

   $notification = array(
		'message' => 'Product Image Updated Successfully',
		'alert-type' => 'info'
	);

	return redirect()->back()->with($notification);



   } // end method

   public function ThumbnailImageUpdate(Request $request){
	// Hier valideren we de input van de product thumbnail afbeelding en werken we deze bij.
	$pro_id = $request->id;
	$oldImage = $request->old_img;
	unlink($oldImage);

   $image = $request->file('product_thambnail');
	   $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	   Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
	   $save_url = 'upload/products/thambnail/'.$name_gen;

	   Product::findOrFail($pro_id)->update([
		   'product_thambnail' => $save_url,
		   'updated_at' => Carbon::now(),

	   ]);

		$notification = array(
		   'message' => 'Product Image Thambnail Updated Successfully',
		   'alert-type' => 'info'
	   );

	   return redirect()->back()->with($notification);

	} // end method

	//// Multi Image Delete ////
	public function MultiImageDelete($id){
		$oldimg = MultiImg::findOrFail($id);
		unlink($oldimg->photo_name);
		MultiImg::findOrFail($id)->delete();

		$notification = array(
		   'message' => 'Product Image Deleted Successfully',
		   'alert-type' => 'success'
	   );

	   return redirect()->back()->with($notification);

	} // end method 

	public function ProductInactive($id){
	// Hier zetten we de status van het product op inactief (0).
		Product::findOrFail($id)->update(['status' => 0]);
		$notification = array(
		   'message' => 'Product Inactive',
		   'alert-type' => 'success'
	   );

	   return redirect()->back()->with($notification);
	}


 public function ProductActive($id){
	// Hier zetten we de status van het product op actief (1).
	 Product::findOrFail($id)->update(['status' => 1]);
		$notification = array(
		   'message' => 'Product Active',
		   'alert-type' => 'success'
	   );

	   return redirect()->back()->with($notification);
		
	} // End method active and inactive

	public function ProductDelete($id){
	// Hier verwijderen we het product en de bijbehorende afbeeldingen.
	// We verwijderen ook de thumbnail afbeelding en alle bijbehorende multi-afbeeldingen.
		// We gebruiken unlink om de afbeeldingen van de server te verwijderen.
		// We gebruiken findOrFail om het product op te halen en te verwijderen.
		// We gebruiken MultiImg om de bijbehorende afbeeldingen op te halen en te verwijderen
		// We gebruiken unlink om de multi-afbeeldingen van de server te verwijderen.
		// We gebruiken delete om de multi-afbeeldingen uit de database te verwijderen.
		$product = Product::findOrFail($id);
		unlink($product->product_thambnail);
		Product::findOrFail($id)->delete();

		$images = MultiImg::where('product_id',$id)->get();
		foreach ($images as $img) {
			unlink($img->photo_name);
			MultiImg::where('product_id',$id)->delete();
		}

		$notification = array(
		   'message' => 'Product Deleted Successfully',
		   'alert-type' => 'success'
	   );

	   return redirect()->back()->with($notification);

	}// end delete method 

}