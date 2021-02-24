<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
     protected $table='products';
     public function categories()
     {
         return $this->belongsTo('App\Models\Category', 'category_id');
     }
     public function scopeProductslug($query, $slug)
    {
       return $query->whereSlug($slug);
    }
    public function scopePublished($query)
    {
        return $query->where('publish', 1);
    }
    protected $fillable=['title','description','image','publish','slug','meta_title','meta_description','writer','keyword','short_description','author','banner_image','category_id'];
}
