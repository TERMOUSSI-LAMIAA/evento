<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenements;
use App\Models\Categories;     
use App\Models\Reservations;     
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class EvenementsController extends Controller
{
    public function getEvents(){

        $organisateur_id=Auth::id();
        $events=Evenements::where('organisateur_id',$organisateur_id)->get();
        
        return view("organisateur.events",compact("events"));
    }

    public function getAllEvent(){
          $events=Evenements::all();
          return view("client.events",compact('events'));
    }
    public function getDetails($id){
        $event=Evenements::find($id);
        return view("client.details",compact('event'));
    }
    public function addform(){
        $categories=Categories::all();
        return view('organisateur.create_event',compact("categories"));
    }

    public function addEvent(Request $request){
        //!validation
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

    public function updtForm($id){
        $categories=Categories::all();
        $event = Evenements::find($id);
        if (!$event) {
            abort(404); 
        }
        return view("organisateur.updt_event",compact('event','categories'));
    }

    public function updtEvent(Request $request){
        //todo:validate
        //! check if the event doesn't have reservations
        $event=Evenements::find($request->id);
        $event->titre=$request->titre;
        $event->description=$request->description;
        $event->date=$request->date;
        $event->lieu=$request->lieu;
        $event->duree=$request->duree;
        $event->nbr_places=$request->nbr_places;
        $event->acceptation=$request->acceptation;
        if ($request->hasFile('img')) {
            $event->img = $request->file('img')->store('images', 'public');
        }   
        $event->prix=$request->prix;
        $event->categorie_id=$request->category;
        $event->update();
        return redirect()->route('getEvents')->with('success', 'Event updated successfully');
    }

    public function deleteEvent($id){
        $event=Evenements::find($id);
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully');
    }

    public function reserveEvent($id){
        $client=Auth::id();
        $event=Evenements::find($id);
        $reservation=new Reservations([
            "client_id"=>$client,
            "evenement_id"=>$id,
        ]);
        if($event->acceptation==="automatique")
        {
            $reservation->is_valid = 1;
        }else{
            $reservation->is_valid = 0;
        }
        $reservation->save();
        return redirect()->route('getAllEvent')->with('success','Réservation effectuée avec succés');

    }
}
