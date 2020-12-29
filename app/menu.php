<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
        //
    protected $fillable = ["title","slug","description","image","price","category_id"];

    public function category(){
    	return $this->belongsTo(category::class);
    }

    public function getRouteKeyName(){
    	return "slug";
    }

    public function sales(){
    	return $this->belongsToMany(sale::class);
    }
}
