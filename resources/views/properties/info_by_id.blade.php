@extends('layouts.app')
@section('meta')
    <!-- Enhanced Meta tags for SEO -->
        <meta name="description" content="IAF, votre agence immobilière en Tunisie. Achat, location ou vente de biens immobiliers.">
            <meta name="keywords" content="immobilier Sfax, agence immobilière Sfax, terrains agricoles, vente terrain agricole, location terrain agricole, IAF, Agrebi Frères, immobilier agricole Tunisie">
        <meta name="author" content="IAF">
    <meta name="contact" content="+216-94303262">
    <meta name="email" content="contact@iaf-immo.tn">
    <meta name="address" content="70 Rue Ibn Khaldoun, Riadh Andalous, Ariana">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Enhanced Open Graph meta tags -->
    <meta property="og:url" content="https://iaf-immo.tn">
    <meta property="og:title" content="IAF - Votre partenaire immobilier de confiance en Tunisie">
    <meta property="og:description" content="Découvrez notre sélection de biens immobiliers à Ariana et ses environs : Appartements, villas, maisons, terrains, bureaux et locaux commerciaux.">
    <meta property="og:image" content="{{ asset('assets/img/logo/iaf.png') }}">
    <meta property="og:image:alt" content="{{ $property->title ?? 'IAF' }}">
    <meta property="og:type" content="website" />
        <meta property="og:site_name" content="IAF">
    <meta property="og:locale" content="fr_FR">
    
    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="IAF - Votre partenaire immobilier de confiance">
    <meta name="twitter:description" content="Découvrez notre sélection de biens immobiliers à Ariana et ses environs : Appartements, villas, maisons, terrains, bureaux et locaux commerciaux.">
    <meta name="twitter:image" content="{{ asset('assets/img/logo/iaf.png') }}">
        <meta name="twitter:image:alt" content="{{ $property->title ?? 'IAF' }}">
    
    <!-- Additional SEO meta tags -->
    <meta name="geo.region" content="TN-12">
    <meta name="geo.placename" content="Ariana">
    <meta name="geo.position" content="36.8625;10.1956">
    <meta name="ICBM" content="36.8625, 10.1956">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/iaf.png') }}">
    
    <!-- JSON-LD Structured Data for Property -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "RealEstateListing",
        "name": "{{ $property->title ?? 'Propriété immobilière' }}",
        "description": "{{ $property->description ?? 'Découvrez ce bien immobilier exceptionnel en Tunisie avec IAF.' }}",
        "url": "{{ url()->current() }}",
        "image": [
            @if($property && $property->pictures && $property->pictures->count() > 0)
                @foreach($property->pictures->take(5) as $index => $picture)
                    "{{ asset('uploads/property_photo/' . $picture->alt) }}"{{ $index < min(4, $property->pictures->count() - 1) ? ',' : '' }}
                @endforeach
            @else
                "{{ asset('assets/img/logo/iaf.png') }}"
            @endif
        ],
        "offers": {
            "@type": "Offer",
            "price": "{{ $property->price ?? 'Sur demande' }}",
            "priceCurrency": "TND",
            "availability": "https://schema.org/InStock",
            "validFrom": "{{ now()->format('Y-m-d') }}"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $property->address ?? 'Ariana' }}",
            "addressLocality": "{{ $property->city ?? 'Ariana' }}",
            "addressRegion": "Ariana",
            "addressCountry": "TN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "{{ $property->latitude ?? '36.8625' }}",
            "longitude": "{{ $property->longitude ?? '10.1956' }}"
        },
        "floorSize": {
            "@type": "QuantitativeValue",
            "value": "{{ $property->surface ?? 'Non spécifié' }}",
            "unitCode": "MTK"
        },
        "numberOfRooms": "{{ $property->rooms ?? 'Non spécifié' }}",
        "provider": {
            "@type": "RealEstateAgent",
            "name": "IAF",
            "url": "https://iaf-immo.tn",
                "logo": "{{ asset('assets/img/logo/iaf.png') }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "70 Rue Ibn Khaldoun, Riadh Andalous",
                "addressLocality": "Ariana",
                "addressCountry": "TN",
                "telephone": "+216-94303262"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+216-94303262",
                "contactType": "customer service",
                "availableLanguage": ["French", "Arabic"]
            }
        },
        "areaServed": {
            "@type": "Country",
            "name": "Tunisie"
        },
        "category": "Immobilier",
        "serviceType": "Vente et Location de biens immobiliers"
    }
    </script>
    
    <!-- Breadcrumb Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Accueil",
                "item": "{{ url('/') }}"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Propriétés",
                "item": "{{ url('/properties') }}"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "{{ $property->title ?? 'Propriété' }}",
                "item": "{{ url()->current() }}"
            }
        ]
    }
    </script>
