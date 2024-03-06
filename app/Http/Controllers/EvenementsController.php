<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenements;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class EvenementsController extends Controller
{
    public function getEvents(){
        //!events for the authentified user
        $events=Evenements::all();
        
        return view("organisateur.events",compact("events"));
    }

    public function addform(){
        $categories=Categories::all();
        return view('organisateur.create_event',compact("categories"));
    }

    public function addEvent(Request $request){
        // $request->validate([
        //     'titre' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     // 'date' => 'required|date',
        //     'date' => 'required',
        //     'lieu' => 'required|string|max:255',
        //     'duree' => 'required|string|max:255',
        //     'nbr_places' => 'required|integer',
        //     'acceptation' => 'required|in:automatique,manuelle',
        //     'img' => 'image|mimes:jpeg,png,jpg,gif|max:1024', 
        //     'prix' => 'required|numeric',
        //     // 'category' => 'required|exists:categories,id',
        //     'category' => 'required',
        // ]);
        $event = new Evenements([
        'titre' => $request->titre,
        'description' => $request->description,
        'date' => $request->date,
        'lieu' => $request->lieu,
        'duree' => $request->duree,
        'nbr_places' => $request->nbr_places,
        'acceptation' => $request->acceptation,
        'img' => $request->file('img')->store('images', 'public'),
        'prix' => $request->prix,
        'categorie_id' => $request->category, 
        'organisateur_id' => Auth::id(), 
        ]);

        $event->save();
        return redirect()->route('getEvents')->with('success', 'Event created successfully');
    }
}
