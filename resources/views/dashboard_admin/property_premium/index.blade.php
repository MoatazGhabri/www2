@extends('layouts.dashboard')
@section('pageTitle')
    Annonces Vedettes
@endsection
@section('sectionTitle')
    Annonces Vedettes
@endsection
@section('content')
<style>
    .premium-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }
    .premium-filters {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    .premium-filter-btn {
        background: #f3f4f6;
        color: #3b82f6;
        border: none;
        border-radius: 8px;
        padding: 8px 18px;
        font-weight: 600;
        font-size: 15px;
        transition: 0.2s;
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 1px 4px rgba(59,130,246,0.06);
        cursor: pointer;
    }
    .premium-filter-btn.active, .premium-filter-btn:hover {
        background: linear-gradient(90deg, #667eea 0%, #3b82f6 100%);
        color: #fff;
    }
    .premium-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 32px;
    }
    .premium-card {
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
    .premium-card:hover {
        box-shadow: 0 8px 32px rgba(59,130,246,0.18);
    }
    .premium-img {
        width: 100%;
        max-width: 320px;
        height: 160px;
        border-radius: 14px;
        object-fit: cover;
        margin-bottom: 16px;
        background: #f8fafc;
        box-shadow: 0 2px 8px rgba(59,130,246,0.10);
    }
    .premium-title {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #1e293b;
    }
    .premium-meta {
        font-size: 0.98rem;
        color: #6b7280;
        margin-bottom: 8px;
    }
    .premium-badge {
        display: inline-block;
        background: #f59e0b;
        color: #fff;
        font-size: 12px;
        font-weight: 600;
        border-radius: 8px;
        padding: 2px 10px;
        margin-bottom: 8px;
    }
    .premium-actions {
        display: flex;
        gap: 8px;
        margin-top: 12px;
        flex-wrap: wrap;
    }
    .premium-action-btn {
        border: none;
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: 0.2s;
        cursor: pointer;
        text-decoration: none;
        white-space: nowrap;
    }
    .premium-action-edit {
        background: #e0e7ff;
        color: #3b82f6;
    }
    .premium-action-edit:hover {
        background: #3b82f6;
        color: #fff;
    }
    .premium-action-remove {
        background: #fee2e2;
        color: #ef4444;
    }
    .premium-action-remove:hover {
        background: #ef4444;
        color: #fff;
    }
    .premium-action-view {
        background: #f3f4f6;
        color: #64748b;
    }
    .premium-action-view:hover {
        background: #3b82f6;
        color: #fff;
    }
    @media (max-width: 768px) {
        .premium-grid {
            grid-template-columns: 1fr;
        }
        .premium-actions {
            flex-direction: column;
        }
        .premium-action-btn {
            justify-content: center;
        }
    }
</style>

<div class="user-profile-wrapper">
    <div class="premium-header">
        <h2 style="margin:0;font-weight:700;font-size:1.5rem;">Annonces Vedettes</h2>
        <!-- Removed premium-filters buttons as requested -->
    </div>
    <div>
        @if (count($properties) > 0)
            <div class="premium-grid">
                @foreach ($properties as $item)
                    @php
                        $mainImg = null;
                        $title = '';
                        $user = '';
                        $category = '';
                        $views = '';
                        $type = '';
                        if($item->type__ == 'property' && $item->property) {
                            $mainImg = $item->property->main_picture ? asset('uploads/main_picture/images/properties/' . $item->property->main_picture->alt) : asset('assets/img/product/01.jpg');
                            $title = $item->property->title;
                            $user = $item->property->user->username ?? '';
                            $category = $item->property->category->name ?? '';
                            $views = $item->property->count_views ?? 0;
                            $type = 'Entreprise/Particulier';
                        } elseif($item->type__ == 'classified' && $item->classified) {
                            $mainImg = $item->classified->main_picture ? asset('uploads/classifieds/' . $item->classified->main_picture) : asset('assets/img/product/01.jpg');
                            $title = $item->classified->title;
                            $user = $item->classified->user->username ?? '';
                            $category = $item->classified->category->name ?? '';
                            $views = $item->classified->count_views ?? 0;
                            $type = 'Débarras';
                        } elseif($item->type__ == 'promoteur_property' && $item->propertypromoteur) {
                            $mainImg = $item->propertypromoteur->main_picture ? asset('uploads/promoteur_property/' . $item->propertypromoteur->main_picture->alt) : asset('assets/img/product/01.jpg');
                            $title = $item->propertypromoteur->title;
                            $user = $item->propertypromoteur->user->username ?? '';
                            $category = $item->propertypromoteur->category->name ?? '';
                            $views = $item->propertypromoteur->count_views ?? 0;
                            $type = 'Promoteur';
                        } elseif($item->type__ == 'service' && $item->service) {
                            $mainImg = $item->service->main_picture ? asset('uploads/serviceWeb/' . $item->service->main_picture) : asset('assets/img/product/01.jpg');
                            $title = $item->service->title;
                            $user = $item->service->user->username ?? '';
                            $category = $item->service->category->name ?? '';
                            $views = $item->service->count_views ?? 0;
                            $type = 'Service';
                        }
                    @endphp
                    <div class="premium-card">
                        <img src="{{ $mainImg }}" class="premium-img" alt="Premium Image">
                        <div class="premium-title">{{ $title }}</div>
                        <div class="premium-meta">Catégorie : <b>{{ $category }}</b></div>
                        <div class="premium-meta">Vues : <b>{{ $views }}</b></div>
                        <div class="premium-actions">
                            @if($item->type__ == 'property' && $item->property)
                                <a class="premium-action-btn premium-action-edit" href="{{ route('AdminEditProperty', $item->property->slug) }}"><i class="fas fa-edit"></i> Modifier</a>
                                <a class="premium-action-btn premium-action-view" href="{{ route('admin_property_info', $item->property->id) }}" target="_blank"><i class="fas fa-eye"></i> Voir</a>
                            @elseif($item->type__ == 'promoteur_property' && $item->propertypromoteur)
                                <a class="premium-action-btn premium-action-edit" href="{{ route('AdminEditPropertyPromoteur', $item->propertypromoteur->slug) }}"><i class="fas fa-edit"></i> Modifier</a>
                                <a class="premium-action-btn premium-action-view" href="{{ route('admin_property_promoteur_info', $item->propertypromoteur->id) }}" target="_blank"><i class="fas fa-eye"></i> Voir</a>
                            @elseif($item->type__ == 'classified' && $item->classified)
                                <a class="premium-action-btn premium-action-edit" href="{{ route('admin_update_classified', $item->classified->id) }}"><i class="fas fa-edit"></i> Modifier</a>
                                <a class="premium-action-btn premium-action-view" href="{{ route('classifieds.admin.info', $item->classified->id) }}" target="_blank"><i class="fas fa-eye"></i> Voir</a>
                            @elseif($item->type__ == 'service' && $item->service)
                                <a class="premium-action-btn premium-action-edit" href="{{ route('admin_update_service', $item->service->id) }}"><i class="fas fa-edit"></i> Modifier</a>
                                <a class="premium-action-btn premium-action-view" href="{{ route('services.admin.info', $item->service->id) }}" target="_blank"><i class="fas fa-eye"></i> Voir</a>
                            @else
                                <a class="premium-action-btn premium-action-edit" href="#"><i class="fas fa-edit"></i> Modifier</a>
                                <a class="premium-action-btn premium-action-view" href="#" target="_blank"><i class="fas fa-eye"></i> Voir</a>
                            @endif
                            <button class="premium-action-btn premium-action-remove" onclick="event.preventDefault(); if(confirm('Retirer cette annonce des vedettes ?')) { document.getElementById('remove-premium-form-{{ $item->id }}').submit(); }"><i class="fas fa-star-half-alt"></i> Retirer</button>
                            <form style="display:none" id="remove-premium-form-{{ $item->id }}" action="{{ route('admin.property-features.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {!! $properties->links('vendor.pagination.default') !!}
            </div>
        @else
            <p>Pas d'annonces vedettes pour le moment.</p>
        @endif
    </div>
</div>
@endsection
