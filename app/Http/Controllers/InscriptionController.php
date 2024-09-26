<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InscriptionController extends Controller
{
    // Front Office: User registers for a formation
    public function store(Request $request, $formation_id)
    {
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id',
        ]);

        Inscription::create([
            'formations_id' => $formation_id,
            'users_id' => $validated['users_id'],
            'date_inscription' => now(),
            'statut' => 'en attente',
        ]);

        return redirect()->route('formations.index')->with('success', 'Registered successfully for the formation!');
    }

    // Back Office: Show all inscriptions for a specific formation
    public function index($formation_id)
    {
        $inscriptions = Inscription::where('formations_id', $formation_id)->get();
        return view('admin.inscriptions.index', compact('inscriptions', 'formation_id'));
    }

    // Back Office: Accept or reject inscription
    public function update(Request $request, $id)
    {
        $inscription = Inscription::findOrFail($id);
        $validated = $request->validate([
            'statut' => 'required|in:accepté,rejeté',
        ]);

        $inscription->update(['statut' => $validated['statut']]);

        // Send email notification to the user
        Mail::to($inscription->user->email)->send(new \App\Mail\InscriptionStatusUpdated($inscription));

        return redirect()->route('admin.inscriptions.index', $inscription->formations_id)
            ->with('success', 'Inscription status updated successfully!');
    }

    // Back Office: Delete inscription
    public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->delete();

        return redirect()->route('admin.inscriptions.index', $inscription->formations_id)
            ->with('success', 'Inscription deleted successfully!');
    }
}
