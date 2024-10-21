<?php

namespace App\Http\Controllers;

use App\Models\Dechet;
use App\Rules\AlphaSpaces;
use Illuminate\Http\Request;
use App\Models\CentreRecyclage;


class DechetController extends Controller
{


    public function dechets(){

        $data = Dechet::with('centreRecyclage')->get();
        return view('Dechets.index', compact('data'));
    }


    public function create(){
        $centres = CentreRecyclage::all();

        return view('Dechets.addDechet', compact('centres'));


    }

    public function uploadDechet(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'categorie' =>  ['required', 'string', 'min:7'],
            'quantite' => 'required|integer|min:0',
            'centre_recyclage_id' => 'required|exists:centre_recyclages,id',
        ]);

        $data = new Dechet();

        $data->categorie = $request->categorie;
        $data->quantite = $request->quantite;
        $data->centre_recyclage_id = $request->centre_recyclage_id;

        $data->save();

        return redirect()->route('dechets.index');
    }

  public function delete($id){

    $currentDechet=Dechet::find($id);
    $currentDechet->delete();

    return redirect()->back();


}


public function edit(Request $request)
{
    $dechet = Dechet::find($request->id);
    $centres = CentreRecyclage::all();

    return view('Dechets.updateDechet', compact('dechet', 'centres'));
}

public function updateDechet(Request $request, $id)
{
    $request->validate([
        'categorie' =>  ['required', 'string', 'min:7'],
        'quantite' => 'required|integer|min:0',
        'centre_recyclage_id' => 'required|exists:centre_recyclages,id',
    ]);

    $data = Dechet::find($id);

    if (!$data) {
        return redirect()->route('dechets.index')->with('error', 'Dechet not found.');
    }

    $data->categorie = $request->categorie;
    $data->quantite = $request->quantite;
    $data->centre_recyclage_id = $request->centre_recyclage_id;

    $data->save();

    return redirect()->route('dechets.index')->with('success', 'Dechet updated successfully');
}



}
