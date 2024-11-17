<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateAppartement ;
class CreateAppartementController extends Controller
{
    //
    public function index()
    {
        $appartements = CreateAppartement::all();
        return view('admin.index', compact('appartements'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    // Afficher toutes les données envoyées dans la requête pour vérifier
    dd($request->all());

    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,avif|max:2048',
        'prix' => 'required|numeric',
        'etoiles' => 'nullable|integer|min:1|max:5',
        'extra_info' => 'nullable|string' 
    ]);

    // Traiter l'image si elle existe
    if ($request->hasFile('image')) {
        // Stocker l'image dans public/upload/img
        $imagePath = $request->file('image')->store('upload/img', 'public');
        // Vérifier le chemin de l'image
        dd($imagePath);
    } else {
        $imagePath = null;
        // Vérifier que l'image est nulle
        dd('No image uploaded');
    }

    // Afficher les données avant de créer l'appartement
    dd([
        'nom' => $request->nom,
        'description' => $request->description,
        'image' => $imagePath,
        'prix' => $request->prix,
        'etoiles' => $request->etoiles ?? 3,
        'extra_info' => $request->extra_info,
    ]);

    // Créer l'appartement
    CreateAppartement::create([
        'nom' => $request->nom,
        'description' => $request->description,
        'image' => $imagePath,
        'prix' => $request->prix,
        'etoiles' => $request->etoiles ?? 3,
        'extra_info' => $request->extra_info,
    ]);

    // Vérifier si tout est bien créé
    dd('Appartement créé avec succès !');

    return redirect()->route('admin.index')->with('success', 'Appartement créé avec succès !');
}



    public function edit($id)
    {
        $appartement = CreateAppartement::findOrFail($id);
        return view('admin.edit', compact('appartement'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'etoiles' => 'nullable|integer|min:1|max:5',
            'extra_info' => 'nullable|string'
            
        ]);

        $appartement = CreateAppartement::findOrFail($id);
        $appartement->update($validated);

        return redirect()->route('appartement.index')->with('success', 'Appartement mis à jour avec succès');
    }

    public function destroy($id)
    {
        $appartement = CreateAppartement::findOrFail($id);
        $appartement->delete();

        return redirect()->route('appartement.index')->with('success', 'Appartement supprimé avec succès');
    }
}
