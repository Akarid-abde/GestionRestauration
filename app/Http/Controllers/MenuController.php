<?php

namespace App\Http\Controllers;

use App\menu;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class MenuController extends Controller
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
         return view("managemants.menus.index")->with([
            "menus" => menu::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("managemants.menus.create")->with([
            "categories" => category::all(),
        ]);
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
            'title' => "required|min:3|unique:menus,title",
            'description' => "required|min:5",
            'image' => "required|image|mimes:png,jpg,jpeg|max:2048",
            'price' => "required|min:3|numeric",
            'category_id' => "required|numeric",
        ]);
        //store data
        // dd($request->all());
        $menu = $request->image;
        if($request->hasFile("image")){
            // unlink(public_path('images/menus/'.$menu->image));
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'),$imageName);
       
        menu::create([
            'title'  => $request->title,
            'slug' => Str::slug( $request->title),
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);
        //redirect User
        return redirect("/Menu")->with([
            "success" => "Menu Ajoute avec Success" 

        ]); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $menu = menu::find($id);
          return view("managemants.menus.edite")->with([
            "categories" => category::all(),
            "menus"  =>  $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $menu = menu::find($id);
        //validateur
        $this->validate($request,[
            'title' => "required|min:3|unique:menus,title",
            'description' => "required|min:5",
            'image' => "required|image|mimes:png,jpg,jpeg|max:2048",
            'price' => "required|min:3|numeric",
            'category_id' => "required|numeric"
        ]);
        //store data
        if($request->hasFile("image")){
            unlink(public_path('images/menus/'.$menu->image));
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus/'),$imageName);

        $title  = $request->title;
        menu::create([
            'title'  => $title,
            'slug' => Str::slug($title),
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);
        //redirect User

        return redirect("/Menu")->with([
            "success" => "Menu Modifier avec Success" 
        ]); 
        }else
        {
        $title  = $request->title;
        $menu->update([
            'title'  => $request->title,
            'slug' => Str::slug($title),
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);
        //redirect User

        return redirect("/Menu")->with([
            "success" => "Menu Ajoute avec Success" 

        ]); 

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $menu = menu::find($id);
         $menu->delete();
        return redirect("/Menu")->with([
            "success" => "Menu Supprision avec Success" 

        ]);
    }
}