@endsection
@section('pageTitle')
    {{ $property->title ?? 'Agence Immobilière L\'avenir - Détail de l\'annonce' }}
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --color: #759f17;
        }
    .section-title-centered,
    .section-title,
    .carac-title,
    .amenities-title,
    h4.section-title-centered {
        text-align: center !important;
        margin-left: auto;
        margin-right: auto;
        display: block;
        font-weight: 700 !important;
        color: var(--color) !important;
        font-size: 1.5rem !important;
        position: relative;
        padding-bottom: 12px;
        margin-bottom: 25px;
    }
    
    .section-title-centered::after,
    .section-title::after,
    .carac-title::after,
    .amenities-title::after,
    h4.section-title-centered::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--color), var(--color));
        border-radius: 2px;
    }
    
    /* Enhanced section spacing */
    .carac, .amenities, .description-section, .similar-properties {
        margin-top: 3rem;
    }
    
    /* Form section titles */
    .message-form h4 {
        font-weight: 700 !important;
        color: var(--color) !important;
        font-size: 1.3rem !important;
        text-align: center !important;
        margin-bottom: 20px !important;
        position: relative;
        padding-bottom: 10px;
    }
    
    .message-form h4::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, var(--color), var(--color));
        border-radius: 2px;
    }
    /* Toast Styles */
    .toast {
        position: fixed !important;
        top: 20px !important;
        right: 20px !important;
        background: white !important;
        border-radius: 8px !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        padding: 16px 20px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 12px !important;
        min-width: 300px !important;
        max-width: 400px !important;
        z-index: 99999 !important;
        animation: slideInRight 0.3s ease-out !important;
        border: 2px solid #333 !important;
    }

    .toast-success {
        border-left: 4px solid #10b981;
    }

    .toast-error {
        border-left: 4px solid #ef4444;
    }

    .toast-content {
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 1;
    }

    .toast-content i {
        font-size: 18px;
    }

    .toast-success .toast-content i {
        color: #10b981;
    }

    .toast-error .toast-content i {
        color: #ef4444;
    }

    .toast-content span {
        color: #374151;
        font-size: 14px;
        font-weight: 500;
    }

    .toast-close {
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        padding: 4px;
        border-radius: 4px;
        transition: color 0.2s;
    }

    .toast-close:hover {
        color: #6b7280;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @media (max-width: 768px) {
        .toast {
            left: 20px;
            right: 20px;
            min-width: auto;
        }
    }
        .col-lg-9 {
            flex: 3;
            min-width: 0;
        }

        .col-lg-3 {
            flex: 1;
            min-width: 320px;
            max-width: 380px;
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
            color: var(--color);
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
        .property-header-section {
            margin: 2rem 0;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .property-header {
            margin-bottom: 0;
        }

        .property-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .property-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 0;
            color: #111827;
            flex: 1;
            margin-right: 20px;
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
                color: var(--color);
            width: 16px;
        }

        .property-ref {
            background-color:rgba(255, 172, 6, 0);
            color: var(--color);
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Action Buttons */
        .property-actions {
            display: flex;
            gap: 10px;
            margin-top: 0;
            flex-shrink: 0;
        }

        .share-button {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            color: #6b7280;
        }

        .share-button:hover {
            background-color: #f3f4f6;
        }


        /* Image Gallery */
        .property-gallery {
            margin-bottom: 30px;
        }

        .main-image-container {
            position: relative;
            height: auto;
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
            border-color: var(--color);
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
            color: #ff7901;
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
            color: #ff7901;
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
    color: var(--color);
    margin-bottom: 1.5rem;
    padding-bottom: 12px;
    border-bottom: none;
    font-weight: 700;
    text-align: center;
    position: relative;
}

.amenities-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--color), var(--color));
    border-radius: 2px;
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
    color: #ff7901;
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
            color: var(--color);
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
            color: var(--color);
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
            border-color: var(--color);
            box-shadow: 0 0 0 3px rgba(100, 153, 1, 0.1);
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 350px));
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
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
        --color-main: #EB4E1C;
        --color-sale: #10b981;
        --color-rent: #ff7901;
        --color-border: #e5e7eb;
        --color-bg: #ffffff;
        --color-shadow: rgba(0, 0, 0, 0.1);
        --color-shadow-strong: rgba(0,0,0,0.18);
        --color-shadow-light: rgba(0,0,0,0.12);
        --color-text: #111827;
        --color-text-light: #6b7280;
        --color-btn-hover: #cb0000;
        --color-price-bg: rgba(246, 59, 72, 0.95);
        --color-on-demand: #ff7901;
        --color-white: #fff;
        --color-success-dark: #059669;
        --color-warning-dark: #ff7901;
        --color-main-hover: #EB4E1C;
    }

