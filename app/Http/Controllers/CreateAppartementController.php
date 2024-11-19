<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateAppartement ;
class CreateAppartementController extends Controller
{
    //
    public function index()
    {
        $rooms = CreateAppartement::all();
        return view('appartement.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    // Valider les données envoyées par le formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,avif|max:2048',
        'prix' => 'required|numeric',
        'etoiles' => 'nullable|integer|min:1|max:5',
        'extra_info' => 'nullable|string',
    ]);

    // Traiter l'image si elle existe
    if ($request->hasFile('image')) {
        // Stocker l'image dans public/upload/img
        $validatedData['image'] = $request->file('image')->store('upload/img', 'public');
    }

    // Ajouter une valeur par défaut pour les étoiles si non fournies
    $validatedData['etoiles'] = $validatedData['etoiles'] ?? 3;

    // Créer l'appartement avec les données validées
    CreateAppartement::create($validatedData);

    // Rediriger vers l'index avec un message de succès
    return redirect()->route('Apparetementindex')->with('success', 'Appartement créé avec succès !');
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

        return redirect()->route('Apparetementindex')->with('success', 'Appartement mis à jour avec succès');
    }

    public function destroy($id)
    {
        $appartement = CreateAppartement::findOrFail($id);
        $appartement->delete();

        return redirect()->route('Apparetementindex')->with('success', 'Appartement supprimé avec succès');
    }
}
