<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Validate the form input including image
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date_formation' => 'required|date',
            'duree' => 'required|integer',
            'lieu' => 'required|string|max:255',
            'users_id' => 'required|integer|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Create the new formation with the image path
        formation::create([
            'name' => $request->name,
            'description' => $request->description,
            'date_formation' => $request->date_formation,
            'duree' => $request->duree,
            'lieu' => $request->lieu,
            'users_id' => $request->users_id,
            'image' => $imagePath,  // Store the image path if available
        ]);

        return redirect()->route('formations.index')->with('success', 'Formation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(formation $formation)
    {
        return view('formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(formation $formation)
    {
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, formation $formation)
    {
        // Validate the updated data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date_formation' => 'required|date',
            'duree' => 'required|integer',
            'lieu' => 'required|string|max:255',
            'users_id' => 'required|integer|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($formation->image) {
                Storage::delete('public/' . $formation->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $formation->image;
        }

        $formation->update([
            'name' => $request->name,
            'description' => $request->description,
            'date_formation' => $request->date_formation,
            'duree' => $request->duree,
            'lieu' => $request->lieu,
            'users_id' => $request->users_id,
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
    public function destroy(formation $formation)
    {
        // Delete the image from storage if it exists
        if ($formation->image) {
            Storage::delete('public/' . $formation->image);
        }

        // Delete the formation
        $formation->delete();

        return redirect()->route('formations.index')->with('success', 'Formation deleted successfully.');
    }
}
