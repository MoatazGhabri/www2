@extends('layouts.dashboard')
@section('pageTitle')
    Modifier un Prospect/Contact
@endsection
@section('content')
<style>
    .prospect-modern-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(59,130,246,0.10);
        padding: 36px 32px 28px 32px;
        max-width: 600px;
        margin: 32px auto;
    }
    .prospect-modern-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 24px;
        text-align: center;
    }
    .prospect-form-group {
        margin-bottom: 22px;
    }
    .prospect-form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #2563eb;
    }
    .prospect-form-group input,
    .prospect-form-group select,
    .prospect-form-group textarea {
        width: 100%;
        padding: 14px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        transition: border 0.2s, box-shadow 0.2s;
        background: #f8fafc;
        margin-top: 4px;
    }
    .prospect-form-group input:focus,
    .prospect-form-group select:focus,
    .prospect-form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.10);
        background: #fff;
    }
    .prospect-submit-btn {
        width: 100%;
        background: linear-gradient(90deg, #2563eb 0%, #1d4ed8 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 14px 0;
        font-weight: 600;
        font-size: 17px;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.2s;
        box-shadow: 0 2px 8px rgba(37,99,235,0.08);
    }
    .prospect-submit-btn:hover {
        background: linear-gradient(90deg, #1d4ed8 0%, #2563eb 100%);
        transform: translateY(-2px) scale(1.02);
    }
    @media (max-width: 600px) {
        .prospect-modern-card {
            padding: 18px 6vw 18px 6vw;
        }
    }
    .select2-container--default .select2-selection--single {
        width: 100%;
        padding: 14px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        background: #f8fafc;
        height: 48px;
        display: flex;
        align-items: center;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .select2-container--default .select2-selection--single:focus,
    .select2-container--default .select2-selection--single.select2-selection--focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.10);
        background: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #1e293b;
        line-height: 48px;
        padding-left: 0;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 48px;
        right: 12px;
    }
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #64748b;
    }
    .select2-dropdown {
        border-radius: 8px;
        border: 1.5px solid #e5e7eb;
        font-size: 16px;
    }
    .select2-results__option {
        padding: 10px 18px;
    }
    .select2-results__option--highlighted {
        background: #2563eb;
        color: #fff;
    }
