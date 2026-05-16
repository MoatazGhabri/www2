@extends('layouts.dashboard')
@section('pageTitle')
    Sliders
@endsection
@section('sectionTitle')
    Sliders
@endsection
@section('content')
<style>
    .slider-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .slider-add-btn {
        background: linear-gradient(90deg, #667eea 0%, #3b82f6 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 16px;
        box-shadow: 0 2px 8px rgba(59,130,246,0.08);
        transition: 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .slider-add-btn:hover {
        background: linear-gradient(90deg, #3b82f6 0%, #667eea 100%);
        transform: translateY(-2px) scale(1.03);
    }
    .slider-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 32px;
    }
    .slider-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(59,130,246,0.10);
        padding: 24px 20px 18px 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        transition: box-shadow 0.2s;
        position: relative;
        min-height: 320px;
    }
    .slider-card:hover {
        box-shadow: 0 8px 32px rgba(59,130,246,0.18);
    }
    .slider-img {
        width: 100%;
        max-width: 320px;
        height: 180px;
        border-radius: 14px;
        object-fit: cover;
        margin-bottom: 16px;
        background: #f8fafc;
        box-shadow: 0 2px 8px rgba(59,130,246,0.10);
    }
    .slider-title {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #1e293b;
    }
    .slider-date {
        font-size: 0.98rem;
        color: #6b7280;
        margin-bottom: 8px;
    }
    .slider-actions {
        display: flex;
        gap: 10px;
        margin-top: 12px;
    }
    .slider-action-btn {
        border: none;
        border-radius: 6px;
        padding: 7px 16px;
        font-size: 15px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: 0.2s;
        cursor: pointer;
    }
    .slider-action-edit {
        background: #e0e7ff;
        color: #3b82f6;
    }
    .slider-action-edit:hover {
        background: #3b82f6;
        color: #fff;
    }
    .slider-action-stats {
        background: #f3f4f6;
        color: #64748b;
    }
    .slider-action-stats:hover {
        background: #3b82f6;
        color: #fff;
    }
    .slider-action-delete {
        background: #fee2e2;
        color: #ef4444;
    }
    .slider-action-delete:hover {
        background: #ef4444;
        color: #fff;
    }
    @media (max-width: 600px) {
        .slider-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="user-profile-wrapper">
    <div class="slider-header">
        <h2 style="margin:0;font-weight:700;font-size:1.5rem;">Sliders</h2>
        <a href="{{ route('admin.add_slider') }}" class="slider-add-btn"><i class="fas fa-plus"></i> Ajouter</a>
    </div>
    <!-- <div class="alert alert-danger">
        <p>Les 3 premières espaces pour images de la page d'accueil et des Liens utiles sont réservés pour la société Azur.</p>
    </div> -->
    <div>
        @if (count($sliders) > 0)
            <div class="slider-grid">
                @foreach ($sliders as $item)
                    <div class="slider-card">
                        <img src="{{asset('uploads/sliders/'.$item->alt)}}" class="slider-img" alt="Slider Image">
                        <div class="slider-title">{{ $item->description }}</div>
                        <div class="slider-date">Ajouté le {{ $item->created_at->format('d-m-Y') }}</div>
                        <div class="slider-actions">
                            <a class="slider-action-btn slider-action-edit" href="{{route('admin.edit_slider',$item->id)}}"><i class="fas fa-edit"></i> Modifier</a>
                            <a class="slider-action-btn slider-action-stats" href="{{ route('admin.slider_ip',$item->id) }}"><i class="fas fa-chart-bar"></i> Stats ({{ $item->view_count }})</a>
                            <button class="slider-action-btn slider-action-delete" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce slider?')) { document.getElementById('delete-slider-form-{{ $item->id }}').submit(); }"><i class="far fa-trash-alt"></i> Supprimer</button>
                            <form style="display:none" id="delete-slider-form-{{ $item->id }}" action="{{ route('admin.delete_slider', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {!! $sliders->appends(request()->query())->links('vendor.pagination.default') !!}
            </div>
        @else
            <p>Pas de sliders pour le moment.</p>
        @endif
    </div>
</div>
@endsection
