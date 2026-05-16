@extends('layouts.app')
@section('meta')
    <!-- Open Graph meta tags -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $property[0]->title }}">
    <meta property="og:description" content="{{ $property[0]->description }}">
    <meta property="og:image" content="{{ $property[0]->get_meta_image() }}">
    <meta property="og:type" content="website" />

    @if (config('services.facebook.app_id'))
        <meta property="fb:app_id" content="{{ config('services.facebook.app_id') }}">
    @endif
@endsection


@section('pageTitle')
    {{ $property[0]->title }}
@endsection
@section('content')
    {{-- {{ dd($user_logo) }} --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
   

       

        .col-lg-9 {
            flex: 2;
            min-width: 0;
            padding-right: 0 !important;
            margin-right: 0 !important;
            max-width: 45% !important;
            flex: 0 0 45% !important;
            padding-left: 0 !important;
        }

        .col-lg-3 {
            flex: 1;
            min-width: 300px;
            padding-left: 0 !important;
            margin-left: 0 !important;
            max-width: 45% !important;
            flex: 0 0 45% !important;
            padding-right: 0 !important;
        }

        /* Breadcrumb */
        .breadcrumb {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 20px;
            padding-top: 20px;
        }

        .breadcrumb a {
            color: #6b7280;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: #2563eb;
        }

        /* Alert Messages */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        /* Property Header */
        .property-header {
            margin-bottom: 30px;
        }

        .property-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #111827;
        }

        .property-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            color: #6b7280;
            font-size: 14px;
        }

        .property-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .property-meta-item i {
            color: #2563eb;
            width: 16px;
        }

        .property-ref {
            background-color: #dbeafe;
            color: #1d4ed8;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Action Buttons */
        .property-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .favorite-button, .share-button {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            color: #6b7280;
        }

        .favorite-button:hover, .share-button:hover {
            background-color: #f3f4f6;
        }

        .favorite-button.favorited {
            border-color: #fc3131;
            color: #fc3131;
        }

        /* Image Gallery */
        .property-gallery {
            margin-bottom: 30px;
        }

        .main-image-container {
            position: relative;
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
            background-color: #f3f4f6;
            margin-bottom: 15px;
        }

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .image-nav-btn:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        .image-nav-btn.prev {
            left: 15px;
        }

        .image-nav-btn.next {
            right: 15px;
        }

        .image-counter {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .thumbnail-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
        }

        .thumbnail {
            height: 80px;
            border-radius: 6px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }

        .thumbnail.active {
            border-color: #2563eb;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Price and Info Card */
        .price-info-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .price-section {
            text-align: center;
        }

        .price-label {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .price-value {
            font-size: 28px;
            font-weight: bold;
            color:rgb(110, 168, 240);
        }

        .info-section {
            text-align: center;
        }

        .info-label {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
        }

        /* Features Grid */
        .features-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #111827;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .feature-card {
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .feature-icon{
            font-size:20px;

        }
       

        .feature-value {
            font-weight: 600;
            color:rgb(49, 113, 252);
            margin-bottom: 5px;
        }

       

        /* Amenities */
        /* Amenities Section */
.amenities {
    margin: 2.5rem 0;
    padding: 1.5rem;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.amenities-title {
    font-size: 1.5rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #eaeaea;
    font-weight: 600;
}

.amenities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 1.2rem;
}

.amenity-item {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    padding: 0.8rem 1rem;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: all 0.2s ease;
}

.amenity-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.amenity-icon {
    font-size: 1.1rem;
    color: #3498db;
    width: 24px;
    text-align: center;
}

/* Specific icons for each amenity */
.amenity-item.wifi .amenity-icon { color: #2ecc71; }
.amenity-item.balcony .amenity-icon { color: #e74c3c; }
.amenity-item.garden .amenity-icon { color: #27ae60; }
.amenity-item.garage .amenity-icon { color: #34495e; }
.amenity-item.parking .amenity-icon { color: #7f8c8d; }
.amenity-item.elevator .amenity-icon { color: #9b59b6; }
.amenity-item.heating .amenity-icon { color: #e67e22; }
.amenity-item.air_conditioner .amenity-icon { color: #1abc9c; }
.amenity-item.alarm_system .amenity-icon { color: #c0392b; }
.amenity-item.swimming_pool .amenity-icon { color: #2980b9; }

/* Responsive adjustments */
@media (max-width: 768px) {
    .amenities-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    }
}

@media (max-width: 480px) {
    .amenities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .amenity-item {
        padding: 0.6rem 0.8rem;
    }
}

        /* Description */
        .description-section {
            margin-bottom: 30px;
        }

        .description-text {
            color: #4b5563;
            line-height: 1.7;
        }

        /* Contact Card */
        .contact-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: sticky;
            top: 20px;
        }

        .contact-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #111827;
            text-align: center;
        }

        .contact-info {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .contact-name {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
            text-align: center;
            margin-bottom: 10px;
        }

        .phone-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            width: 100%;
        }

        .phone-display {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            color: #4b5563;
        }

        .phone-display i {
            color: #2563eb;
        }

        .author-number {
            font-family: monospace;
            font-size: 18px;
            font-weight: 500;
        }

        .contact-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
            width: 100%;
            text-align: center;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
        }

        .btn-success {
            background-color: #059669;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #047857;
        }

        /* Message Form */
        .message-form {
            margin-top: 20px;
        }

        .message-toggle {
            background: none;
            border: none;
            color:rgb(49, 181, 252);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
        }

        .message-toggle:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
        }

        /* Similar Properties */
        .similar-properties {
            margin-top: 50px;
        }

        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Ads Section */
        .ads-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .ads-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #111827;
        }

        .ad-item {
            display: block;
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
        }

        .ad-item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s;
        }

        .ad-item:hover img {
            transform: scale(1.05);
        }
:root {
    --color-main: #3b82f6;
    --color-sale: #10b981;
    --color-rent: #f59e0b;
    --color-border: #e5e7eb;
    --color-bg: #ffffff;
    --color-shadow: rgba(0, 0, 0, 0.1);
    --color-shadow-strong: rgba(0,0,0,0.18);
    --color-shadow-light: rgba(0,0,0,0.12);
    --color-text: #111827;
    --color-text-light: #6b7280;
    --color-btn-hover: #2563eb;
    --color-price-bg: rgba(246, 59, 72, 0.95);
    --color-on-demand: #f59e0b;
    --color-white: #fff;
    --color-success-dark: #059669;
    --color-warning-dark: #d97706;
    --color-main-hover: #2563eb;
}

.main-image-container {
    position: relative;
    height: 400px;
    border-radius: 12px;
    overflow: hidden;
    background-color: #f3f4f6;
    margin-bottom: 15px;
}

.image-badge {
    position: absolute;
    color: var(--color-white);
    font-size: 15px;
    padding: 7px 16px;
    border-radius: 10pc;
    box-shadow: 0 2px 8px var(--color-shadow);
    display: flex;
    align-items: center;
    gap: 6px;
    z-index: 2;
}

.image-type-cat {
    top: 18px;
    left: 18px;
    background: var(--color-main);
}

.image-type-op {
    top: 18px;
    right: 18px;
}
.image-type-op.badge-sale {
    background: var(--color-sale);
}
.image-type-op.badge-rent {
    background: var(--color-rent);
}

.image-price-tag {
    left: 18px;
    bottom: 18px;
    background: var(--color-price-bg);
    color: var(--color-white);
    font-size: 18px;
}

.price-on-demand {
    background: var(--color-on-demand) !important;
    color: var(--color-white) !important;
    font-weight: bold;
}
/* Horizontal Property Features Section */
/* Caractéristiques Section */
.carac {
    margin: 2rem 0;
    padding: 1.5rem;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.carac-title {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #eee;
    display: block;
    width: 100%;
}

.carac-items {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    width: 100%;
}

.carac-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}

.carac-item:hover {
    transform: translateY(-2px);
}

.carac-icon {
    font-size: 1.2rem;
    color: #4a6bdf;
}

.carac-content {
    display: flex;
    flex-direction: column;
}

.carac-value {
    font-size: 1rem;
    font-weight: 600;
    color: #222;
    line-height: 1.2;
}

.carac-label {
    font-size: 0.8rem;
    color: #666;
}

/* Mobile responsive */
@media (max-width: 480px) {
    .carac-items {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        -webkit-overflow-scrolling: touch;
    }
    .carac-item {
        flex-shrink: 0;
    }
}
        /* Custom Layout Overrides */
        .container-fluid {
            max-width: 100% !important;
            padding: 0 40px !important;
            margin: 0 !important;
        }
        
        .row {
            margin: 0 !important;
            justify-content: space-between !important;
            width: 100% !important;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .row {
                flex-direction: column;
                gap: 20px;
            }

            .col-lg-9, .col-lg-3 {
                flex: none;
                min-width: auto;
                padding-left: 0 !important;
                padding-right: 0 !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }

            .property-title {
                font-size: 24px;
            }

            .property-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .price-info-card {
                flex-direction: column;
                text-align: center;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-image-container {
                height: 250px;
            }

            .thumbnail-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .contact-card {
                position: relative;
                top: auto;
            }
        }

        @media (max-width: 480px) {
            .features-grid {
                grid-template-columns: 1fr;
            }

            .thumbnail-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .price-value {
                font-size: 24px;
            }

            .property-actions {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="margin-top: 190px; padding: 0 40px;">
        <div class="row" style="justify-content: space-between; margin: 0;">
            <div class="col-lg-9" style="max-width: 45%; flex: 0 0 45%; padding-left: 0;">
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="/">Accueil</a>
                    <span> / </span>
                    <a href="/cherche">Propriétés</a>
                    <span> / </span>
                    <span>{{ $property[0]->title }}</span>
                </div>

                <!-- Alert Messages -->
                @if (session()->has('successFav'))
                    <div class="alert alert-success">
                        {{ session()->get('successFav') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <div class="product-single-wrapper">
                    <!-- Property Header -->
                    <div class="property-header">
                        <h1 class="property-title">{{ strtoupper($property[0]->title) }}
                            @if($property[0]->synced_premier)
                                <span class="badge" style="background:#2563eb;color:#fff;font-size:14px;margin-left:10px;vertical-align:middle;">Publié sur Immobilier.tn</span>
                            @endif
                        </h1>
                        
                        <div class="property-meta">
                            <div class="property-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $property[0]->city->name }}, {{ $property[0]->area->name }}</span>
                            </div>
                            
                            <div class="property-meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Publié le {{ $property[0]->created_at }}</span>
                            </div>
                            
                            <div class="property-meta-item">
                                <i class="fas fa-eye"></i>
                                <span>{{ $property[0]->count_views }} vues</span>
                            </div>
                            
                            <div class="property-ref">
                                Réf. {{ strtoupper($property[0]->ref) }}
                            </div>
                        </div>

                        <div class="property-actions">
                            @if (Auth::check())
                                @if (Auth::user()->favorites->contains('favoritable_id', $property[0]->id))
                                    <button onclick="submitAdd()" class="favorite-button favorited">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <form style="display:none" id="add_fav"
                                        action="{{ route('favorites.store', ['favoritableType' => 'App\Models\Property', 'favoritableId' => $property[0]->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @else
                                    <button onclick="submitDelete()" class="favorite-button">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <form style="display:none" id="del_fav"
                                        action="{{ route('favorites.store', ['favoritableType' => 'App\Models\Property', 'favoritableId' => $property[0]->id]) }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                @endif
                            @else
                                <button onclick="goLogin()" class="favorite-button">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <form id="goLogin" style="display:none" action="{{ route('login') }}" method="GET">
                                    @csrf
                                </form>
                            @endif

                            <button onclick="shareOnFacebook('{{ $property[0]->title }}','{{ $property[0]->get_meta_image() }}','{{ $property[0]->slug }}')" class="share-button">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="property-gallery">
                        <div class="main-image-container">
                            @if (count($property[0]->pictures) > 0)
                                @php $firstImage = $property[0]->pictures->first(); @endphp
                                @php
                                    $imagePath = 'uploads/property_photo/' . $firstImage->alt;
                                    $defaultImagePath = 'assets/img/product/slider-1.jpg';
                                    
                                    if (file_exists(public_path($imagePath))) {
                                        $imageSrc = asset($imagePath);
                                    } else {
                                        $imageSrc = asset($defaultImagePath);
                                    }
                                @endphp
                                <img src="{{ $imageSrc }}" alt="{{ $property[0]->title }}" class="main-image">
            <span class="image-badge image-type-cat">
    <i class="fas fa-home"></i>
    {{ strtoupper($property[0]->category->name) }}
</span>
<span class="image-badge image-type-op {{ $property[0]->operation->name === 'location' ? 'badge-rent' : 'badge-sale' }}">
    <i class="fas fa-exchange-alt"></i>
    {{ strtoupper($property[0]->operation->name) }}
</span>
<span class="image-badge image-price-tag {{ ($property[0]->price == 0 || $property[0]->price == 1) ? 'price-on-demand' : '' }}">
    @if ($property[0]->price == 0 || $property[0]->price == 1)
        Prix sur demande
    @else
        {{ $property[0]->price }} DT
    @endif
</span>
                                @if (count($property[0]->pictures) > 1)
                                    <button class="image-nav-btn prev" onclick="prevImage()">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="image-nav-btn next" onclick="nextImage()">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                @endif
                                
                                <div class="image-counter">
                                    <span id="current-image">1</span> / {{ count($property[0]->pictures) }}
                                </div>
                            @else
                                <img src="{{ asset('uploads/main_picture/images/properties/' . $property[0]->main_picture->alt) }}" 
                                     alt="{{ $property[0]->title }}" class="main-image">
                            @endif
                        </div>

                        @if (count($property[0]->pictures) > 1)
                            <div class="thumbnail-grid">
                                @foreach ($property[0]->pictures->take(5) as $index => $picture)
                                    @php
                                        $thumbPath = 'uploads/property_photo/' . $picture->alt;
                                        if (file_exists(public_path($thumbPath))) {
                                            $thumbSrc = asset($thumbPath);
                                        } else {
                                            $thumbSrc = asset('assets/img/product/slider-1.jpg');
                                        }
                                    @endphp
                                    <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" onclick="setActiveImage({{ $index }})">
                                        <img src="{{ $thumbSrc }}" alt="{{ $property[0]->title }} - image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Price and Info Card -->
              
                    <!-- Features Section -->
                 @if ($property[0]->room_number != 0 || $property[0]->living_room_number != 0 || $property[0]->bath_room_number != 0 || $property[0]->kitchen_number != 0 || $property[0]->plot_area != 0 || $property[0]->floor_area != 0)
    <div class="carac">
        <h2 class="carac-title">Caractéristiques</h2>
        <div class="carac-items">
            
            @if ($property[0]->room_number != 0)
                <div class="carac-item">
                    <i class="fas fa-bed carac-icon"></i>
                    <div class="carac-content">
                        <span class="carac-value">{{ $property[0]->room_number }}</span>
                        <span class="carac-label">Chambres</span>
                    </div>
                </div>
            @endif

            @if ($property[0]->living_room_number != 0)
                <div class="carac-item">
                    <i class="fas fa-couch carac-icon"></i>
                    <div class="carac-content">
                        <span class="carac-value">{{ $property[0]->living_room_number }}</span>
                        <span class="carac-label">Salons</span>
                    </div>
                </div>
            @endif

            @if ($property[0]->bath_room_number != 0)
                <div class="carac-item">
                    <i class="fas fa-bath carac-icon"></i>
                    <div class="carac-content">
                        <span class="carac-value">{{ $property[0]->bath_room_number }}</span>
                        <span class="carac-label">Salles de bain</span>
                    </div>
                </div>
            @endif

            @if ($property[0]->kitchen_number != 0)
                <div class="carac-item">
                    <i class="fas fa-utensils carac-icon"></i>
                    <div class="carac-content">
                        <span class="carac-value">{{ $property[0]->kitchen_number }}</span>
                        <span class="carac-label">Cuisines</span>
                    </div>
                </div>
            @endif

            @if ($property[0]->floor_area != 0)
                <div class="carac-item">
                    <i class="fas fa-ruler-combined carac-icon"></i>
                    <div class="carac-content">
                        <span class="carac-value">{{ $property[0]->floor_area }} m²</span>
                        <span class="carac-label">Surface totale</span>
                    </div>
                </div>
            @endif

            @if ($property[0]->plot_area != 0)
                <div class="carac-item">
                    <i class="fas fa-border-all carac-icon"></i>
                    <div class="carac-content">
                        <span class="carac-value">{{ $property[0]->plot_area }} m²</span>
                        <span class="carac-label">Surface couverte</span>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endif
@if ($property[0]->wifi == 1 || $property[0]->balcony == 1 || $property[0]->garden == 1 || $property[0]->garage == 1 || $property[0]->parking == 1 || $property[0]->elevator == 1 || $property[0]->heating == 1 || $property[0]->air_conditioner == 1 || $property[0]->alarm_system == 1 || $property[0]->swimming_pool == 1)
    <div class="amenities">
        <h2 class="amenities-title">Équipements</h2>
        <div class="amenities-grid">
            @if ($property[0]->wifi == 1)
                <div class="amenity-item wifi">
                    <i class="fas fa-wifi amenity-icon"></i>
                    <span>WiFi</span>
                </div>
            @endif
            
            @if ($property[0]->balcony == 1)
                <div class="amenity-item balcony">
                    <i class="fas fa-umbrella-beach amenity-icon"></i>
                    <span>Balcon</span>
                </div>
            @endif
            
            @if ($property[0]->garden == 1)
                <div class="amenity-item garden">
                    <i class="fas fa-tree amenity-icon"></i>
                    <span>Jardin</span>
                </div>
            @endif
            
            @if ($property[0]->garage == 1)
                <div class="amenity-item garage">
                    <i class="fas fa-car amenity-icon"></i>
                    <span>Garage</span>
                </div>
            @endif
            
            @if ($property[0]->parking == 1)
                <div class="amenity-item parking">
                    <i class="fas fa-parking amenity-icon"></i>
                    <span>Parking</span>
                </div>
            @endif
            
            @if ($property[0]->elevator == 1)
                <div class="amenity-item elevator">
                    <i class="fas fa-elevator amenity-icon"></i>
                    <span>Ascenseur</span>
                </div>
            @endif
            
            @if ($property[0]->heating == 1)
                <div class="amenity-item heating">
                    <i class="fas fa-fire amenity-icon"></i>
                    <span>Chauffage</span>
                </div>
            @endif
            
            @if ($property[0]->air_conditioner == 1)
                <div class="amenity-item air_conditioner">
                    <i class="fas fa-snowflake amenity-icon"></i>
                    <span>Climatisation</span>
                </div>
            @endif
            
            @if ($property[0]->alarm_system == 1)
                <div class="amenity-item alarm_system">
                    <i class="fas fa-shield-alt amenity-icon"></i>
                    <span>Système d'alarme</span>
                </div>
            @endif
            
            @if ($property[0]->swimming_pool == 1)
                <div class="amenity-item swimming_pool">
                    <i class="fas fa-swimming-pool amenity-icon"></i>
                    <span>Piscine</span>
                </div>
            @endif
        </div>
    </div>
@endif

                    <!-- Description -->
                    @if ($property[0]->description)
                        <div class="description-section">
                            <h2 class="section-title">Description</h2>
                            <div class="description-content">
                                <p>{{ $property[0]->description }}</p>
                            </div>
                        </div>
                    @endif

    

                    <!-- Similar Properties -->
                    @if (count($propertyRelated) > 0)
                        <div class="similar-properties">
                            <h2 class="section-title">Annonces Similaires</h2>
                            <div class="properties-grid">
                                @foreach ($propertyRelated as $item)
                                    @if (!$item->user == null)
                                            @include('includes.item_property')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3" style="max-width: 45%; flex: 0 0 45%; padding-right: 0;">
                 <!-- Contact Information -->
                    <div class="contact-section">
    <div class="contact-card">
        <h3 class="contact-title">Informations sur l'annonceur</h3>
        
        @php
            $userType = $property[0]->user->checkType();
            $user_property_name = '';

            switch ($userType) {
                case 'company':
                    if (isset($property[0]->user->company)) {
                        $user_property_name = $property[0]->user->company->corporate_name;
                    } else {
                        $user_property_name = '';
                    }
                    break;

                case 'particular':
                    if (isset($property[0]->user->particular)) {
                        $user_property_name = $property[0]->user->particular->first_name;
                        $last_name = $property[0]->user->particular->last_name;

                        if (!empty($last_name)) {
                            $user_property_name .= ' ' . $last_name;
                        }
                    } else {
                        $user_property_name = '';
                    }
                    break;

                default:
                    $user_property_name = $property[0]->user->username;
                    break;
            }
        @endphp

        <div class="contact-info">
            <h4 class="contact-name">{{ ucfirst($user_property_name ?? ($property[0]->user->username ?? 'Non renseigné')) }}</h4>
            @if (isset($user) && isset($user->mobile) && $user->mobile)
                <div class="phone-section">
                    <div class="phone-display">
                        <i class="fas fa-phone"></i>
                        <span class="author-number">{{ substr($user->mobile, 0, 5) }}XXXX</span>
                        <span class="author-reveal-number" style="display: none;">{{ $user->mobile }}</span>
                    </div>
                    <div class="contact-buttons">
                        <button class="btn-secondary" data-user-id="{{ $property[0]->user->id }}" id="display-number-button">
                            Cliquez pour afficher le numéro
                        </button>
                        <a href="tel:{{ $user->mobile }}" class="btn-success" id="call-button" data-phone="{{ $user->mobile }}" data-user-id="{{ $property[0]->user->id }}">
                            <i class="fas fa-phone"></i>
                            Appeler
                        </a>
                    </div>
                </div>
            @else
                <div class="phone-section">
                    <div class="phone-display">
                        <i class="fas fa-phone"></i>
                        <span class="author-number">Non renseigné</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
  <!-- Message Form -->
                    <div class="message-form">
                        <button class="message-toggle" onclick="getmessage()">
                            Envoyer Message <i class="fa fa-plus-circle"></i>
                        </button>
                        
                        <form action="{{ route('send.email.client') }}" method="POST" id="message-form" style="display:none">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nom & Prénom" id="name" name="name">
                                @include('message_session.error_field_message', ['fieldName' => 'name'])
                            </div>
                            
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="E-mail" id="email" name="email">
                                @include('message_session.error_field_message', ['fieldName' => 'email'])
                            </div>
                            
                            <div class="form-group">
                                <input type="number" min="0" class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="N° Tel" id="phone" name="phone">
                                @include('message_session.error_field_message', ['fieldName' => 'phone'])
                            </div>
                            
                            <div class="form-group">
                                <textarea class="form-control @error('message') is-invalid @enderror" rows="3" 
                                    id="message" name="message" placeholder="Message*">Je suis intéressé par cette annonce [REF: {{ $property[0]->ref }}] et j'aimerais avoir plus de détails.</textarea>
                                @include('message_session.error_field_message', ['fieldName' => 'message'])
                                
                                <input type="hidden" name="type" value="property">
                                <input type="hidden" name="property_id" value="{{ $property[0]->id }}">
                                
                                <div style="margin-top: 15px; display: flex; gap: 10px;">
    <button type="submit" class="btn-success" style="flex:1;">
        Envoyer <i class="far fa-paper-plane"></i>
    </button>
    <button type="button" class="btn-secondary" onclick="getmessage()" style="flex:1;">
        Annuler
    </button>
</div>
                            </div>
                        </form>
                    </div>
                <!-- <div class="ads-section">
                    <h3 class="ads-title">PUBLICITÉS</h3>
                    <div class="ads-container">
                        @foreach ($ads as $ad)
                            <a href="{{ $ad->url ? route('ad.click', ['id' => $ad->id]) : '#' }}" 
                               class="ad-item" title="{{ ucfirst($ad->description) }}">
                                <img src="{{ asset($ad ? 'uploads/ads/' . $ad->alt : 'assets/img/account/user0.jpg') }}" 
                                     alt="{{ $ad->description ?? 'Advertisement' }}">
                            </a>
                        @endforeach
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        // Image gallery functionality
        let currentImageIndex = 0;
        const images = [
            @if (count($property[0]->pictures) > 0)
                @foreach ($property[0]->pictures as $index => $picture)
                    @php
                        $imagePath = 'uploads/property_photo/' . $picture->alt;
                        $imageSrc = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('assets/img/product/slider-1.jpg');
                    @endphp
                    "{{ $imageSrc }}"{{ $loop->last ? '' : ',' }}
                @endforeach
            @endif
        ];

        function setActiveImage(index) {
            currentImageIndex = index;
            document.querySelector('.main-image').src = images[index];
            document.getElementById('current-image').textContent = index + 1;
            
            // Update thumbnail active state
            document.querySelectorAll('.thumbnail').forEach((thumb, i) => {
                thumb.classList.toggle('active', i === index);
            });
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            setActiveImage(currentImageIndex);
        }

        function prevImage() {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            setActiveImage(currentImageIndex);
        }

        // Form toggle functionality
        function getmessage() {
            const form = document.getElementById('message-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        // Phone number reveal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const displayButton = document.getElementById('display-number-button');
            if (displayButton) {
                displayButton.addEventListener('click', function() {
                    const numberSpan = document.querySelector('.author-number');
                    const revealSpan = document.querySelector('.author-reveal-number');
                    
                    if (numberSpan && revealSpan) {
                        numberSpan.style.display = 'none';
                        revealSpan.style.display = 'inline';
                        displayButton.style.display = 'none';
                    }
                });
            }
        });

        // Favorite functionality
        function submitAdd() {
            document.getElementById('add_fav').submit();
        }

        function submitDelete() {
            document.getElementById('del_fav').submit();
        }

        function goLogin() {
            document.getElementById('goLogin').submit();
        }

        // Share functionality
        function shareOnFacebook(title, image, slug) {
            const url = window.location.href;
            const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    </script>
    <form id="call-action-form" method="POST" action="{{ route('save_statistique') }}" style="display: none;">
        @csrf
        <input type="hidden" name="user_id" id="user-id-input" value="{{ $property[0]->user->id }}">
        <input type="hidden" name="action_type" value="call">
        <input type="hidden" name="phone" id="phone-input">
    </form>
    {{-- statistique --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#call-button').on('click', function(e) {
                e.preventDefault(); // Prevent default link action

                // Get the data attributes
                var userId = $(this).data('user-id');
                var phone = $(this).data('phone');

                // Set the form inputs
                $('#user-id-input').val(userId);
                $('#phone-input').val(phone);

                // Submit the form using AJAX
                $.ajax({
                    type: 'POST',
                    url: $('#call-action-form').attr('action'),
                    data: $('#call-action-form').serialize(),
                    success: function(response) {
                        // On success, redirect to the dialer
                        window.location.href = 'tel:' + phone;
                    },
                    error: function(error) {
                        console.error("Error submitting form:", error);
                        // Optionally, handle the error
                    }
                });
            });
            // $('#call-button').on('click', function(e) {
            //     e.preventDefault();

            //     $('#call-action-form').submit();
            // });

            // $('#call-button').on('click', function(e) {
            //     e.preventDefault();

            //     var userId = $(this).data('user-id');
            //     var phone = $(this).data('phone');

            //     var action_type = 'call';



            //     $.ajax({
            //         url: ' {{ route('save_statistique') }}',
            //         type: 'POST',
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             user_id: userId,
            //             action_type: action_type

            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                 window.location.href = 'tel:' + phone;
            //                 // setTimeout(function() {
            //                 //     window.location.href = 'tel:' + phone;
            //                 // }, 100);
            //             }
            //         }
            //     });
            // });

            $('#display-number-button').on('click', function() {
                var userId = $(this).data('user-id');
                console.log(userId);

                var action = 'displayed_number';

                $.ajax({
                    url: ' {{ route('save_statistique') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: userId,
                        action_type: action
                    },

                });
            });
        });
    </script>
    {{-- end statistique --}}




    <script>
        function getmessage() {
            var divItem = document.getElementById("message-form");
            if (divItem.style.display === 'none') {
                divItem.style.display = 'block';
            } else {
                divItem.style.display = 'none';
            }
        }

        function submitAdd() {
            document.getElementById('add_fav').submit();
        }

        function submitDelete() {
            document.getElementById('del_fav').submit();
        }

        function goLogin() {
            document.getElementById('goLogin').submit();
        }
    </script>


    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <!-- Initialize the SDK with your App ID -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '443345395094185',
                xfbml: true,
                version: 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function shareOnFacebook() {
            var url = encodeURIComponent('{{ url()->current() }}');
            var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    </script>

@endsection
