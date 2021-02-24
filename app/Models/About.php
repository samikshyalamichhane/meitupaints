<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table='about';
    protected $fillable=['title1','description1','short_description1','title2','description2','short_description2','title3','description3','short_description3','image1','image2','dedicated_team_member','projects_completed','regular_users','awards','publish'];
}
