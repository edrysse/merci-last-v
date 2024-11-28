<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appartement; // Ensure the correct model is imported

class AppartementController extends Controller
{
    // Display all appartements
    public function index()
    {
        // Use the correct model to fetch all records
        $rooms = Appartement::all(); // Updated to use the Appartement model

        return view('appartement.index', compact('rooms'));
    }

    // Store a new appartement reservation
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'required|string|max:255',
            'codePostal' => 'required|string|max:10',
            'telephone' => 'required|string|max:15',
        ]);

        // Create a new appartement record with validated data
        Appartement::create($validatedData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Réservation effectuée avec succès!');
    }

    // Display the validation page (e.g., to show cart or other data)
    public function validation()
    {
        // Get cart items from session or elsewhere
        $cartItems = session('cartItems', []);

        // Pass cart items to the validation view
        return view('appartement.appartementValid', compact('cartItems'));
    }
}
