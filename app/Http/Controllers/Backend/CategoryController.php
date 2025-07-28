<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        // Hier halen we de laatste categorieën op en tonen we ze in de view.

        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));


    }

    public function CategoryStore(Request $request){
        // Hier valideren we de input van de categorie.
        
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
        // Hier halen we de categorie op die we willen bewerken.
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));

    }

    public function CategoryUpdate(Request $request ,$id){
        // Hier valideren we de input van de categorie en werken we de gegevens bij.

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
        // Hier verwijderen we de categorie en alle bijbehorende producten.

        Category::findOrFail($id)->delete();
        return redirect()->back();

    } // end method

    public function index(){
    // Hier halen we alle categorieën op en tonen we ze in de frontend view.
    $categories = Category::orderBy('category_name_en', 'ASC')->get();
    return view('frontend.categories.index', compact('categories'));
    }

    public function show($id){
    // Hier halen we een specifieke categorie op en de bijbehorende producten.
    $category = Category::findOrFail($id);
    $products = $category->products; // Zorg ervoor dat de relatie in het model is ingesteld
    return view('frontend.categories.show', compact('category', 'products'));
}


}