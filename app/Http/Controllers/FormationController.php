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
    
        // Validate the form input including image
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date_formation' => 'required|date',
            'duree' => 'required|integer',
            'lieu' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Handle image upload
        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;
    
        // Create the new formation with the image path and associate with the authenticated user
        formation::create([
            'name' => $request->name,
            'description' => $request->description,
            'date_formation' => $request->date_formation,
            'duree' => $request->duree,
            'lieu' => $request->lieu,
            'image' => $imagePath,
            'users_id' => Auth::id(), // Associate with the authenticated user
        ]);
    
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
}
