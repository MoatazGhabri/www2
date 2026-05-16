<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mandat;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\City;

class MandatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mandat::orderBy('created_at', 'desc');
        if ($request->filled('owner_name')) {
            $query->where('owner_name', 'like', '%' . $request->owner_name . '%');
        }
        $mandats = $query->get();
        return view('dashboard_admin.mandats.index', compact('mandats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('dashboard_admin.mandats.create', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|string|max:255',
            'observations' => 'nullable|string',
        ]);
        Mandat::create([
            'owner_name' => $request->owner_name,
            'phone_number' => $request->phone_number,
            'category' => $request->category,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'observations' => $request->observations,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('admin.mandats.index')->with('success', 'Mandat ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mandat = Mandat::findOrFail($id);
        $categories = Category::all();
        $cities = City::all();
        return view('dashboard_admin.mandats.edit', compact('mandat', 'categories', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|string|max:255',
            'observations' => 'nullable|string',
        ]);
        $mandat = Mandat::findOrFail($id);
        $mandat->update($request->all());
        return redirect()->route('admin.mandats.index')->with('success', 'Mandat mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mandat = Mandat::findOrFail($id);
        $mandat->delete();
        return redirect()->route('admin.mandats.index')->with('success', 'Mandat supprimé avec succès.');
    }
}
