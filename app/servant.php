<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servant extends Model
{
    //

     protected $fillable = ["name","address"];


     public function sales(){
     	return $this->hasMany(menu::class);
     }
}
