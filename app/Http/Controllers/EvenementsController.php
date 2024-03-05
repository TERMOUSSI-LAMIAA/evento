<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvenementsController extends Controller
{
    public function addform(){
        return view("organisateur.create_event");
    }
}
