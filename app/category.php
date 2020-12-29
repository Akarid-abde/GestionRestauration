<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = ["title","slug"];

    public function menu(){
    	return $this->hasMany(menu::class);
    }

    public function getRouteKeyName(){
    	return "slug";
    }
}
