<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        // Hier definiëren we de relatie tussen het Product model en het Category model.
    	return $this->belongsTo(Category::class,'category_id','id');
    }


    public function brand(){
        // Hier definiëren we de relatie tussen het Product model en het Brand model.
        // Dit geeft aan dat een product behoort tot een merk.
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }



}
  