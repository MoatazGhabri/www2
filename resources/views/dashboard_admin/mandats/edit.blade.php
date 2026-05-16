@extends('layouts.dashboard')
@section('pageTitle')
    Modifier le mandat
@endsection
@section('content')
<style>
    .mandat-modern-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(59,130,246,0.10);
        padding: 36px 32px 28px 32px;
        max-width: 540px;
        margin: 32px auto;
    }
    .mandat-modern-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 24px;
        text-align: center;
    }
    .mandat-form-group {
        margin-bottom: 22px;
    }
    .mandat-form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #2563eb;
    }
    .mandat-form-group input,
    .mandat-form-group textarea,
    .mandat-form-group select {
        width: 100%;
        padding: 14px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        transition: border 0.2s, box-shadow 0.2s;
        background: #f8fafc;
        margin-top: 4px;
    }
    .mandat-form-group input:focus,
    .mandat-form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.10);
        background: #fff;
    }
    .mandat-form-group select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37,99,235,0.10);
        background: #fff;
    }
    .mandat-submit-btn {
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
    .mandat-submit-btn:hover {
        background: linear-gradient(90deg, #1d4ed8 0%, #2563eb 100%);
        transform: translateY(-2px) scale(1.02);
    }
    @media (max-width: 600px) {
        .mandat-modern-card {
            padding: 18px 6vw 18px 6vw;
        }
    }
</style>
<div class="mandat-modern-card">
    <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
        <a href="{{ route('admin.mandats.index') }}" class="btn btn-secondary" style="font-size:1.1rem;"><span style="margin-right:6px;">&#8592;</span>Retour à la liste</a>
    </div>
    <div class="mandat-modern-title">Modifier le mandat</div>
    <form action="{{ route('admin.mandats.update', $mandat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mandat-form-group">
            <label for="owner_name">Nom du Propriétaire</label>
            <input type="text" name="owner_name" id="owner_name" required value="{{ old('owner_name', $mandat->owner_name) }}">
        </div>
        <div class="mandat-form-group">
            <label for="phone_number">Numéro de téléphone</label>
            <input type="text" name="phone_number" id="phone_number" required value="{{ old('phone_number', $mandat->phone_number) }}">
        </div>
        <div class="mandat-form-group">
            <label for="category">Catégorie de biens</label>
            <select name="category" id="category" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->name }}" {{ old('category', $mandat->category) == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mandat-form-group">
            <label for="location">Lieu</label>
            <select name="location" id="location" required>
                <option value="">Sélectionner une ville</option>
                @foreach($cities as $city)
                    <option value="{{ $city->name }}" {{ old('location', $mandat->location) == $city->name ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mandat-form-group">
            <label for="start_date">Date début Mandat</label>
            <input type="date" name="start_date" id="start_date" required value="{{ old('start_date', $mandat->start_date) }}">
        </div>
        <div class="mandat-form-group">
            <label for="end_date">Date fin du Mandat</label>
            <input type="date" name="end_date" id="end_date" required value="{{ old('end_date', $mandat->end_date) }}">
        </div>
        <div class="mandat-form-group">
            <label for="type">Type de Mandat</label>
            <input type="text" name="type" id="type" required value="{{ old('type', $mandat->type) }}">
        </div>
        <div class="mandat-form-group">
            <label for="observations">Observations</label>
            <textarea name="observations" id="observations" rows="2">{{ old('observations', $mandat->observations) }}</textarea>
        </div>
        <button type="submit" class="mandat-submit-btn">Mettre à jour</button>
    </form>
</div>
@endsection 