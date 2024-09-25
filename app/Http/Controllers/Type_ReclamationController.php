<?php

namespace App\Http\Controllers;
use App\Models\type_reclamations;
use Illuminate\Http\Request;

class Type_ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = type_reclamations::all();
        return view('type_reclamations.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('type_reclamations.create');
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
            'name' => 'required|string|max:255',
        ]);

        type_reclamations::create($request->all()); // Create a new record

        return redirect()->route('type_reclamations.index')->with('success', 'Type Reclamation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = type_reclamations::findOrFail($id);
        return view('type_reclamations.edit', compact('type')); // Return the edit view
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
            'name' => 'required|string|max:255',
        ]);

        $type = type_reclamations::findOrFail($id);
        $type->update($request->all()); // Update the record

        return redirect()->route('type_reclamations.index')->with('success', 'Type Reclamation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = type_reclamations::findOrFail($id);
        $type->delete(); // Delete the record

        return redirect()->route('type_reclamations.index')->with('success', 'Type Reclamation deleted successfully.');
    }
}
