<?php

namespace App\Http\Controllers;

use App\Models\TypeEvent;
use Illuminate\Http\Request;

class TypeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer tous les TypeEvents
        $typeEvents = TypeEvent::all();

        // Retourner la vue avec les données
        return view('type_events.index', compact('typeEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Afficher le formulaire de création
        return view('type_events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);
    
        // Vérifier si un fichier image a été téléchargé
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('typeevent_image', $filename, 'public');
            
            // Ajouter le chemin de l'image dans les données validées
            $validated['image'] = $path;
        }
    
        // Assigner l'ID de l'utilisateur connecté
        $validated['users_id'] = auth()->id(); 
    
        // Créer un nouveau TypeEvent avec les données validées
        TypeEvent::create($validated);
    
        // Rediriger vers l'index avec un message de succès
        return redirect()->route('type_events.index')->with('success', 'TypeEvent created successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Trouver le TypeEvent par son id
        $typeEvent = TypeEvent::findOrFail($id);

        // Retourner la vue pour afficher le TypeEvent
        return view('type_events.show', compact('typeEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Trouver le TypeEvent par son id
        $typeEvent = TypeEvent::findOrFail($id);

        // Retourner la vue avec le formulaire d'édition
        return view('type_events.edit', compact('typeEvent'));
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
        // Valider les données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|string',
        ]);

        // Trouver le TypeEvent et mettre à jour avec les nouvelles données
        $typeEvent = TypeEvent::findOrFail($id);
        $typeEvent->update($validated);

        // Rediriger vers l'index avec un message de succès
        return redirect()->route('type_events.index')->with('success', 'TypeEvent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Trouver le TypeEvent par son id
        $typeEvent = TypeEvent::findOrFail($id);

        // Supprimer le TypeEvent
        $typeEvent->delete();

        // Rediriger vers l'index avec un message de succès
        return redirect()->route('type_events.index')->with('success', 'TypeEvent deleted successfully');
    }
}
