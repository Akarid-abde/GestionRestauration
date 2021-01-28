<?php

namespace App\Http\Controllers;

use App\Table;
use App\category;
use App\servant;
use Illuminate\Http\Request;

class PayementController extends Controller
{

     public function index()
    {
         return view("payements.index")->with([
            "tables" => Table::all(),
            "categories"  => category::all(),
            "servants"  => servant::all(),

        ]);
    }

}
