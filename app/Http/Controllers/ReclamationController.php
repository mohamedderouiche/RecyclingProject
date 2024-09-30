<?php

namespace App\Http\Controllers;
use App\Models\reclamation;
use App\Models\status_reclamations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\type_reclamations;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve only the logged-in user's reclamations with user information
        $reclamations = reclamation::where('users_id', Auth::id())
            ->with(['statusReclamation', 'user','typeReclamation']) // Load the status and user relationships
            ->get();

        return view('reclamations.index', compact('reclamations'));


    }


    public function adminIndex()
    {
    // Retrieve all reclamations for admin view
    $reclamations = reclamation::with('statusReclamation', 'user','typeReclamation')->get();
    $statuses = status_reclamations::all();
    return view('reclamations.admin_index', compact('reclamations', "statuses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       $typeReclamations = type_reclamations::all();
         // Show the form for creating a new reclamation
         return view('reclamations.createReclamation', compact('typeReclamations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_reclamation_id' => 'required|exists:type_reclamations,id', // Validation for type reclamation
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

       // Handle image upload
    $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        // Create reclamation and associate with the authenticated user
        reclamation::create([
            'type_reclamation_id' => $request->type_reclamation_id, // Save the correct type_reclamation_id
            'description' => $request->description,
            'image' => $imagePath,
            'users_id' => Auth::id(),
        ]);

        return redirect()->route('reclamations.index')->with('success', 'Reclamation created successfully.');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the reclamation by ID with related user, status, and type of reclamation
        $reclamation = reclamation::with(['statusReclamation', 'user', 'typeReclamation'])
            ->findOrFail($id);

        // Pass the reclamation details to the view
        return view('reclamations.show', compact('reclamation'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $request->validate([
            'status_reclamation_id' => 'required|exists:status_reclamations,id',
        ]);

        // Find the reclamation by ID
        $reclamation = Reclamation::findOrFail($id);

        // Update the reclamation's status
        $reclamation->status_reclamations_id = $request->status_reclamation_id;

        // Save the updated reclamation
        $reclamation->save();

        return redirect()->route('reclamations.admin_index')->with('success', 'Reclamation updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Find the reclamation by ID
    $reclamation = Reclamation::findOrFail($id);

    // Delete the reclamation
    $reclamation->delete();

    // Redirect back to the admin index with a success message
    return redirect()->route('reclamations.admin_index')->with('success', 'Reclamation deleted successfully.');
}

}
