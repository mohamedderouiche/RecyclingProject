<?php


namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TypeEvent; // Import TypeEvent model
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve all events
        $events = Event::all();
        return view('events.index', compact('events'));
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'type_events_id' => 'required|exists:type_events,id',
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'type_events_id' => 'required|exists:type_events,id',
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
}
