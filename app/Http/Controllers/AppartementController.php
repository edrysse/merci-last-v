<?php

namespace App\Http\Controllers;
use App\Models\CreateAppartement ;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    public function index()
    {
        $rooms = CreateAppartement::all();
        return view('appartement.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'required|string|max:255',
            'codePostal' => 'required|string|max:10',
            'telephone' => 'required|string|max:15',
        ]);

        Appartement::create($validatedData);
        
        return redirect()->back()->with('success', 'Réservation effectuée avec succès!');
    }
    
}
