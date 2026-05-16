<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProspectContact;
use App\Models\Property;

class ProspectContactController extends Controller
{
    public function index(Request $request)
    {
        $query = ProspectContact::orderBy('created_at', 'desc');
        if ($request->filled('client_name')) {
            $query->where('client_name', 'like', '%' . $request->client_name . '%');
        }
        $prospects = $query->get();
        return view('dashboard_admin.prospect_contacts.index', compact('prospects'));
    }

    public function create()
    {
        $propertyReferences = Property::pluck('ref');
        return view('dashboard_admin.prospect_contacts.create', compact('propertyReferences'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_name' => 'nullable|string|max:255',
            'prospect_source' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'first_call_date' => 'nullable|date',
            'demand_reference' => 'nullable|string|max:255',
            'client_interaction' => 'nullable|string|max:255',
            'other_properties_reference' => 'nullable|string|max:255',
            'other_interaction' => 'nullable|string|max:255',
            'other_call_dates' => 'nullable|string|max:255',
            'followup_action' => 'nullable|string|max:255',
            'remind_at' => 'nullable|string|max:255',
        ]);
        ProspectContact::create($data);
        return redirect()->route('admin.prospect_contacts.index')->with('success', 'Prospect ajouté avec succès.');
    }

    public function edit($id)
    {
        $prospect = ProspectContact::findOrFail($id);
        $propertyReferences = Property::pluck('ref');
        return view('dashboard_admin.prospect_contacts.edit', compact('prospect', 'propertyReferences'));
    }

    public function update(Request $request, $id)
    {
        $prospect = ProspectContact::findOrFail($id);
        $data = $request->validate([
            'client_name' => 'nullable|string|max:255',
            'prospect_source' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'first_call_date' => 'nullable|date',
            'demand_reference' => 'nullable|string|max:255',
            'client_interaction' => 'nullable|string|max:255',
            'other_properties_reference' => 'nullable|string|max:255',
            'other_interaction' => 'nullable|string|max:255',
            'other_call_dates' => 'nullable|string|max:255',
            'followup_action' => 'nullable|string|max:255',
            'remind_at' => 'nullable|string|max:255',
        ]);
        $prospect->update($data);
        return redirect()->route('admin.prospect_contacts.index')->with('success', 'Prospect mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $prospect = ProspectContact::findOrFail($id);
        $prospect->delete();
        return redirect()->route('admin.prospect_contacts.index')->with('success', 'Prospect supprimé avec succès.');
    }
} 