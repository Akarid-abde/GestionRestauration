<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class TableController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view("managemants.tables.index")->with([
            "tables" => Table::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("managemants.tables.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validateur
        $this->validate($request,[
            'name' => "required|unique:tables,name",
            'status' => "required|boolean"
        ]);
        //store data
        $name  = $request->name;
        Table::create([
            'name'  => $name,
            'slug' => Str::slug($name),
            'status' => $request->status

        ]);
        //redirect User
        return redirect("/Tables")->with([
            "success" => "table Ajoute avec Success" 

        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);
        return view("managemants/tables/edite")->with([
            "table" =>  $table,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $ta = Table::find($id);
        //validateur
        $this->validate($request,[
            'name' => "unique:tables,name,".$ta->id,
            'status' => "required"
        ]);
        //store data
        $name  = $request->name;
         $ta->update([
            'name'  => $name,
            'slug' => Str::slug($name),
            'status' => $request->status

        ]);
        //redirect User
        return redirect("/Tables")->with([
            "success" => "tables Modification avec Success" 

        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ta = Table::find($id);
        $ta->delete();
        return redirect("/Tables")->with([
            "success" => "table Supprision avec Success" 

        ]);
    }
}
