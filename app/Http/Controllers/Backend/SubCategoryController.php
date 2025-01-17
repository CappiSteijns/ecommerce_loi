<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;




class SubCategoryController extends Controller
{
    public function SubCategoryView(){

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','categories'));



    }

    public function SubCategoryStore(Request $request){
        
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_nl' => 'required',
        ],[
            'category_id.required' => 'Please select correct categorie',
            'subcategory_name_en.required' => 'Input Sub Category English Name',

        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
		    'subcategory_name_en' => $request->subcategory_name_en,
		    'subcategory_name_nl' => $request->subcategory_name_nl,
		    'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
		    'subcategory_slug_nl' => str_replace(' ', '-',$request->subcategory_name_nl),
        ]);

        return redirect()->back();

    } //end method

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));;
    }

    public function SubCategoryUpdate(Request $request){
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
		    'subcategory_name_en' => $request->subcategory_name_en,
		    'subcategory_name_nl' => $request->subcategory_name_nl,
		    'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
		    'subcategory_slug_nl' => str_replace(' ', '-',$request->subcategory_name_nl),
        ]);

        return redirect()->route('all.subcategory');

    } // end method

    public function SubCategoryDelete($id){

    SubCategory::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Onderstaande is voor de Sub Sub Category

    public function SubSubCategoryView(){

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));

    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
     }


    public function SubSubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_id' => 'required',
             'subsubcategory_name_en' => 'required',
             'subsubcategory_name_nl' => 'required',
         ],[
             'category_id.required' => 'Please select Any option',
             'subsubcategory_name_en.required' => 'Input SubSubCategory English Name',
         ]);
 
          
 
        SubSubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'subsubcategory_name_en' => $request->subsubcategory_name_en,
         'subsubcategory_name_nl' => $request->subsubcategory_name_nl,
         'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_slug_en)),
         'subsubcategory_slug_nl' => str_replace(' ', '-',$request->subsubcategory_slug_nl),
          
 
         ]);
 
         return redirect()->back();
 
     } // end method 

    public function SubSubCategoryEdit($id){
    	$categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
    	$subsubcategories = SubSubCategory::findOrFail($id);
    	return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));

    }

    public function SubSubCategoryUpdate(Request $request){

    	$subsubcat_id = $request->id;

    	SubSubCategory::findOrFail($subsubcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_id' => $request->subcategory_id,
		'subsubcategory_name_en' => $request->subsubcategory_name_en,
		'subsubcategory_name_nl' => $request->subsubcategory_name_nl,
		'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
		'subsubcategory_slug_nl' => str_replace(' ', '-',$request->subsubcategory_slug_nl),
		 

    	]);

		return redirect()->route('all.subsubcategory');

    } // end method 

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        return redirect()->back();
    }

}
