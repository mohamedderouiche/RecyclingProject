<?php

namespace App\Http\Controllers;
use App\Models\CentreRecyclage;
use App\Models\type_reclamations;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $typeReclamations = type_reclamations::all(); 
        $data = CentreRecyclage::all(); 
    
        return view('home', compact('typeReclamations', 'data')); 
    }
    

}
