<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;

class Category extends Model
{
    use Sluggable;

    /**
     * Get the options for generating the slug.
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
    

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeCategoryslug($query, $slug)
    {
        // dd($slug);
       return $query->where('slug',$slug);
    }
    protected $fillable= ['name','slug','user_id','status'];


}
