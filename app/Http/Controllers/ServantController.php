<?php

namespace App\Http\Controllers;

use App\servant;
use Illuminate\Http\Request;

class ServantController extends Controller
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
       return view("managemants.serveur.index")->with([
            "serveurs" => servant::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("managemants.serveur.create");
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
            'name' => "required|min:3",
        ]);
        //store data
        servant::create([
            'name'  => $request->name,
            'address' => $request->address
        ]);
        //redirect User
        return redirect("/Servant")->with([
            "success" => "serveur Ajoute avec Success" 

        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function show(servant $servant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $serveur = servant::find($id);
        return view("managemants/serveur/edite")->with([
            "serveur" =>  $serveur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $se = servant::find($id);
        //validateur
        $this->validate($request,[
            'name' => "required|min:3",
            'address' =>  "required"

        ]);
        //store data
         $se->update([
            'name'  => $request->name,
            'address'  => $request->address

        ]);
        //redirect User
        return redirect("/Servant")->with([
            "success" => "serveur Modification avec Success" 
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serveur = servant::find($id);
        $serveur->delete();
        return redirect("/Servant")->with([
            "success" => "servaur Supprision avec Success"
        ]);
    }
}
