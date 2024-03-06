<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function addCatgForm(){
        return view("admin.add_categorie");
    }

    public function addCatg(Request $request){
        $request->validate([
            "titre" =>['required', 'string', 'max:255'],
            "description"=>['required', 'string']
        ]);

        Categories::create([
            "titre"=>$request->titre,
            "description"=>$request->description,
        ]);
        return redirect()->route('getCatgs')->with('success', 'Category added successfully');
    }

    public function getCatgs()
    {
        $catgs=Categories::all();
        return view("admin.categories",compact("catgs"));
    }

    
}
