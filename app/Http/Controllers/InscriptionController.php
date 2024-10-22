<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function showForm($formationId)
    {
        $formation = Formation::findOrFail($formationId);
        return view('inscriptions.inscription', compact('formation'));
    }

    public function create($formationId)
    {
        $formation = Formation::findOrFail($formationId);
            return view('inscriptions.inscription', compact('formation'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search'); 
    
        // Eager load the 'formation' relationship and apply search
        $inscriptions = Inscription::with('formation')
            ->when($search, function ($query) use ($search) {
                $query->where('nom', 'like', "%{$search}%")
                      ->orWhere('prenom', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhereHas('formation', function ($query) use ($search) {
                          $query->where('name', 'like', "%{$search}%");
                      });
            })
            ->paginate(3); 
    
        return view('inscriptions.index', compact('inscriptions', 'search'));
    }
    
 

    public function store(Request $request, $formationId)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255|regex:/^.+@.+$/',
        ]);

        // Créer une nouvelle inscription
        $inscription = new Inscription();
        $inscription->users_id = auth()->user()->id; 
        $inscription->nom = $request->nom;
        $inscription->prenom = $request->prenom;
        $inscription->email = $request->email;
        $inscription->statut = 'en cours';
        $inscription->formations_id = $formationId; 
        $inscription->date_inscription = now();


        // Sauvegarder l'inscription dans la base de données
        $inscription->save();

        // Rediriger vers la page de succès ou vers la liste des formations avec un message de succès
        return redirect()->route('formations.frontdetails', $formationId)->with('success', 'Votre inscription a été réalisée avec succès !');

    }

    public function updateStatus(Request $request, $inscriptionId)
    {
        // Find the inscription by ID
        $inscription = Inscription::findOrFail($inscriptionId);

        // Validate the new status
        $request->validate([
            'statut' => 'required|string|in:en cours,acceptée,refusée',
        ]);

        // Update the status of the inscription
        $inscription->statut = $request->input('statut');
        $inscription->save();

        // Redirect to the inscriptions list with a success message
        return redirect()->route('inscriptions.index')->with('success', 'Le statut de l\'inscription a été mis à jour avec succès.');
    }

    public function show($id)
{
    // Find the inscription by ID and eager load the associated formation
    $inscription = Inscription::with('formation')->findOrFail($id);

    // Return the view with the inscription and formation data
    return view('inscriptions.details', compact('inscription'));
}

public function myInscriptions()
{
    $userId = auth()->user()->id;
    $inscriptions = Inscription::with('formation')
                                ->where('users_id', $userId)
                                ->get();
    
    return view('inscriptions.my_inscriptions', compact('inscriptions'));
}


public function destroy($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->delete();
        return redirect()->back()->with('success', 'Inscription supprimée avec succès.');
    }


}
