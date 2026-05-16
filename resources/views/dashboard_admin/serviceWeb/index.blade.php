@extends('layouts.dashboard')
@section('pageTitle')
    Services Web
@endsection
@section('sectionTitle')
    Services Web
@endsection
@section('content')
{{-- {{ Route::current()->getName() }} --}}
    <style>
        .search-form .nice-select {
            height: 45px;
            display: flex;
            align-items: center;
        }
        .serviceweb-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .serviceweb-add-btn {
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
        .serviceweb-add-btn:hover {
            background: linear-gradient(90deg, #3b82f6 0%, #667eea 100%);
            transform: translateY(-2px) scale(1.03);
        }
        .serviceweb-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
        }
        .serviceweb-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(59,130,246,0.08);
            padding: 28px 24px 18px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: box-shadow 0.2s;
            position: relative;
        }
        .serviceweb-card:hover {
            box-shadow: 0 8px 32px rgba(59,130,246,0.18);
        }
        .serviceweb-img {
            width: 110px;
            height: 110px;
            border-radius: 16px;
            object-fit: cover;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px rgba(59,130,246,0.10);
            background: #f8fafc;
        }
        .serviceweb-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            text-align: center;
        }
        .serviceweb-date {
            font-size: 0.95rem;
            color: #6b7280;
            margin-bottom: 12px;
        }
        .serviceweb-actions {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }
        .serviceweb-action-btn {
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
        .serviceweb-action-edit {
            background: #e0e7ff;
            color: #3b82f6;
        }
        .serviceweb-action-edit:hover {
            background: #3b82f6;
            color: #fff;
        }
        .serviceweb-action-delete {
            background: #fee2e2;
            color: #ef4444;
        }
        .serviceweb-action-delete:hover {
            background: #ef4444;
            color: #fff;
        }
        @media (max-width: 600px) {
            .serviceweb-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    {{-- <div class="col-4"></div> --}}

    <div class="user-profile-wrapper">
        <div class="serviceweb-header">
            <h2 style="margin:0;font-weight:700;font-size:1.5rem;">Services Web</h2>
            <a href="{{ route('admin.add_service_web') }}" class="serviceweb-add-btn"><i class="fas fa-plus"></i> Ajouter</a>
        </div>
                <!-- <div class="alert alert-danger">
                    <p>Les 3 premières espaces pour images de la page d'accueil et des Liens utiles sont réservés pour la société Azur Platforms Events.</p>
                </div> -->

        <div>
            @if (count($sliders) > 0)
                <div class="serviceweb-grid">
                    @foreach ($sliders as $item)
                        <div class="serviceweb-card">
                            <img src="{{asset('uploads/serviceWeb/'.$item->imageUrl)}}" class="serviceweb-img" alt="ServiceWeb Image">
                            <div class="serviceweb-title">{{ $item->title }}</div>
                            <div class="serviceweb-date">Ajouté le {{ $item->created_at->format('d-m-Y') }}</div>
                            <div class="serviceweb-actions">
                                <a class="serviceweb-action-btn serviceweb-action-edit" href="{{route('admin.edit_service_web',$item->id)}}"><i class="fas fa-edit"></i> Modifier</a>
                                <button class="serviceweb-action-btn serviceweb-action-delete" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce service?')) { document.getElementById('delete-property-form-{{ $item->id }}').submit(); }"><i class="far fa-trash-alt"></i> Supprimer</button>
                                <form style="display:none" id="delete-property-form-{{ $item->id }}" action="{{ route('admin.delete_service_web', $item->id) }}" method="POST">
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
                <p>Pas de services web pour le moment.</p>
            @endif
        </div>
    </div>
    </div>
@endsection