</style>
<div class="prospect-modern-card">
    <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
        <a href="{{ route('admin.prospect_contacts.index') }}" class="btn btn-secondary" style="font-size:1.1rem;"><span style="margin-right:6px;">&#8592;</span>Retour à la liste</a>
    </div>
    <div class="prospect-modern-title">Modifier un Prospect/Contact</div>
    <form action="{{ route('admin.prospect_contacts.update', $prospect->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="prospect-form-group">
            <label for="client_name">Nom du Client</label>
            <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $prospect->client_name) }}">
        </div>
        <div class="prospect-form-group">
            <label for="prospect_source">Source du Prospect</label>
            <select name="prospect_source" id="prospect_source">
                <option value="">Sélectionner</option>
                <option value="Appel Téléphonique" {{ old('prospect_source', $prospect->prospect_source) == 'Appel Téléphonique' ? 'selected' : '' }}>Appel Téléphonique</option>
                <option value="Visite à l'agence" {{ old('prospect_source', $prospect->prospect_source) == "Visite à l'agence" ? 'selected' : '' }}>Visite à l'agence</option>
                <option value="Instagram" {{ old('prospect_source', $prospect->prospect_source) == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                <option value="Facebook" {{ old('prospect_source', $prospect->prospect_source) == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                <option value="Site Web" {{ old('prospect_source', $prospect->prospect_source) == 'Site Web' ? 'selected' : '' }}>Site Web</option>
                <option value="Autre Source" {{ old('prospect_source', $prospect->prospect_source) == 'Autre Source' ? 'selected' : '' }}>Autre Source</option>
            </select>
        </div>
        <div class="prospect-form-group">
            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $prospect->phone_number) }}">
        </div>
        <div class="prospect-form-group">
            <label for="email">Adresse E-Mail</label>
            <input type="email" name="email" id="email" value="{{ old('email', $prospect->email) }}">
        </div>
        <div class="prospect-form-group">
            <label for="first_call_date">Date Premier Appel</label>
            <input type="date" name="first_call_date" id="first_call_date" value="{{ old('first_call_date', $prospect->first_call_date) }}">
        </div>
        <div class="prospect-form-group">
            <label for="demand_reference">Référence Bien de la demande</label>
            <select name="demand_reference" id="demand_reference" class="property-ref-select">
                <option value="">Sélectionner une référence</option>
                @foreach($propertyReferences as $ref)
                    <option value="{{ $ref }}" {{ old('demand_reference', $prospect->demand_reference) == $ref ? 'selected' : '' }}>{{ $ref }}</option>
                @endforeach
            </select>
        </div>
        <div class="prospect-form-group">
            <label for="client_interaction">Interaction du Client</label>
            <select name="client_interaction" id="client_interaction">
                <option value="">Sélectionner</option>
                <option value="Haute" {{ old('client_interaction', $prospect->client_interaction) == 'Haute' ? 'selected' : '' }}>Haute</option>
                <option value="Moyenne" {{ old('client_interaction', $prospect->client_interaction) == 'Moyenne' ? 'selected' : '' }}>Moyenne</option>
                <option value="Faible" {{ old('client_interaction', $prospect->client_interaction) == 'Faible' ? 'selected' : '' }}>Faible</option>
            </select>
        </div>
        <div class="prospect-form-group">
            <label for="other_properties_reference">Références autres Biens Proposés</label>
            <select name="other_properties_reference" id="other_properties_reference" class="property-ref-select">
                <option value="">Sélectionner une référence</option>
                @foreach($propertyReferences as $ref)
                    <option value="{{ $ref }}" {{ old('other_properties_reference', $prospect->other_properties_reference) == $ref ? 'selected' : '' }}>{{ $ref }}</option>
                @endforeach
            </select>
        </div>
        <div class="prospect-form-group">
            <label for="other_interaction">Interaction du client (autres biens)</label>
            <select name="other_interaction" id="other_interaction">
                <option value="">Sélectionner</option>
                <option value="Haute" {{ old('other_interaction', $prospect->other_interaction) == 'Haute' ? 'selected' : '' }}>Haute</option>
                <option value="Moyenne" {{ old('other_interaction', $prospect->other_interaction) == 'Moyenne' ? 'selected' : '' }}>Moyenne</option>
                <option value="Faible" {{ old('other_interaction', $prospect->other_interaction) == 'Faible' ? 'selected' : '' }}>Faible</option>
            </select>
        </div>
        <div class="prospect-form-group">
            <label for="other_call_dates">Dates autres appels du client</label>
            <input type="date" name="other_call_dates" id="other_call_dates" value="{{ old('other_call_dates', $prospect->other_call_dates) }}">
        </div>
        <div class="prospect-form-group">
            <label for="followup_action">Action de suivi à faire</label>
            <input type="text" name="followup_action" id="followup_action" value="{{ old('followup_action', $prospect->followup_action) }}">
        </div>
        <div class="prospect-form-group">
            <label for="remind_at">A Rappeler le</label>
            <input type="date" name="remind_at" id="remind_at" value="{{ old('remind_at', $prospect->remind_at) }}">
        </div>
        <button type="submit" class="prospect-submit-btn">Mettre à jour</button>
    </form>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.property-ref-select').select2({
            width: '100%',
            placeholder: 'Sélectionner une référence',
            allowClear: true
        });
    });
</script>
@endpush
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--single {
        width: 100%;
        padding: 14px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        background: #f8fafc;
        height: 48px;
        display: flex;
        align-items: center;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .select2-container--default .select2-selection--single:focus,
    .select2-container--default .select2-selection--single.select2-selection--focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.10);
        background: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #1e293b;
        line-height: 48px;
        padding-left: 0;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 48px;
        right: 12px;
    }
    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #64748b;
    }
    .select2-dropdown {
        border-radius: 8px;
        border: 1.5px solid #e5e7eb;
        font-size: 16px;
    }
    .select2-results__option {
        padding: 10px 18px;
    }
    .select2-results__option--highlighted {
        background: #2563eb;
        color: #fff;
    }
</style>
@endpush 