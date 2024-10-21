<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function homeDisplay()
    {
        // Récupérer tous les TypeEvents
        $typeEvents = TypeEvent::all();

        // Retourner la vue avec les données
        return view('type_events.home', compact('typeEvents'));
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


    public function userTypeEventStatistics()
    {
        // Get statistics for each event type and the total number of events added
        $statistics = Event::select('type_events_id', 'type_events.title', \DB::raw('COUNT(*) as total'))
            ->join('type_events', 'events.type_events_id', '=', 'type_events.id') // Join with the type_events table
            ->groupBy('type_events_id', 'type_events.title') // Group by type event ID and title
            ->get();
    
        // Return the view with the statistics data
        return view('type_events.statistics', compact('statistics'));
    }
    
    
    



}
