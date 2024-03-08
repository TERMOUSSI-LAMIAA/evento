<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Evenements;

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

    public function updateCatgForm($id){
        $catg=Categories::find($id);
        return view("admin.updt_catg",compact('catg'));
    }

    public function updateCatg(Request $request){
        $catg=Categories::find($request->id);
     
        $catg->titre=$request->titre;
        $catg->description=$request->description;
        $catg->update();
        return redirect()->route('getCatgs')->with('success', 'Category updated successfully');

    }

    public function deleteCatg($id){
        $catg=Categories::find($id);
    $events=Evenements::where('categorie_id',$id)->count();
    
    if ($events>0) {

        return redirect()->back()->with('error', 'Category has related events. Cannot delete!');
       
    } else {
     $catg->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
      
    }
}
  // if ($catg->evenements()->exists()){
        //     return redirect()->back()->with('error', 'Cannot delete! Category is associated with event');
        // }else{