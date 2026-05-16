@extends('layouts.dashboard')
@section('pageTitle')
    Tous les Annonces Entreprise
@endsection
@section('sectionTitle')
    Tous les Annonces Entreprise
@endsection
@section('content')
    {{-- {{dd("enter")}} --}}
    {{-- {{ dd(Route::current()->getName()) }} --}}
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
            <div class="listing-header">
                <div class="results-count">
                    <i class="fas fa-list"></i>
                    Affichage {{ $props->appends(request()->query())->total() }} Résultats
                </div>
                <form action="{{ route('all_admin_company_property') }}" method="GET" class="search-form-modern">
                    @include('dashboard_admin.includes.search_property')
                </form>
            </div>
            <div class="property-table-container">
                @if (count($props) > 0)
                    <table class="modern-property-table">
                        <thead>
                            <tr>
                                <th>Informations sur les annonces</th>
                                <th>Utilisateur</th>
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
                                                <div class="property-title">{{ ucfirst(substr($item->title, 0, 10)) }}</div>
                                                <div class="property-meta">
                                                    <span><i class="far fa-calendar"></i> {{ $item->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="user-info">
                                            <span class="user-type-badge">{{ $item->user->userTypeName() }}</span>
                                        </div>
                                    </td>
                                    <td><span class="category-badge">{{ ucfirst($item->category->name) }}</span></td>
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
                    <div class="pagination-wrapper">
                        {!! $props->links('vendor.pagination.default') !!}
                    </div>
                @else
                    <div class="no-results">
                        <i class="far fa-folder-open"></i>
                        <p>Pas des annonces</p>
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
        
        .dashboard-header {
            margin-bottom: 2rem;
        }
        
        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .dashboard-subtitle {
            font-size: 1rem;
            color: #7f8c8d;
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
            max-width: 500px;
            margin-left: 1.5rem;
        }
        
        .property-table-container {
            overflow-x: auto;
            padding: 0 2.5rem;
            width: 100%;
        }
        
        .modern-property-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
        }
        
        .modern-property-table thead {
            background: #f8f9fa;
        }
        
        .modern-property-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .modern-property-table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .property-info {
            display: flex;
            align-items: center;
        }
        
        .property-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 1rem;
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
            font-size: 0.95rem;
        }
        
        .property-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            font-size: 0.8rem;
            color: #7f8c8d;
        }
        
        .property-meta i {
            margin-right: 0.25rem;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
        }
        
        .user-type-badge {
            background: #e3f2fd;
            color: #1976d2;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
            width: fit-content;
        }
        
        .user-name {
            font-size: 0.9rem;
            color: #2c3e50;
        }
        
        .category-badge {
            background: #e8f5e9;
            color: #388e3c;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .views-count {
            color: #7f8c8d;
            font-weight: 500;
        }
        
        .views-count i {
            margin-right: 0.25rem;
            color: #3498db;
        }
        
        .status-badge {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
        }
        
        .status-badge.active {
            background: #e8f5e9;
            color: #388e3c;
        }
        
        .status-badge.pending {
            background: #fff8e1;
            color: #ffa000;
        }
        
        .status-badge.inactive {
            background: #ffebee;
            color: #d32f2f;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: transparent;
            color: #7f8c8d;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        .action-btn::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: #2c3e50;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        
        .action-btn:hover::after {
            opacity: 1;
            visibility: visible;
            bottom: -35px;
        }
        
        .edit-btn:hover {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .view-btn:hover {
            background: #e8f5e9;
            color: #388e3c;
        }
        
        .premium-btn:hover:not(.disabled) {
            background: #fff8e1;
            color: #ffa000;
        }
        
        .premium-btn.disabled {
            background: #ffecb3;
            color: #ffa000;
            cursor: not-allowed;
        }
        
        .delete-btn:hover {
            background: #ffebee;
            color: #d32f2f;
        }
        
        .pagination-wrapper {
            padding: 1.5rem;
            display: flex;
            justify-content: center;
        }
        
        .no-results {
            padding: 3rem;
            text-align: center;
            color: #7f8c8d;
        }
        
        .no-results i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }
        
        .no-results p {
            font-size: 1.1rem;
        }
        
        @media (max-width: 768px) {
            .listing-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .search-form-modern {
                margin-left: 0;
                width: 100%;
            }
            
            .modern-property-table {
                min-width: 700px;
            }
            
            .action-buttons {
                flex-wrap: wrap;
                gap: 0.25rem;
            }
        }
         .horizontal-search-form {
            width: 100%;
        }
        
        .search-filters-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }
        
        .header-top {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .results-count {
            font-weight: 500;
            color: #2c3e50;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
        }
        
        .results-count i {
            margin-right: 0.5rem;
            color: #3498db;
        }
        
        /* Adjust existing styles for horizontal layout */
        .search-form-modern {
            flex: 1;
            min-width: 100%;
        }
        
        /* Update form group styles for horizontal layout */
        .search-form-modern .form-group {
            margin-bottom: 0;
            flex: 1;
            min-width: 180px;
        }
        
        .search-form-modern .form-control,
        .search-form-modern .select {
            width: 100%;
            height: 42px;
        }
        
        .search-form-modern button[type="submit"] {
            height: 42px;
            padding: 0 1.5rem;
            margin-left: auto;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .search-filters-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-form-modern .form-group {
                min-width: 100%;
            }
            
            .search-form-modern button[type="submit"] {
                margin-left: 0;
                width: 100%;
            }
        }
        
        /* Keep all your existing styles below */
        .modern-property-listing {
            padding: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }
    </style>

@endsection
