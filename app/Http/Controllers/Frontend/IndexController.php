<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;


class IndexController extends Controller
{
    public function index() {
        // Hier halen we de laatste producten, sliders en categorieën op en tonen we deze in de index view.
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('Frontend.index',compact('categories','sliders','products'));
    }

    public function UserLogout() {
        // Hier loggen we de gebruiker uit en sturen we hem terug naar de login pagina.
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile() {
        // Hier halen we de ingelogde gebruiker op en tonen we zijn profiel in de user_profile view.
        // We gebruiken Auth::user() om de ingelogde gebruiker te krijgen en vinden de gebruiker met zijn id.
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request) {
        // Hier valideren we de input van de gebruiker en slaan we deze op in de database.
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        // Hieronder uploaden wij de profile picture naar de juiste map en verwijderen we de bestaande foto als er nieuwe wordt geupload. Daarnaast geven we het bestand een naam en geven wij die door aan de database.
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        return redirect()->route('dashboard');


    }  //end method

    public function UserChangePassword() {
        // Hier halen we de ingelogde gebruiker op en tonen we zijn wachtwoord wijziging pagina.
        // We gebruiken Auth::user() om de ingelogde gebruiker te krijgen en vinden de gebruiker met zijn id.
        // We tonen de gebruiker zijn huidige gegevens in de change_password view.
        // Deze view bevat een formulier waar de gebruiker zijn oude wachtwoord en nieuwe wachtwoord kan invoeren.
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function AdminChangePassword() {
        // Hier tonen we de admin change password pagina.
        return view('admin.admin_change_password');
    }

    public function UserPasswordUpdate(request $request){
        // Hier valideren we de input van de gebruiker en werken we het wachtwoord bij.

        $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }

    } //end method

    public function ProductDetails($id,$slug){
        // Hier halen we de productgegevens op op basis van het id en tonen we deze in de product details view.
		$product = Product::findOrFail($id);

		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);


		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_size_en','relatedProduct'));

	}

    // Subcategory wise data
    public function SubCatWiseProduct(Request $request, $subcat_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.product.subcategory_view',compact('products','categories'));
    }

    // Sub-Subcategory wise data
	public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_en','ASC')->get();

		return view('frontend.product.sub_subcategory_view',compact('products','categories'));
    }

    // Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);
		$color = $product->product_color_en;
		$product_color = explode(',', $color);
		$size = $product->product_size_en;
		$product_size = explode(',', $size);
		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
		));

	} // end method 

}