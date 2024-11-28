<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateAppartement;

class CreateAppartementController extends Controller
{
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
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required|numeric|min:0',
            'etoiles' => 'nullable|integer|min:1|max:5',
            'extra_info' => 'nullable|string|max:255',
        ]);

        // التعامل مع الصورة إذا كانت موجودة
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('upload/img', 'public');
        }

        // إضافة القيمة الافتراضية للـ etoiles إذا لم تكن موجودة
        $validatedData['etoiles'] = $validatedData['etoiles'] ?? 3;

        // إضافة البيانات إلى قاعدة البيانات
        CreateAppartement::create($validatedData);

        // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة نجاح
        return redirect()->route('appartements.index')->with('success', 'Appartement créé avec succès !');
    }

    public function edit($id)
    {
        $appartement = CreateAppartement::findOrFail($id);
        return view('admin.edit', compact('appartement'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'etoiles' => 'nullable|integer|min:1|max:5',
            'extra_info' => 'nullable|string|max:255'
        ]);

        $appartement = CreateAppartement::findOrFail($id);

        // Traiter l'image si elle existe
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('upload/img', 'public');
        }

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
