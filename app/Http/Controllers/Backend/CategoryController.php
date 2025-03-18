<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){

        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));


    }

    public function CategoryStore(Request $request){
        
        $request->validate([
            'category_name_en' => 'required',
            'category_name_nl' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Input Category English Name',
            'category_name_nl.required' => 'Input Category Dutch Name',

        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_nl' => $request->category_name_nl,
            'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_slug_en)),
            'category_slug_nl' => str_replace(' ', '-',$request->category_slug_nl),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->back();

    } //end method

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));

    }

    public function CategoryUpdate(Request $request ,$id){

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
		    'category_name_nl' => $request->category_name_nl,
		    'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		    'category_slug_nl' => str_replace(' ', '-',$request->category_name_nl),
		    'category_icon' => $request->category_icon,
        ]);

        return redirect()->route('all.category');

    } // end method

    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();
        return redirect()->back();

    } // end method

    public function index(){
    $categories = Category::orderBy('category_name_en', 'ASC')->get();
    return view('frontend.categories.index', compact('categories'));
    }

    public function show($id)
{
    $category = Category::findOrFail($id);
    $products = $category->products; // Zorg ervoor dat de relatie in het model is ingesteld
    return view('frontend.categories.show', compact('category', 'products'));
}


}