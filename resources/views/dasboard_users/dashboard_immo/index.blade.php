@extends('layouts.dashboard')
@section('pageTitle')
    Tableau de bord
@endsection
@section('content')
    {{-- {{ dd($propsViewtot) }} --}}
    <!-- breadcrumb -->
    <!-- user-profile -->

    {{-- {{Route::current()->getName() }} --}}
    <div class="user-profile-wrapper">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="dashboard-widget dashboard-widget-color-1">
                    <div class="dashboard-widget-info">
                        <h1>{{ $propstotActive }}</h1>
                        <span style="font-size: 15px">Nombre total <br> d'annonces en ligne</span>
                    </div>
                    <div class="dashboard-widget-icon">
                        <i class="fal fa-list"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="dashboard-widget dashboard-widget-color-2">
                    <div class="dashboard-widget-info">
                        <h1>{{ $propsViewtot < 1000 ? $propsViewtot : number_format($propsViewtot / 1000, 1) . 'k' }}</h1>
                        <span style="font-size: 15px">Nombre total <br> d'annonces consultées</span>
                    </div>
                    <div class="dashboard-widget-icon">
                        <i class="fal fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="dashboard-widget dashboard-widget-color-3">
                    <div class="dashboard-widget-info">
                        <h1>{{ $propstot }}</h1>
                        <span style="font-size: 15px">Nombre total <br> d'annonces publiées</span>
                    </div>
                    <div class="dashboard-widget-icon">
                        <i class="fal fa-layer-group"></i>
                    </div>
                </div>
            </div>
            {{-- new card --}}

            <div class="col-md-6 col-lg-4">
                <a href="{{ route('display_number_ip') }}">
                    <div class="dashboard-widget dashboard-widget-color-3"
                        style="background-color: #adf659; color: black;">
                        <div class="dashboard-widget-info">
                            <h1 style="color: black;">
                                {{ $displayed_number < 1000 ? $displayed_number : number_format($displayed_number / 1000, 1) . 'k' }}
                            </h1>
                            <span style="font-size: 15px">Nombre des visiteurs <br> ayant affichées le numéro</span>
                        </div>
                        <div class="dashboard-widget-icon"
                            style="background-color: white; color: #7ae202;">
                            <i class="fal fa-mobile"></i>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('call_number_ip') }}">
                    <div class="dashboard-widget dashboard-widget-color-3"
                        style="background-color: #FF9800; color: black;">
                        <div class="dashboard-widget-info">
                            <h1 style="color: black;">
                                {{ $call < 1000 ? $call : number_format($call / 1000, 1) . 'k' }}
                            </h1>
                            <span style="font-size: 15px">Nombre des visiteurs <br> ayant effectués un appel</span>
                        </div>
                        <div class="dashboard-widget-icon"
                            style="background-color: white; color: #FF9800">
                            <i class="fal fa-volume-control-phone"></i>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('send_email_ip') }}">
                    <div class="dashboard-widget dashboard-widget-color-3"
                        style="background-color: #00BCD4; color: black;">
                        <div class="dashboard-widget-info">
                            <h1 style="color: black;">
                                {{ $mail < 1000 ? $mail : number_format($mail / 1000, 1) . 'k' }}
                            </h1>
                            <span style="font-size: 15px">Nombre des visiteurs<br>ayant envoyés un message</span>
                        </div>
                        <div class="dashboard-widget-icon"
                            style="background-color: white; color: #00BCD4">
                            <i class="fal fa-envelope"></i>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end new card --}}
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="user-profile-card">
                    <h4 class="user-profile-card-title">
                        Annonces récentes
                    </h4>
                    <div class="table-responsive">
                        @if (count($props) > 0)
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Informations sur les annonces</th>
                                        <th>Categorie</th>
                                        <th>Publier</th>
                                        <th>Prix</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($props as $item)
                                        <tr>
                                            <td>
                                                <div class="table-ad-info">
                                                    <a href="#">
                                                        @can('isAgent')
                                                            <img src="{{ asset($item->main_picture ? 'uploads/main_picture/images/properties/' . $item->main_picture->alt : 'assets/img/product/01.jpg') }}"
                                                                alt="" style="height: 60px;">
                                                        @else
                                                            <img src="{{ asset($item->getFirstImageOrDefault() ? 'uploads/promoteur_property/' . $item->getFirstImageOrDefault() : 'assets/img/product/01.jpg') }}"
                                                                alt="" style="height: 60px;">
                                                        @endcan
                                                        <div class="table-ad-content">
                                                            <h6>
                                                                {{ ucfirst(substr($item->title, 0, 20)) }}
                                                            </h6>
                                                            <span>Réf:
                                                                {{ $item->ref }}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ ucfirst($item->category->name) }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @can('isAgent')
                                                    {{ $item->price }}
                                                @else
                                                    {{ $item->price_total }}
                                                @endcan DT
                                            </td>
                                            <td>{{ $item->count_views }}</td>
                                            <td>
                                                @can('isAgent')
                                                    @if ($item->state == 'valid')
                                                        <span class="badge badge-success">Active</span>
                                                    @elseif ($item->state == 'waiting')
                                                        <span class="badge text-bg-warning">En attente</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                @else
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge text-bg-warning">En attente</span>
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Pas des annonces</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- user-profile end -->

    <style>
        /* Dashboard Widget Enhancements */
        .dashboard-widget {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .dashboard-widget:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .dashboard-widget::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0.8) 50%, rgba(255,255,255,0.3) 100%);
        }

        .dashboard-widget-info h1 {
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .dashboard-widget-info span {
            font-weight: 500;
            line-height: 1.4;
        }

        .dashboard-widget-icon {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .dashboard-widget:hover .dashboard-widget-icon {
            transform: rotate(10deg) scale(1.1);
        }

        /* Custom link styling for clickable cards */
        .dashboard-widget a {
            text-decoration: none;
            color: inherit;
        }

        /* Table Enhancements */
        .user-profile-card {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .user-profile-card-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ecf0f1;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: none;
            color: #495057;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 15px;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: #ecf0f1;
        }

        /* Table Ad Info Styling */
        .table-ad-info {
            display: flex;
            align-items: center;
        }

        .table-ad-info img {
            border-radius: 8px;
            margin-right: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .table-ad-info:hover img {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .table-ad-content h6 {
            margin: 0 0 5px 0;
            color: #2c3e50;
            font-weight: 600;
        }

        .table-ad-content span {
            color: #6c757d;
            font-size: 12px;
        }

        /* Badge Enhancements */
        .badge {
            font-size: 11px;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        }

        .badge-danger {
            background: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%);
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }

        .badge.text-bg-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important;
            color: #000 !important;
            box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-widget {
                margin-bottom: 20px;
            }
            
            .table-responsive {
                border-radius: 8px;
            }
            
            .table-ad-info {
                flex-direction: column;
                text-align: center;
            }
            
            .table-ad-info img {
                margin-right: 0;
                margin-bottom: 8px;
            }
        }

        /* Animation for empty state */
        .user-profile-wrapper p {
            text-align: center;
            color: #6c757d;
            font-style: italic;
            padding: 40px 20px;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 20px 0;
        }

        /* Loading animation for images */
        .table-ad-info img {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Custom scrollbar for table */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        a, a:active, a:focus, a:hover, a:visited {
            text-decoration: none !important;
        }
    </style>
@endsection