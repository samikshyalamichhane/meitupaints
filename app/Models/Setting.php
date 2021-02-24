<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
   	protected $fillable=['facebook','twitter','linkedin','googleplus','pininterest','email','youtube','fav_icon','logo','home','home_banner_image','about_us_banner_image','buy_banner_image','contact_banner_image','products_banner_image','projects_banner_image', 'image', 'title', 'short_description', 'description', 'footer_description','footer_logo', 'phone', 'address','address1', 'office_map', 'cell','video'];

   	
   	public function youtubeVideo($url){
    	$url_string = parse_url($url, PHP_URL_QUERY);
  		parse_str($url_string, $args);
  		return isset($args['v']) ? $args['v'] : false;
    }
}
