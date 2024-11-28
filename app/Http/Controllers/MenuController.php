<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brunch;
use App\Models\Supplement;
use App\Models\PetitsDejeuner;

class MenuController extends Controller
{
    public function voirmenu()
    {
        $brunch = Brunch::all();
        $petitsDejeuners = PetitsDejeuner::all();
        $supplements = Supplement::all(); // استرجاع بيانات Supplements

        // تمرير البيانات إلى الفيو
        return view('client.menu.voirmenu', compact('petitsDejeuners', 'brunch', 'supplements'));
    }

    // عرض النماذج لإنشاء Petits Dejeuners
    public function createPetitsDejeuner()
    {
        return view('admin.menu.create-petits-dejeuner');
    }

    // تخزين البيانات الخاصة بـ Petits Dejeuners
    public function storePetitsDejeuner(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/petits-dejeuners', 'public');

        PetitsDejeuner::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.menu.petits-dejeuners.index');
    }

    // تكرار نفس العمليات لـ Brunch و Supplements

    public function createBrunch()
    {
        return view('admin.menu.create-brunch');
    }

    public function storeBrunch(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/brunches', 'public');

        Brunch::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.menu.brunches.index');
    }

    public function createSupplement()
    {
        return view('admin.menu.create-supplement');
    }

    public function storeSupplement(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/supplements', 'public');

        Supplement::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.menu.supplements.index');
    }

    public function indexSupplements()
    {
        // استرجاع جميع الـ supplements من قاعدة البيانات
        $supplements = Supplement::all();

        // تمرير البيانات إلى الـ view لعرضها
        return view('admin.menu.supplements.index', compact('supplements'));
    }
    public function indexPetitsDejeuners()
    {
        $petitsDejeuners = PetitsDejeuner::all();
        return view('admin.menu.petits-dejeuners.index', compact('petitsDejeuners'));
    }
    public function indexbrunches()
    {
        // استرجاع جميع الـ brunches من قاعدة البيانات
        $brunches = Brunch::all();

        // تمرير البيانات إلى الـ view لعرضها
        return view('admin.menu.brunches.index', compact('brunches'));
    }


}

