<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_case extends Model
{
    protected $table='project_cases';
    protected $fillable=['title','description','image','publish','short_description'];
}
