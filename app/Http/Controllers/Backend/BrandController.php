<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Brand;
use Image;


class BrandController extends Controller
{
    public function BrandView(){
        // Hier laten we de laatste merken zien
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    public function BrandStore(Request $request) {
        // Hier valideren we de input van het merk
        // We controleren of de velden zijn ingevuld en of er een afbeelding is geüpload.
        
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_hin.required' => 'Input Brand Hindi Name',

        ]);

        $image = $request->file('brand_image'); 
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 
        Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;


        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-',$request->hin),
            'brand_image' => $save_url,
        ]);

        return redirect()->back();

    } //end method



    public function BrandEdit($id){
        // Hier halen we het merk op dat we willen bewerken
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));

    }

    public function BrandUpdate(Request $request){
        // Hier valideren we de input van het merk
        // We controleren of de velden zijn ingevuld en of er een afbeelding is geüpload.
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')){

        unlink($old_image);
        $image = $request->file('brand_image'); 
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 
        Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;


        Brand::findOrFail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-',$request->hin),
            'brand_image' => $save_url,
        ]);

        return redirect()->route('all.brand');
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-',$request->hin),
            ]);
    
            return redirect()->route('all.brand');
        } // end else

    } //end mehthod

    public function BrandDelete($id){
        // Hier verwijderen we het merk en de bijbehorende afbeelding
        // We controleren of het merk bestaat en verwijderen de afbeelding uit de map.
        // Daarna verwijderen we het merk uit de database.
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        brand::findOrFail($id) ->delete();
        return redirect()->back();
    } //end method
    
}
