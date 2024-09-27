<?php

namespace App\Http\Controllers;
use App\Models\type_reclamations;
use App\Models\TypeEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $typeEvents = TypeEvent::all();
        $typeReclamations = type_reclamations::all();

        return view('home', compact('typeReclamations','typeEvents'));
    }

}
