<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class CategoryController extends Controller
{

    public function _construct(){
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("managemants.categories.index")->with([
            "categories" => category::paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view("managemants.categories.create");
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
            'title' => "required|min:3"
        ]);
        //store data
        $title  = $request->title;
        category::create([
            'title'  => $title,
            'slug' => Str::slug($title)

        ]);
        //redirect User

        return redirect("/home")->with([
            "success" => "categories Ajoute avec Success" 

        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category,$id)
    {
        $category = category::find($id);
        return view("managemants.categories.edit")->with([
            "category" =>  $category,
        ]);

     // return view('managemants.categories.edit',["category" =>  $category,]);         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $categ = category::find($id);
                //validateur
        $this->validate($request,[
            'title' => "required"
        ]);
        //store data
        $title  = $request->title;
         $categ->update([
            'title'  => $title,
            'slug' => Str::slug($title)

        ]);
        //redirect User

        return redirect("/home")->with([
            "success" => "categories Modification avec Success" 

        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = category::find($id);
        $cate->delete();
        return redirect("/home")->with([
            "success" => "categories Supprision avec Success" 

        ]);
    }
}
