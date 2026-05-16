@extends('layouts.dashboard')
@section('pageTitle')
    Mes Annonces
@endsection
@section('sectionTitle')
    Mes Annonces
@endsection
@section('content')
    <div class="modern-property-listing">
        @if ($errors->any())
        <div class="alert alert-danger alert-modern">
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-modern">
                <i class="fas fa-check-circle"></i> {{ session()->get('success') }}
            </div>
        @endif
        <div class="property-listing-card">
            <div class="listing-header" style="display: flex; flex-direction: column; align-items: stretch;">
                <div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 10px;">
                    <a href="{{ route('get_add_property') }}" class="btn btn-primary" style="font-size: 1.1rem; padding: 10px 28px; border-radius: 8px; font-weight: 600;">+ Ajouter une annonce</a>
                </div>
                <div class="results-count" style="align-self: flex-start; margin-bottom: 10px; font-size: 1.1rem; font-weight: 500; color: #333;">
                    <i class="fas fa-list"></i>
                    Affichage {{ $props->appends(request()->query())->total() }} Résultats
                </div>
                <form action="{{ route('admin_all_properties') }}" method="GET" class="search-form-modern">
                    <div class="search-filters">
                        <div class="search-input-group">
                            <input type="text" name="keywords" value="{{ request('keywords') }}" placeholder="Rechercher par titre ou référence..." class="search-input">
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="filter-group" style="background: #fff; border-radius: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 24px 20px; margin-bottom: 24px; display: flex; flex-direction: column; gap: 12px; align-items: stretch; min-height: 56px;">
                            <div class="filter-fields-row" style="display: flex; flex-wrap: nowrap; gap: 16px; justify-content: space-between; align-items: center;">
                                <select name="status" class="filter-select" style="flex:1 1 0; min-width: 140px; border-radius: 8px; border: 1px solid #e2e8f0; padding: 10px 12px; font-size: 15px; background: #f9fafb; height: 44px;">
                                    <option value="">Tous les statuts</option>
                                    <option value="valid" {{ request('status') == 'valid' ? 'selected' : '' }}>Actif</option>
                                    <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>En attente</option>
                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejeté</option>
                                </select>
                                <select name="category_id" class="filter-select" style="flex:1 1 0; min-width: 140px; border-radius: 8px; border: 1px solid #e2e8f0; padding: 10px 12px; font-size: 15px; background: #f9fafb; height: 44px;">
                                    <option value="">Toutes les catégories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ ucfirst($category->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="date" name="created_at" value="{{ request('created_at') }}" class="filter-date" style="flex:1 1 0; min-width: 140px; border-radius: 8px; border: 1px solid #e2e8f0; padding: 10px 12px; font-size: 15px; background: #f9fafb; height: 44px;">
                                <select name="order" class="filter-select" style="flex:1 1 0; min-width: 140px; border-radius: 8px; border: 1px solid #e2e8f0; padding: 10px 12px; font-size: 15px; background: #f9fafb; height: 44px;">
                                    <option value="desc" {{ request('order', 'desc') == 'desc' ? 'selected' : '' }}>Plus récent</option>
                                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Plus ancien</option>
                                </select>
                            </div>
                            <div style="display: flex; justify-content: center; margin-top: 10px;">
                                <button type="submit" class="filter-btn" style="background: #667eea; color: #fff; border: none; border-radius: 8px; padding: 10px 32px; font-size: 16px; font-weight: 500; display: flex; align-items: center; gap: 8px; box-shadow: 0 2px 8px rgba(102,126,234,0.08); transition: background 0.2s; height: 44px;">
                                    <i class="fas fa-filter"></i> Filtrer
                                    
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="property-table-container">
                @if (count($props) > 0)
                    <!-- Desktop Table View -->
                    <div class="desktop-table-view">
                        <table class="modern-property-table">
                            <thead>
                                <tr>
                                    <th>Informations sur les annonces</th>
                                    <th>Categorie</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($props as $item)
                                    <tr>
                                        <td>
                                            <div class="property-info">
                                                <div class="property-image">
                                                    <img src="{{ asset($item->main_picture ? 'uploads/main_picture/images/properties/' . $item->main_picture->alt : 'assets/img/product/01.jpg') }}" alt="">
                                                </div>
                                                <div>
                                                    <div class="property-title">{{ ucfirst(substr($item->title, 0, 50)) }}</div>
                                                    <div class="property-meta">
                                                        <span><i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($item->getRawOriginal('created_at'))->format('d/m/Y') }}</span>
                                                        <span><i class="fas fa-map-marker-alt"></i> {{ $item->city->name ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="category-badge" title="{{ ucfirst($item->category->name) }}">{{ ucfirst($item->category->name) }}</span></td>
                                        <td><span class="views-count"><i class="far fa-eye"></i> {{ $item->count_views }}</span></td>
                                        <td>
                                            @if ($item->state == 'valid')
                                                <span class="status-badge active">Active</span>
                                            @elseif ($item->state == 'waiting')
                                                <span class="status-badge pending">En attente</span>
                                            @else
                                                <span class="status-badge inactive">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('AdminEditProperty', $item->slug) }}" class="action-btn edit-btn" data-tooltip="Modifier"><i class="far fa-edit"></i></a>
                                                <a href="{{ route('admin_property_info', $item->id) }}" target="__blank" class="action-btn view-btn" data-tooltip="Détail"><i class="far fa-eye"></i></a>
                                                <button class="action-btn premium-btn @if($featuresExist[$item->id]) disabled @endif" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de mettre ce annonce premium?')) { document.getElementById('premium-property-form-{{ $item->id }}').submit(); }" data-tooltip="Mettre premium" @if($featuresExist[$item->id]) disabled style="background-color:#ffc107;color:black" @endif><i class="far fa-star"></i></button>
                                                <a href="#" class="action-btn delete-btn delete-property" data-tooltip="Supprimer" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce annonce?')) { document.getElementById('delete-property-form-{{ $item->id }}').submit(); }"><i class="far fa-trash-can"></i></a>
                                            </div>
                                            <form display="none" id="delete-property-form-{{ $item->id }}" action="{{ route('admin.properties.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <form display="none" id="premium-property-form-{{ $item->id }}" action="{{ route('admin.store_premium', $item->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="property">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="mobile-card-view">
                        @foreach ($props as $item)
                            <div class="property-card">
                                <div class="property-card-header">
                                    <div class="property-card-image">
                                        <img src="{{ asset($item->main_picture ? 'uploads/main_picture/images/properties/' . $item->main_picture->alt : 'assets/img/product/01.jpg') }}" alt="">
                                    </div>
                                    <div class="property-card-status">
                                        @if ($item->state == 'valid')
                                            <span class="status-badge active">Active</span>
                                        @elseif ($item->state == 'waiting')
                                            <span class="status-badge pending">En attente</span>
                                        @else
                                            <span class="status-badge inactive">Inactive</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="property-card-body">
                                    <h3 class="property-card-title">{{ ucfirst(substr($item->title, 0, 50)) }}</h3>
                                    <div class="property-card-meta">
                                        <div class="meta-item">
                                            <i class="far fa-calendar"></i>
                                            <span>{{ \Carbon\Carbon::parse($item->getRawOriginal('created_at'))->format('d/m/Y') }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $item->city->name ?? 'N/A' }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <i class="far fa-eye"></i>
                                            <span>{{ $item->count_views }} vues</span>
                                        </div>
                                        <div class="meta-item">
                                            <i class="fas fa-tag"></i>
                                            <span class="category-badge" title="{{ ucfirst($item->category->name) }}">{{ ucfirst($item->category->name) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-card-actions">
                                    <a href="{{ route('AdminEditProperty', $item->slug) }}" class="action-btn edit-btn" data-tooltip="Modifier"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('admin_property_info', $item->id) }}" target="__blank" class="action-btn view-btn" data-tooltip="Détail"><i class="far fa-eye"></i></a>
                                    <button class="action-btn premium-btn @if($featuresExist[$item->id]) disabled @endif" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de mettre ce annonce premium?')) { document.getElementById('premium-property-form-{{ $item->id }}').submit(); }" data-tooltip="Mettre premium" @if($featuresExist[$item->id]) disabled style="background-color:#ffc107;color:black" @endif><i class="far fa-star"></i></button>
                                    <a href="#" class="action-btn delete-btn delete-property" data-tooltip="Supprimer" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce annonce?')) { document.getElementById('delete-property-form-{{ $item->id }}').submit(); }"><i class="far fa-trash-can"></i></a>
                                    
                                    <form display="none" id="delete-property-form-{{ $item->id }}" action="{{ route('admin.properties.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <form display="none" id="premium-property-form-{{ $item->id }}" action="{{ route('admin.store_premium', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="property">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination-wrapper">
                        {!! $props->links('vendor.pagination.default') !!}
                    </div>
                @else
                    <div class="no-results">
                        <i class="far fa-folder-open"></i>
                        <p>Aucune annonce trouvée</p>
                        <a href="{{ route('get_add_property') }}" class="btn btn-primary">Publier une annonce</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Modern Property Listing Styles */
        .modern-property-listing {
            padding: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .alert-modern {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            border: none;
        }
        
        .alert-modern i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
            margin-top: 0.2rem;
        }
        
        .error-list {
            margin: 0;
            padding-left: 1.5rem;
        }
        
        .property-listing-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .listing-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .results-count {
            display: flex;
            align-items: center;
            font-weight: 500;
            color: #2c3e50;
        }
        
        .results-count i {
            margin-right: 0.5rem;
            color: #3498db;
        }
        
        .search-form-modern {
            flex: 1;
            min-width: 300px;
            max-width: 800px;
            margin-left: 1.5rem;
        }
        
        .search-filters {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .search-input-group {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .search-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            background: transparent;
            outline: none;
        }
        
        .search-btn {
            padding: 0.75rem 1rem;
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .search-btn:hover {
            background: #2980b9;
        }
        
        .filter-group {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .filter-select, .filter-date {
            height: 40px;
            box-sizing: border-box;
        }
        
        .filter-btn {
            padding: 0.5rem 1rem;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            height: 40px;
            line-height: 1.2;
            display: flex;
            align-items: center;
            font-size: 1rem;
            box-sizing: border-box;
        }
        
        .filter-btn:hover {
            background: #229954;
        }
        
        .property-table-container {
            overflow-x: auto;
            padding: 0 2.5rem;
            width: 100%;
        }
        
        /* Desktop Table View */
        .desktop-table-view {
            display: block;
        }
        
        .modern-property-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .modern-property-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #e9ecef;
        }
        
        .modern-property-table td {
            padding: 1rem;
            border-bottom: 1px solid #f1f1f1;
            vertical-align: middle;
        }
        
        .property-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .property-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .property-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }
        
        .property-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .property-meta span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .category-badge {
            background: #e3f2fd;
            color: #1976d2;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            white-space: nowrap;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
            vertical-align: middle;
        }
        
        .views-count {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status-badge.active {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-badge.inactive {
            background: #f8d7da;
            color: #721c24;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        .edit-btn {
            background: #3498db;
            color: white;
        }
        
        .view-btn {
            background: #27ae60;
            color: white;
        }
        
        .premium-btn {
            background: #f39c12;
            color: white;
        }
        
        .delete-btn {
            background: #e74c3c;
            color: white;
        }
        
        .action-btn[data-tooltip]:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #333;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            white-space: nowrap;
            z-index: 1000;
        }
        
        /* Mobile Card View */
        .mobile-card-view {
            display: none;
        }
        
        .property-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            margin-bottom: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.3s ease;
        }
        
        .property-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }
        
        .property-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 1rem;
            background: #f8f9fa;
        }
        
        .property-card-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .property-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .property-card-status {
            flex-shrink: 0;
        }
        
        .property-card-body {
            padding: 1rem;
        }
        
        .property-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }
        
        .property-card-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .meta-item i {
            color: #3498db;
            width: 16px;
        }
        
        .property-card-actions {
            display: flex;
            justify-content: space-around;
            padding: 1rem;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        
        .property-card-actions .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            font-size: 1rem;
        }
        
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            padding: 2rem 0;
        }
        
        .no-results {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .no-results i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .no-results p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        
        .btn-primary {
            background: #3498db;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #2980b9;
            color: white;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .property-table-container {
                padding: 0 1.5rem;
            }
            
            .modern-property-table {
                font-size: 0.9rem;
            }
            
            .property-meta {
                flex-direction: column;
                gap: 0.25rem;
            }
        }
        
        @media (max-width: 768px) {
            .modern-property-listing {
                padding: 1rem;
            }
            
            .listing-header {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            
            .search-form-modern {
                margin-left: 0;
                width: 100%;
            }
            
            .filter-group {
                flex-direction: column;
            }
            
            .property-table-container {
                padding: 0 1rem;
            }
            
            /* Hide desktop table, show mobile cards */
            .desktop-table-view {
                display: none;
            }
            
            .mobile-card-view {
                display: block;
            }
            
            .property-card-meta {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }
            
            .property-card-actions {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .property-card-actions .action-btn {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 480px) {
            .modern-property-listing {
                padding: 0.5rem;
            }
            
            .listing-header {
                padding: 0.75rem;
            }
            
            .property-table-container {
                padding: 0 0.5rem;
            }
            
            .property-card-header {
                flex-direction: column;
                gap: 0.75rem;
                align-items: center;
            }
            
            .property-card-image {
                width: 100px;
                height: 100px;
            }
            
            .property-card-actions {
                justify-content: center;
            }
            
            .property-card-actions .action-btn {
                width: 40px;
                height: 40px;
                margin: 0 0.25rem;
            }
        }
    </style>
    <style>
@media (max-width: 700px) {
    .filter-group { padding: 16px 8px !important; }
    .filter-fields-row { flex-direction: column !important; gap: 10px !important; }
    .filter-group select, .filter-group input, .filter-group button { width: 100% !important; min-width: 0 !important; }
}
</style>
@endsection 