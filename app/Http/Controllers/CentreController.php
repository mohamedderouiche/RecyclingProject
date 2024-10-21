<?php

namespace App\Http\Controllers;

use App\Models\CentreRecyclage;
use App\Rules\AlphaSpaces;
use App\Rules\NumericC;
use Illuminate\Http\Request;

class CentreController extends Controller

{
    public function centres(){

        $data=CentreRecyclage::all();
        return view('centres.index', compact('data'));
    }
    public function centresClient(){

        $data = CentreRecyclage::all();
        return view('centreClinets', compact('data'));
    }



    public function create(){
        return view('centres.addCentre');

    }

    public function uploadCentre(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'nom' => ['required', 'string', 'max:12'],
            'adresse' => 'required|string|max:100', // Maximum 100 characters
            'description' => 'nullable|string|min:10', // Minimum 10 characters if provided
            'horaire_ouverture' => 'required|string|max:100',
            'contact' => ['required'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new CentreRecyclage();
        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('centreImages', $imagename);

        $data->image = $imagename;
        $data->nom = $request->nom;
        $data->adresse = $request->adresse;
        $data->description = $request->description;
        $data->horaire_ouverture = $request->horaire_ouverture;
        $data->contact = $request->contact;

        $data->save();

        return redirect()->route('centres.index');
    }

  public function delete($id){

    $currentCenter=CentreRecyclage::find($id);
    $currentCenter->delete();

    return redirect()->back();


}

public function show($id)
{
    $centre = CentreRecyclage::findOrFail($id);

    $dechets = $centre->dechets;

    return view('centres.show', compact('centre', 'dechets'));
}
    public function edit(Request $request)
    {
        $centre = CentreRecyclage::find($request->id);
        return view('centres.updateCentre', compact('centre'));
    }

    public function updateCentre(Request $request, $id)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:12'],
            'adresse' => 'required|string|max:100', // Maximum 100 characters
            'description' => 'nullable|string|min:10', // Minimum 10 characters if provided
            'horaire_ouverture' => 'required|string|max:100',
            'contact' => ['required'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $centre = CentreRecyclage::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('centreImages', $imagename);
            $centre->image = $imagename;
        }

        $centre->nom = $request->input('nom');
        $centre->adresse = $request->input('adresse');
        $centre->description = $request->input('description');
        $centre->horaire_ouverture = $request->input('horaire_ouverture');
        $centre->contact = $request->input('contact');

        $centre->save();

        return redirect()->route('centres.index')->with('success', 'Centre updated successfully');
    }





}
