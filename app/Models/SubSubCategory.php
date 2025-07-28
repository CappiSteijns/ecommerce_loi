<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_nl',
        'subsubcategory_slug_en',
        'subsubcategory_slug_nl',
    ];

    public function category(){
        // Hier definiëren we de relatie tussen het SubSubCategory model en het Category model.
    	return $this->belongsTo(Category::class,'category_id','id');
    }


    public function subcategory(){
        // Hier definiëren we de relatie tussen het SubSubCategory model en het SubCategory model.
    	return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

}
