<?php


namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeEvent; // Import TypeEvent model
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve all events with their TypeEvent relationship
        $events = Event::with('TypeEvent')->get();
       
        // Return the view with the events data
        return view('events.index', compact('events'));
    }
    

    public function indexUser()
    {
        // Retrieve all events (you can add any specific conditions for users here if needed)
        $events = TypeEvent::all();
        return view('events.indexUser', compact('events'));
    }
    public function create()
    {
        // Retrieve all type events for the dropdown
        $typeEvents = TypeEvent::all();
        return view('events.create', compact('typeEvents'));
    }

    public function store(Request $request)
    {
        // Validate the request
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        //     'type_events_id' => 'required|exists:type_events,id',
        // ]);
        $validated = $request->validate([
            'title' => [
                'required', 
                'string', 
                'max:255', 
                'min:3', // Longueur minimale de 3 caractères
                'regex:/^[a-zA-Z0-9\s\-]+$/u' // Seulement lettres, chiffres, espaces et tirets
            ],
            'description' => [
                'required', 
                'string', 
                'min:10' // Longueur minimale de 10 caractères
            ],
            'image' => [
                'nullable', 
                'image', 
                'mimes:jpg,jpeg,png,gif', 
                'max:2048', 
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000' // Limite des dimensions de l'image
            ],
            'type_events_id' => [
                'required', 
                'exists:type_events,id' // Vérifie que l'ID existe bien dans la table type_events
            ],
        ]);
        
         // Vérifier si un fichier image a été téléchargé
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('events_image', $filename, 'public');

            // Ajouter le chemin de l'image dans les données validées
            $validated['image'] = $path;
        }

        // Create a new event
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function show($id)
    {
        // Find the event by its ID
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        // Find the event by its ID
        $event = Event::findOrFail($id);
        $typeEvents = TypeEvent::all(); // Get type events for the dropdown
        return view('events.edit', compact('event', 'typeEvents'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        //     'type_events_id' => 'required|exists:type_events,id',
        // ]);
        $validated = $request->validate([
            'title' => [
                'required', 
                'string', 
                'max:255', 
                'min:3', // Longueur minimale de 3 caractères
                'regex:/^[a-zA-Z0-9\s\-]+$/u' // Seulement lettres, chiffres, espaces et tirets
            ],
            'description' => [
                'required', 
                'string', 
                'min:10' // Longueur minimale de 10 caractères
            ],
            'image' => [
                'nullable', 
                'image', 
                'mimes:jpg,jpeg,png,gif', 
                'max:2048', 
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000' // Limite des dimensions de l'image
            ],
            'type_events_id' => [
                'required', 
                'exists:type_events,id' // Vérifie que l'ID existe bien dans la table type_events
            ],
        ]);
        
         // Vérifier si un fichier image a été téléchargé
         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('events_image', $filename, 'public');

            // Ajouter le chemin de l'image dans les données validées
            $validated['image'] = $path;
        }

        // Find the event and update it
        $event = Event::findOrFail($id);
        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        // Find the event by its ID and delete it
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function displayEventByTypeEventId($id){
        // Find all events of a specific type by its ID
        $events = Event::where('type_events_id', $id)->get();
        return view('type_events.showEvent', compact('events'));
    }
    public function displayEventsByTypeEventId($id){
        // Find all events of a specific type by its ID
        $events = Event::where('type_events_id', $id)->get();
        return view('events.eventUser', compact('events'));
    }

    public function userTypeEventStatistics()
    {
        // Get statistics for each event type and the total number of events, along with event names
        $statistics = Event::select('type_events.title', \DB::raw('count(events.id) as total'))
            ->join('type_events', 'events.type_events_id', '=', 'type_events.id') // Join with the TypeEvent table
            ->groupBy('type_events.title') // Group by event type title
            ->with('typeEvent') // Load related TypeEvent
            ->get();

        // Return the view with the statistics data
        return view('type_events.statistics', compact('statistics'));
    }




}
