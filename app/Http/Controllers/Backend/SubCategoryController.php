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
        // Hier halen we de laatste subcategorieën op en tonen we ze in de view.    

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','categories'));



    }

    public function SubCategoryStore(Request $request){
        // Hier valideren we de input van de subcategorie en slaan we deze op.
        
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
        // Hier halen we de subcategorie op die we willen bewerken.
        // We gebruiken findOrFail om de subcategorie op te halen.
        // We tonen de subcategorie in de subcategory_edit view.
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));;
    }

    public function SubCategoryUpdate(Request $request){
        // Hier valideren we de input van de subcategorie en werken we de gegevens bij.
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
        // Hier verwijderen we de subcategorie en alle bijbehorende producten.
        // We gebruiken findOrFail om de subcategorie op te halen en te verwijderen.
        // We gebruiken delete om de subcategorie uit de database te verwijderen.
        // We verwijderen ook de bijbehorende producten.

    SubCategory::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Onderstaande is voor de Sub Sub Category

    public function SubSubCategoryView(){
        // Hier halen we de laatste sub-subcategorieën op en tonen we ze in de view.

        $categories = Category::orderBy('category_name_en','ASC')->get();
           $subsubcategory = SubSubCategory::latest()->get();
           return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
   
        }
   
    
        public function GetSubCategory($category_id){
            // Hier halen we de subcategorieën op die bij de geselecteerde categorie horen.
            // We gebruiken where om de subcategorieën te filteren op basis van de categorie_id
   
            $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
            return json_encode($subcat);
        }
   
   
          public function GetSubSubCategory($subcategory_id){
   
           $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
           return json_encode($subsubcat);
        }


    public function SubSubCategoryStore(Request $request){
        // Hier valideren we de input van de sub-subcategorie en slaan we deze op.  

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
        // Hier halen we de sub-subcategorie op die we willen bewerken.
    	$categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
    	$subsubcategories = SubSubCategory::findOrFail($id);
    	return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));

    }

    public function SubSubCategoryUpdate(Request $request){
        // Hier valideren we de input van de sub-subcategorie en werken we de gegevens bij.

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
        // Hier verwijderen we de sub-subcategorie en alle bijbehorende producten.
        // We gebruiken findOrFail om de sub-subcategorie op te halen en te verwijderen.
        // We gebruiken delete om de sub-subcategorie uit de database te verwijderen.
        SubSubCategory::findOrFail($id)->delete();
        return redirect()->back();
    }

}
