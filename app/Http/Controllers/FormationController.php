<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all formations

        $formations = formation::all();
        return view('formations.index', compact('formations'));
    }

    public function frontindex()
    {
        // Fetch all formations

        $formations = formation::all();
        return view('formations.trainings', compact('formations'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formations.create');
    }

    public function showInscriptions($id)
    {
        $formation = Formation::findOrFail($id);
        $inscriptions = $formation->inscriptions; // Récupère les inscriptions associées

        return view('formations.inscriptions', compact('formation', 'inscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a formation.');
        }
    
        // Validate input fields
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5',
            'date_formation' => 'required|date',
            'duree' => 'required|numeric|min:1|max:5',
            'lieu' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Add authenticated user ID to validated data
        $validatedData['users_id'] = Auth::id();
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
    
        // Create formation with validated data
        formation::create($validatedData);
    
        return redirect()->route('formations.index')->with('success', 'Formation created successfully.');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the formation by ID
        $formation = formation::findOrFail($id);
        return view('formations.show', compact('formation'));
    }
    public function frontdetails($id)
    {
        // Find the formation by ID
        $formation = formation::findOrFail($id);
        return view('formations.frontdetails', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = formation::findOrFail($id);
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the updated data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date_formation' => 'required|date',
            'duree' => 'required|integer',
            'lieu' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the formation by ID
        $formation = formation::findOrFail($id);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($formation->image) {
                Storage::delete('public/' . $formation->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $formation->image; // Keep the old image
        }

        // Update the formation
        $formation->update([
            'name' => $request->name,
            'description' => $request->description,
            'date_formation' => $request->date_formation,
            'duree' => $request->duree,
            'lieu' => $request->lieu,
            'image' => $imagePath,
        ]);

        return redirect()->route('formations.index')->with('success', 'Formation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the formation by ID
        $formation = formation::findOrFail($id);

        // Delete the image from storage if it exists
        if ($formation->image) {
            Storage::delete('public/' . $formation->image);
        }

        // Delete the formation
        $formation->delete();

        return redirect()->route('formations.index')->with('success', 'Formation deleted successfully.');
    }

    public function getEvents()
{
    $formations = Formation::all()->map(function ($formation) {
        return [
            'title' => $formation->name,
            'start' => $formation->date_formation,
            'description' => $formation->description,
            'id' => $formation->id,
        ];
    });

    return response()->json($formations);
}

}