.main-image-container {
    position: relative;
    height: auto;
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
    color: var(--color-main);
    margin-bottom: 1.5rem;
    padding-bottom: 12px;
    border-bottom: none;
    display: block;
    width: 100%;
    font-weight: 700;
    text-align: center;
    position: relative;
}

.carac-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
        background: linear-gradient(90deg, var(--color-main), var(--color-main));
    border-radius: 2px;
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
                max-width: none;
            }

            .property-header-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .property-title {
                font-size: 24px;
                margin-right: 0;
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

    <!-- Forced animated border for description -->
    <style>
    /* Remove forced animated border for description and match caractéristiques/équipements style */
.modern-description-section {
    background: #f8f9fa !important;
    border-radius: 8px !important;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08) !important;
    padding: 1.5rem !important;
    margin-bottom: 40px !important;
    margin-top: 0 !important;
    max-width: 100% !important;
}
.modern-description-content {
    color: #374151 !important;
    font-size: 1.08rem !important;
    line-height: 1.8 !important;
    letter-spacing: 0.01em !important;
    padding: 0 !important;
    text-align: justify !important;
    background: none !important;
    border-radius: 0 !important;
    position: static !important;
    z-index: auto !important;
    box-shadow: none !important;
    overflow: visible !important;
    border: none !important;
}
.modern-description-content::before { display: none !important; }
    </style>

    <!-- Toast Styles -->
    <style>
    </style>
