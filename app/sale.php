<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    //
     protected $fillable = ["user_id","quantity","total_price","total_received","change","payment_type","payment_status"];


     public function menus(){
     	return $this->belongsToMany(menu::class);
     }

     public function tables(){
     	return $this->belongsToMany(Table::class);
     }

     public function servants(){
     	return $this->belongsTo(servant::class);
     }
}