<div class="container" style="margin-top: 190px;">
    <div class="row">
        <div class="col-lg-9">

            <div class="product-single-wrapper">
                <!-- Property Header -->
                <div class="property-header-section">
                <div class="property-header">
                        <div class="property-header-top">
                            <h1 class="property-title">{{ strtoupper($property->title ?? 'Non renseigné') }}</h1>
                    <div class="property-actions">
                        <!-- Bouton favoris supprimé car les utilisateurs ne peuvent pas s'inscrire -->
                        <button onclick="shareOnFacebook('{{ $property->title ?? '' }}','{{ method_exists($property, 'get_meta_image') ? $property->get_meta_image() : '' }}','{{ $property->slug ?? '' }}')" class="share-button">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </div>
                        <div class="property-meta">
                            <div class="property-meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $property->city->name ?? 'Non renseigné' }}, {{ $property->area->name ?? '' }}</span>
                            </div>
                            <div class="property-meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Publié le {{ $property->created_at ?? 'Non renseigné' }}</span>
                            </div>
                            <div class="property-meta-item">
                                <i class="fas fa-eye"></i>
                                <span>{{ $property->count_views ?? 0 }} vues</span>
                            </div>
                            <div class="property-ref">
                                Réf. {{ strtoupper($property->ref ?? '') }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="section-divider">
                <!-- Image Gallery -->
                <div class="property-gallery">
                    <div class="main-image-container">
                        @php
                            $pictures = $property->pictures ?? collect([]);
                            $mainPic = $pictures->first() ?? ($property->main_picture ?? null);
                            $mainPicPath = $mainPic && isset($mainPic->alt) && file_exists(public_path('uploads/property_photo/' . $mainPic->alt))
                                ? asset('uploads/property_photo/' . $mainPic->alt)
                                : (isset($property->main_picture->alt) && file_exists(public_path('uploads/main_picture/images/properties/' . $property->main_picture->alt))
                                    ? asset('uploads/main_picture/images/properties/' . $property->main_picture->alt)
                                    : asset('assets/img/product/01.jpg'));
                        @endphp
                        <img src="{{ $mainPicPath }}" 
                             alt="{{ $property->title }} - {{ $property->type ?? 'Bien immobilier' }} à {{ $property->city ?? 'Ben Arous' }} - Agence Immobilière immo\'in" 
                             class="main-image"
                             loading="eager"
                             width="800"
                             height="600"
                             itemprop="image"
                             data-property-id="{{ $property->id ?? '' }}"
                             data-property-title="{{ $property->title ?? '' }}">
                        @if ($pictures->count() > 1)
                            <button class="image-nav-btn prev" onclick="prevImage()">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="image-nav-btn next" onclick="nextImage()">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <div class="image-counter">
                                <span id="current-image">1</span> / {{ $pictures->count() }}
                            </div>
                        @endif
                    </div>
                    @if ($pictures->count() > 1)
                        <div class="thumbnail-grid">
                            @foreach ($pictures->take(4) as $index => $picture)
                                @php
                                    $thumbPath = 'uploads/property_photo/' . $picture->alt;
                                    $thumbSrc = file_exists(public_path($thumbPath)) ? asset($thumbPath) : asset('assets/img/product/slider-1.jpg');
                                @endphp
                                <div class="thumbnail {{ $index === 0 ? 'active' : '' }}" onclick="setActiveImage({{ $index }})" style="position: relative; cursor: pointer;">
                                    <img src="{{ $thumbSrc }}" 
                                         alt="{{ $property->title }} - {{ $property->type ?? 'Bien immobilier' }} à {{ $property->city ?? 'Tunis' }} - Image {{ $index + 1 }} - IAF - Agence Immobilière Agrebi Frères"
                                         loading="lazy"
                                         width="150"
                                         height="100"
                                         itemprop="image"
                                         data-property-id="{{ $property->id ?? '' }}"
                                         data-image-index="{{ $index }}">
                                    @if ($index === 3 && $pictures->count() > 4)
                                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(30, 64, 175, 0.75); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; border-radius: 6px;">
                                            +{{ $pictures->count() - 4 }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <hr class="section-divider">
                <!-- Badges Section (moved above Caractéristiques) -->
                <div class="carac" style="margin-bottom: 0;">
                    <div class="carac-items">
                                        <div class="carac-item" style="background: #fff; color: #152ba1; border: 1.5px solid #152ba1; box-shadow: 0 1px 3px rgba(21,43,161,0.07);">
                    <i class="fas fa-home carac-icon" style="color: #152ba1;"></i>
                            <div class="carac-content">
                                <span class="carac-value">{{ strtoupper($property->category->name ?? '') }}</span>
                                <span class="carac-label">Catégorie</span>
                            </div>
                        </div>
                        <div class="carac-item" style="background: #fff; color: {{ ($property->operation->name ?? '') === 'location' ? '#f59e0b' : '#10b981' }}; border: 1.5px solid {{ ($property->operation->name ?? '') === 'location' ? '#f59e0b' : '#10b981' }}; box-shadow: 0 1px 3px rgba(59,130,246,0.07);">
                            <i class="fas fa-exchange-alt carac-icon" style="color: {{ ($property->operation->name ?? '') === 'location' ? '#f59e0b' : '#10b981' }};"></i>
                            <div class="carac-content">
                                <span class="carac-value">{{ strtoupper($property->operation->name ?? '') }}</span>
                                <span class="carac-label">Opération</span>
                            </div>
                        </div>
                        @if($property->situation && $property->situation->name)
                        <div class="carac-item" style="background: #fff; color: #6366f1; border: 1.5px solid #6366f1; box-shadow: 0 1px 3px rgba(99,102,241,0.07);">
                            <i class="fas fa-info-circle carac-icon" style="color: #6366f1;"></i>
                            <div class="carac-content">
                                <span class="carac-value">{{ ucfirst($property->situation->name) }}</span>
                                <span class="carac-label">Situation</span>
                            </div>
                        </div>
                        @endif
                        <div class="carac-item" style="background: #fff; color: #f63b48; border: 1.5px solid #f63b48; box-shadow: 0 1px 3px rgba(246,59,72,0.07);">
                            <i class="fas fa-tag carac-icon" style="color: #f63b48;"></i>
                            <div class="carac-content">
                                <span class="carac-value">
                                    @if ($property->price == 0 || $property->price == 1)
                                        Prix sur demande
                                    @else
                                        {{ $property->price }} DT
                                    @endif
                                </span>
                                <span class="carac-label">Prix</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Badges Section -->
                <!-- Features Section -->
                @if (($property->room_number ?? 0) != 0 || ($property->living_room_number ?? 0) != 0 || ($property->bath_room_number ?? 0) != 0 || ($property->kitchen_number ?? 0) != 0 || ($property->plot_area ?? 0) != 0 || ($property->floor_area ?? 0) != 0 || ($property->terrace  ?? 0) != 0 || ($property->etage ?? 0) != 0)
                    <div class="carac">
                        <h2 class="carac-title section-title-centered">Caractéristiques</h2>
                        <div class="carac-items">
                            @if (($property->room_number ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-bed carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->room_number }}</span>
                                        <span class="carac-label">Chambres</span>
                                    </div>
                                </div>
                            @endif
                            @if (($property->living_room_number ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-couch carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->living_room_number }}</span>
                                        <span class="carac-label">Salons</span>
                                    </div>
                                </div>
                            @endif
                            @if (($property->bath_room_number ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-bath carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->bath_room_number }}</span>
                                        <span class="carac-label">Salles de bain</span>
                                    </div>
                                </div>
                            @endif
                            @if (($property->kitchen_number ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-utensils carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->kitchen_number }}</span>
                                        <span class="carac-label">Cuisines</span>
                                    </div>
                                </div>
                            @endif
                            @if (($property->floor_area ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-ruler-combined carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->floor_area }} m²</span>
                                        <span class="carac-label">Surface totale</span>
                                    </div>
                                </div>
                            @endif
                            @if (($property->plot_area ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-border-all carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->plot_area }} m²</span>
                                        <span class="carac-label">Surface couverte</span>
                                    </div>
                                </div>
                            @endif
                            @if (($property->terrace  ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-umbrella-beach carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->terrace  }}</span>
                                        <span class="carac-label">Nombre de Terrasses</span>
                        </div>
                    </div>
                            @endif
                            @if (($property->etage ?? 0) != 0)
                                <div class="carac-item">
                                    <i class="fas fa-layer-group carac-icon"></i>
                                    <div class="carac-content">
                                        <span class="carac-value">{{ $property->etage }}</span>
                                        <span class="carac-label">Numéro d'étage</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr class="section-divider">
                @endif
                @if (($property->wifi ?? 0) == 1 || ($property->balcony ?? 0) == 1 || ($property->garden ?? 0) == 1 || ($property->garage ?? 0) == 1 || ($property->parking ?? 0) == 1 || ($property->elevator ?? 0) == 1 || ($property->heating ?? 0) == 1 || ($property->air_conditioner ?? 0) == 1 || ($property->alarm_system ?? 0) == 1 || ($property->swimming_pool ?? 0) == 1)
                    <div class="amenities">
                        <h2 class="amenities-title section-title-centered">Équipements</h2>
                        <div class="amenities-grid">
                            @if (($property->wifi ?? 0) == 1)
                                <div class="amenity-item wifi">
                                    <i class="fas fa-wifi amenity-icon"></i>
                                    <span>WiFi</span>
                                </div>
                            @endif
                            @if (($property->balcony ?? 0) == 1)
                                <div class="amenity-item balcony">
                                    <i class="fas fa-umbrella-beach amenity-icon"></i>
                                    <span>Balcon</span>
                                </div>
                            @endif
                            @if (($property->garden ?? 0) == 1)
                                <div class="amenity-item garden">
                                    <i class="fas fa-tree amenity-icon"></i>
                                    <span>Jardin</span>
                                </div>
                            @endif
                            @if (($property->garage ?? 0) == 1)
                                <div class="amenity-item garage">
                                    <i class="fas fa-car amenity-icon"></i>
                                    <span>Garage</span>
                                </div>
                            @endif
                            @if (($property->parking ?? 0) == 1)
                                <div class="amenity-item parking">
                                    <i class="fas fa-parking amenity-icon"></i>
                                    <span>Parking</span>
                                </div>
                            @endif
                            @if (($property->elevator ?? 0) == 1)
                                <div class="amenity-item elevator">
                                    <i class="fas fa-elevator amenity-icon"></i>
                                    <span>Ascenseur</span>
                                </div>
                            @endif
                            @if (($property->heating ?? 0) == 1)
                                <div class="amenity-item heating">
                                    <i class="fas fa-fire-alt amenity-icon"></i>
                                    <span>Chauffage</span>
                                </div>
                            @endif
                            @if (($property->air_conditioner ?? 0) == 1)
                                <div class="amenity-item air_conditioner">
                                    <i class="fas fa-snowflake amenity-icon"></i>
                                    <span>Climatisation</span>
                                </div>
                            @endif
                            @if (($property->alarm_system ?? 0) == 1)
                                <div class="amenity-item alarm_system">
                                    <i class="fas fa-bell amenity-icon"></i>
                                    <span>Alarme</span>
                                </div>
                            @endif
                            @if (($property->swimming_pool ?? 0) == 1)
                                <div class="amenity-item swimming_pool">
                                    <i class="fas fa-swimming-pool amenity-icon"></i>
                                    <span>Piscine</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr class="section-divider">
                @endif
                <div class="description-section modern-description-section">
                    <h2 class="section-title section-title-centered">Description</h2>
                    <div class="description-content modern-description-content">
                        <p>{{ $property->description ?? 'Non renseigné' }}</p>
                    </div>
                </div>
                <hr class="section-divider">

                <!-- Message Form -->
                {{-- The message form is now in the right sidebar --}}
            </div>
        </div>

        <div class="col-lg-3">
            <hr class="section-divider" style="margin-top:0; margin-bottom:30px;">
            <!-- Video and Map Section -->
            @if($property->vedio_path)
            <div class="modern-description-section mb-4" style="padding: 1.5rem 1rem;">
                <h2 class="section-title section-title-centered" style="color: var(--color-main); font-size: 1.3rem;">Vidéo</h2>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <video width="100%" height="240" controls style="max-width: 100%; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.10); background: #fff;">
                        <source src="{{ asset('uploads/videos/properties/' . $property->vedio_path) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>
                </div>
            </div>
            @endif
            @if($property->map_embed_url || $property->address)
            <div class="modern-description-section mb-4" style="padding: 1.5rem 1rem;">
                <h2 class="section-title section-title-centered" style="color: var(--color-main); font-size: 1.3rem;">Localisation</h2>
                @if($property->address)
                <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem;">
                    <i class="fa-solid fa-location-dot" style="color: var(--color-main); font-size: 1.5rem;"></i>
                    <span style="font-size: 1rem; color: #374151; font-weight: 600;">{{ $property->address }}</span>
                </div>
                @endif
                <div id="map" style="width: 100%; height: 185px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.10); background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                    @if($property->map_embed_url)
                        <iframe 
                            src="{{ $property->map_embed_url }}" 
                            width="100%" 
                            height="100%" 
                            style="border:0; border-radius: 8px; background: #fff;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @endif
                </div>
            </div>
            @endif
            <!-- Contact Information (keep existing if present) -->
            @if (View::exists('includes.contact_card'))
                @include('includes.contact_card')
            @endif
            <!-- Message Form: always open -->
                    <div class="message-form" style="margin-top: 30px;">
            <h4 class="section-title-centered" style="font-weight:600; margin-bottom:12px; color:var(--color-main);">Envoyer un e-mail</h4>
            <form action="{{ route('send.email.client') }}" method="POST" id="message-form">
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
                            id="message" name="message" placeholder="Message*">Je suis intéressé par cette annonce [REF: {{ $property->ref ?? '' }}] et j'aimerais avoir plus de détails.</textarea>
                        @include('message_session.error_field_message', ['fieldName' => 'message'])
                        <input type="hidden" name="type" value="property">
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <div style="margin-top: 15px; display: flex; gap: 10px;">
                            <button type="submit" class="btn-success" style="flex:1;">
                                Envoyer <i class="far fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <hr style="margin: 35px 0 25px 0; border-top: 2px solid #e5e7eb;">
            <!-- Admin Message Form -->
            <div class="message-form" style="margin-top: 0;">
                <h4 class="section-title-centered" style="font-weight:600; margin-bottom:12px; color:var(--color-main);">Envoyer un message</h4>
                @if(session('success'))
                    <div class="alert alert-success" style="margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('send.email.admin') }}" method="POST" id="admin-message-form">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">
                    <div class="form-group">
                        <input type="text" class="form-control @error('admin_name') is-invalid @enderror"
                            placeholder="Nom & Prénom" id="admin_name" name="admin_name">
                        @include('message_session.error_field_message', ['fieldName' => 'admin_name'])
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control @error('admin_email') is-invalid @enderror"
                            placeholder="E-mail" id="admin_email" name="admin_email">
                        @include('message_session.error_field_message', ['fieldName' => 'admin_email'])
                    </div>
                    <div class="form-group">
                        <input type="number" min="0" class="form-control @error('admin_phone') is-invalid @enderror"
                            placeholder="N° Tel" id="admin_phone" name="admin_phone">
                        @include('message_session.error_field_message', ['fieldName' => 'admin_phone'])
                    </div>
                    <div class="form-group">
                        <textarea class="form-control @error('admin_message') is-invalid @enderror" rows="3"
                            id="admin_message" name="admin_message" placeholder="Message*">Je suis intéressé par cette annonce [REF: {{ $property->ref ?? '' }}] et j'aimerais avoir plus de détails.</textarea>
                        @include('message_session.error_field_message', ['fieldName' => 'admin_message'])
                    </div>
                    <div style="margin-top: 15px; display: flex; gap: 10px;">
                        <button type="submit" class="btn-success" style="flex:1;">
                            Envoyer <i class="far fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                </div>
            </div>
            

    </div>
</div>
@include('includes.floating_social')
<script>
    let currentImageIndex = 0;
    const images = [
        @if ($pictures->count() > 0)
            @foreach ($pictures as $index => $picture)
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
    function getmessage() {
        const form = document.getElementById('message-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
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
    function shareOnFacebook(title, image, slug) {
        // Use the same URL structure as item_property.blade.php
        const url = window.location.origin + '/propertie_by_id/' + {{ $property->id }};
        const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
 // Client email form submission with toast
    document.addEventListener('DOMContentLoaded', function() {
        const clientMessageForm = document.getElementById('message-form');
        if (clientMessageForm) {
            clientMessageForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                // Disable button and show loading
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
                
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        console.log('Showing success toast');
                        showToast('E-mail envoyé avec succès !', 'success');
                        this.reset();
                    } else {
                        console.log('Showing error toast');
                        showToast('Erreur lors de l\'envoi de l\'e-mail.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Erreur lors de l\'envoi de l\'e-mail.', 'error');
                })
                .finally(() => {
                    // Re-enable button
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalText;
                });
            });
        }
    });

    // Admin message form submission with toast
    document.addEventListener('DOMContentLoaded', function() {
        const adminMessageForm = document.getElementById('admin-message-form');
        if (adminMessageForm) {
            adminMessageForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                // Disable button and show loading
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
                
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        console.log('Showing success toast');
                        showToast('Message envoyé avec succès à l\'administrateur !', 'success');
                        this.reset();
                    } else {
                        console.log('Showing error toast');
                        showToast('Erreur lors de l\'envoi du message.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Erreur lors de l\'envoi du message.', 'error');
                })
                .finally(() => {
                    // Re-enable button
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalText;
                });
            });
        }
    });

    // Toast notification function
    function showToast(message, type = 'success') {
        console.log('showToast called with:', message, type);
        
        // Remove existing toasts
        const existingToasts = document.querySelectorAll('.toast');
        existingToasts.forEach(toast => toast.remove());
        
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <div class="toast-content">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
                <span>${message}</span>
            </div>
            <button class="toast-close" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        `;
        
        console.log('Toast element created:', toast);
        document.body.appendChild(toast);
        console.log('Toast added to body');
        
        // Debug: Check if toast is visible
        console.log('Toast computed styles:', window.getComputedStyle(toast));
        console.log('Toast position:', toast.offsetTop, toast.offsetLeft, toast.offsetWidth, toast.offsetHeight);
        console.log('Toast is visible:', toast.offsetWidth > 0 && toast.offsetHeight > 0);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (toast.parentElement) {
                toast.remove();
            }
        }, 5000);
    }
</script>
<form id="call-action-form" method="POST" action="{{ route('save_statistique') }}" style="display: none;">
    @csrf
    <input type="hidden" name="user_id" id="user-id-input" value="{{ $user->id ?? '' }}">
    <input type="hidden" name="action_type" value="call">
    <input type="hidden" name="phone" id="phone-input">
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#call-button').on('click', function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            var phone = $(this).data('phone');
            $('#user-id-input').val(userId);
            $('#phone-input').val(phone);
            $.ajax({
                type: 'POST',
                url: $('#call-action-form').attr('action'),
                data: $('#call-action-form').serialize(),
                success: function(response) {
                    window.location.href = 'tel:' + phone;
                },
                error: function(error) {
                    console.error("Error submitting form:", error);
                }
            });
        });
        $('#display-number-button').on('click', function() {
            var userId = $(this).data('user-id');
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
<!-- Similar Properties Section -->
@if(isset($propertyRelated) && $propertyRelated->count() > 0)
<div class="similar-properties" style="margin-left: 0; padding: 0 10px 0 0;">
    <h2 class="section-title" style="text-align:left;">Annonces similaires</h2>
    <div class="properties-grid">
        @foreach ($propertyRelated as $item)
            @if (!$item->user == null)
                @include('includes.item_property')
            @endif
        @endforeach
    </div>
</div>
@else
<div class="similar-properties" style="margin-left: 0; padding: 0 10px 0 0; display: flex; justify-content: center; align-items: center; min-height: 180px;">
    <div style="background: #fff; border-radius: 16px; box-shadow: 0 4px 16px rgba(30,64,175,0.07); padding: 2.5rem 2rem; display: flex; flex-direction: column; align-items: center; max-width: 420px; width: 100%;">
        <i class="far fa-folder-open" style="font-size: 3rem; color: var(--color); margin-bottom: 1rem;"></i>
        <h2 class="section-title" style="text-align:center; color: var(--color); font-size: 1.3rem; margin-bottom: 0.5rem;">Aucune annonce similaire trouvée</h2>
    </div>
</div>
@endif
@endsection 
