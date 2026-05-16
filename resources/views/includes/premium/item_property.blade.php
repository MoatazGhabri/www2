<!-- Property Meta Tags for Mobile Sharing -->
<meta property="og:title" content="{{ $item->property->title ?? 'Propriété immobilière Premium' }} - C�te Magique">
<meta property="og:description" content="{{ $item->property->description ?? 'Découvrez cette propriété premium exceptionnelle à Ariana avec C�te Magique' }}">
<meta property="og:image" content="{{ method_exists($item->property, 'get_meta_image') ? $item->property->get_meta_image() : asset('assets/img/logo/magic.png') }}">
<meta property="og:url" content="{{ url('/propertie_by_id/' . $item->property->id) }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="C�te Magique">
<meta property="og:locale" content="fr_FR">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $item->property->title ?? 'Propriété immobilière Premium' }} - C�te Magique">
<meta name="twitter:description" content="{{ $item->property->description ?? 'Découvrez cette propriété premium exceptionnelle à Ariana avec C�te Magique' }}">
<meta name="twitter:image" content="{{ method_exists($item->property, 'get_meta_image') ? $item->property->get_meta_image() : asset('assets/img/logo/magic.png') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ url('/propertie_by_id/' . $item->property->id) }}">

<!-- Structured Data for Rich Snippets -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "RealEstateListing",
  "name": "{{ $item->property->title ?? 'Propriété immobilière Premium' }}",
  "description": "{{ $item->property->description ?? 'Découvrez cette propriété premium exceptionnelle à Ariana avec C�te Magique' }}",
  "provider": {
    "@type": "RealEstateAgent",
    "name": "C�te Magique",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('assets/img/logo/magic.png') }}"
  },
  "areaServed": {
    "@type": "Country",
    "name": "Tunisie"
  },
  "category": "Immobilier Premium",
  "image": "{{ method_exists($item->property, 'get_meta_image') ? $item->property->get_meta_image() : asset('assets/img/product/01.jpg') }}",
  "url": "{{ url('/propertie_by_id/' . $item->property->id) }}",
  "price": "{{ $item->property->price ?? '' }}",
  "priceCurrency": "TND",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "{{ $item->property->city->name ?? '' }}",
    "addressRegion": "{{ $item->property->area->name ?? '' }}",
    "addressCountry": "TN"
  },
  "floorSize": {
    "@type": "QuantitativeValue",
    "value": "{{ $item->property->floor_area ?? $item->property->surfacetotal ?? '' }}",
    "unitCode": "MTK"
  },
  "numberOfRooms": "{{ $item->property->room_number ?? '' }}",
  "category": "{{ $item->property->category->name ?? '' }}",
  "operation": "{{ $item->property->operation->name ?? '' }}"
}
</script>

<div class="property-card" 
     data-property-id="{{ $item->property->id }}"
     data-property-title="{{ $item->property->title ?? '' }}"
     data-property-image="{{ method_exists($item->property, 'get_meta_image') ? $item->property->get_meta_image() : '' }}"
     data-property-url="{{ url('/propertie_by_id/' . $item->property->id) }}"
     data-property-description="{{ $item->property->description ?? '' }}"
     data-property-price="{{ $item->property->price ?? '' }}"
     data-property-location="{{ $item->property->city->name ?? '' }}, {{ $item->property->area->name ?? '' }}"
     data-property-type="{{ $item->property->category->name ?? '' }}"
     data-property-operation="{{ $item->property->operation->name ?? '' }}">
    <div class="property-image-container">
        <span class="property-badge {{ $item->property->operation->name === 'location' ? 'badge-rent' : 'badge-sale' }}">
            {{ ucfirst($item->property->category->name) }} {{ $item->property->operation->title }}
        </span>
        <a href="{{ auth()->check() && auth()->user()->is_admin ? route('admin_property_info', $item->property->id) : route('prop_info', $item->property->slug) }}">
            @if (isset($item->property->main_picture) &&
                    isset($item->property->main_picture) &&
                    isset($item->property->main_picture->alt) &&
                    file_exists(public_path('uploads/main_picture/images/properties/' . $item->property->main_picture->alt)))
                <?php
                $imagePath = asset('uploads/main_picture/images/properties/' . $item->property->main_picture->alt);
                [$width, $height] = getimagesize(public_path('uploads/main_picture/images/properties/' . $item->property->main_picture->alt));

                $style = $width < 410 && $height < 292 ? 'width: 410px; height: 292px;' : '';
                ?>
                <img src="{{ $imagePath }}" alt="{{ $item->property->title }}" class="property-card-img" style="{{ $style }}">
            @else
                <img src="{{ asset('assets/img/product/01.jpg') }}" alt="{{ $item->property->title }}" class="property-card-img">
            @endif
        </a>
        <div class="property-price {{ ($item->property->price == 0 || $item->property->price == 1) ? 'price-on-demand' : '' }}">
            @if ($item->property->price == 0 || $item->property->price == 1)
                Prix sur demande
            @elseif ($item->property->operation->name !== 'location')
                {{ $item->property->price }} DT
            @else
                {{ $item->property->price }} DT / Mois
            @endif
        </div>
    </div>
    <div class="property-content">
        <div class="property-header" style="display: flex; align-items: center; gap: 10px;">
            <!-- Removed announcer name -->
        </div>
        <div class="property-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $item->property->city->name }}, {{ substr($item->property->area->name, 0, 35) }}</span>
        </div>
        @if ($item->property->situation)
            <div class="property-feature">
                @if ($item->property->situation->slug === 'zone-urbaine')
                    <i class="fas fa-building"></i>
                @elseif($item->property->situation->slug === 'zone-industriel')
                    <i class="fas fa-industry"></i>
                @else
                    <i class="fas fa-tree"></i>
                @endif
                <span>{{ $item->property->situation->name }}</span>
            </div>
        @endif
        <div class="property-features">
            <div class="property-feature">
                <i class="fas fa-ruler-combined"></i>
                <span>{{ $item->property->floor_area ?? $item->property->surfacetotal }} (m²)</span>
            </div>
            <div class="property-feature">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ $item->property->created_at }}</span>
            </div>
        </div>
        <div class="property-footer" style="display: flex; align-items: center; justify-content: space-between;">
            <span class="property-badge badge-ref">{{ strtoupper($item->property->ref) }}</span>
            <a href="{{ route('prop_info_by_id', $item->property->id) }}" class="property-btn">Voir Détails <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<style>
    :root {
        --color-main: #ebb359;
        --color-sale: #10b981;         
        --color-rent: #f59e0b;        
        --color-border: #e5e7eb;       
        --color-bg: #ffffff;           
        --color-shadow: rgba(0, 0, 0, 0.1);
        --color-shadow-strong: rgba(0,0,0,0.18);
        --color-shadow-light: rgba(0,0,0,0.12);
        --color-text: #111827;
        --color-text-light: #6b7280;
        --color-btn-hover: #ebb359;
        --color-price-bg: rgba(246, 59, 72, 0.95);
        --color-on-demand: #f59e0b;
        --color-white: #fff;
    }

        .property-card {
            background: var(--color-bg);
            border: 1px solid var(--color-border);
            box-shadow: 0 2px 8px var(--color-shadow);
            border-radius: 8px;
            margin-bottom: 32px;
        }

        .property-card:hover {
            box-shadow: 0 8px 25px var(--color-shadow);
        }

        .property-image-container {
            position: relative;
            overflow: visible;
            height: 240px;
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 18px; /* space between image and card top */
        }

        .property-card-img {
            box-shadow: 0 8px 24px var(--color-shadow-strong), 0 1.5px 6px var(--color-shadow-light);
            background: var(--color-white);
            width: 98%;
            height: 98%;
            object-fit: cover;
            transition: transform 0.3s ease;
            display: block;
            margin-top: 2px; /* extra space from the top inside the container */
            border-radius: 12px;
        }

        .property-badge {
            position: absolute;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-ref {
            background-color: var(--color-main);
            color: var(--color-white);
            position: static;
            margin-left: 10px;
            display: inline-block;
            vertical-align: middle;
        }

        .badge-sale,
        .badge-rent {
            top: 16px;
            right: 40px;
        }

        .badge-sale {
            background-color: #10b981;
            color: white;
        }

        .badge-rent {
            background-color: #f59e0b;
            color: white;
        }

        .property-price {
            position: absolute;
            left: 40px;
            bottom: 16px;
            background: var(--color-price-bg);
            color: var(--color-white);
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 6px;
            z-index: 3;
            box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        }

        .property-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .property-header {
            margin-bottom: 12px;
        }

        .property-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .property-title a {
            color: var(--color-text);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .property-title a:hover {
            color: var(--color-main);
        }

        .property-location {
            display: flex;
            align-items: center;
            color: var(--color-text-light);
            margin-bottom: 16px;
            font-size: 14px;
        }

        .property-location i {
            color: var(--color-main);
            margin-right: 8px;
            width: 16px;
            flex-shrink: 0;
        }

        .property-location span {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .property-features {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 16px;
            margin-top: auto;
        }

        .property-feature {
            display: flex;
            align-items: center;
            color: var(--color-text-light);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .property-feature i {
            color: var(--color-main);
            margin-right: 8px;
            width: 16px;
            text-align: center;
            flex-shrink: 0;
        }

        .property-footer {
            border-top: 1px solid var(--color-border);
            padding-top: 16px;
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .property-btn {
            background-color: var(--color-main);
            color: var(--color-white);
            display: inline-block;
            vertical-align: middle;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            /* Remove position: static and right */
            /* Add min-width if you want a fixed width */
        }

        .property-btn:hover {
            background-color: var(--color-btn-hover);
            color: var(--color-white);
        }

        .property-btn i {
            margin-left: 8px;
            font-size: 10px;
        }



        .price-on-demand {
            background: var(--color-on-demand) !important;
            color: var(--color-white) !important;
            font-weight: bold;
        }


        /* Tablet Responsive */
        @media (max-width: 768px) {
            .property-price {
                left: 20px;
                bottom: 12px;
                padding: 6px 12px;
            }
            .badge-sale,
            .badge-rent {
                top: 12px;
                right: 20px;
                padding: 4px 10px;
                font-size: 11px;
            }
        }

        /* Mobile Responsive */
        @media (max-width: 480px) {
            body {
                padding: 6px; /* Less padding on mobile */
            }

            .container {
                grid-template-columns: 1fr;
                gap: 10px;
                padding: 0 4px; /* Minimal horizontal padding for mobile */
            }

            .property-content {
                padding: 8px; /* Compact padding for mobile */
            }

            .property-price {
                left: 20px;
                bottom: 9px;
                padding: 4px 8px;
                font-size: 9px;
            }
            .badge-sale,
            .badge-rent {
                top: 9px;
                right: 25px;
                padding: 3px 8px;
                font-size: 10px;
            }
        }

        /* Large screens */
        @media (min-width: 1200px) {
            .container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Extra large screens */
        @media (min-width: 1400px) {
            .container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>

    <script>
    function shareOnFacebook(title, image, url) {
        // Use the ID-based route that actually exists on the site
        // const url = window.location.origin + '/propertie_by_id/' + {{ $item->property->id }};
        const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }

    // Enhanced sharing function for mobile devices
    function shareProperty(propertyCard) {
        const title = propertyCard.dataset.propertyTitle || 'Propriété immobilière Premium';
        const image = propertyCard.dataset.propertyImage || '';
        const url = propertyCard.dataset.propertyUrl || '';
        const description = propertyCard.dataset.propertyDescription || 'Découvrez cette propriété premium exceptionnelle';
        
        // Check if native sharing is available (mobile devices)
        if (navigator.share) {
            navigator.share({
                title: title,
                text: description,
                url: url,
                image: image
            }).catch(console.error);
        } else {
            // Fallback to Facebook sharing
            shareOnFacebook(title, image, url);
        }
    }

    // Add long press event listener for mobile sharing
    document.addEventListener('DOMContentLoaded', function() {
        const propertyCards = document.querySelectorAll('.property-card');
        
        propertyCards.forEach(card => {
            let pressTimer;
            
            // Long press event
            card.addEventListener('touchstart', function(e) {
                pressTimer = setTimeout(() => {
                    shareProperty(this);
                }, 500); // 500ms for long press
            });
            
            card.addEventListener('touchend', function() {
                clearTimeout(pressTimer);
            });
            
            card.addEventListener('touchmove', function() {
                clearTimeout(pressTimer);
            });
            
            // Also add click event for the share button
            const shareButton = card.querySelector('.share-button');
            if (shareButton) {
                shareButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    shareProperty(card);
                });
                // Update onclick attribute to use the new function
                shareButton.setAttribute('onclick', 'shareProperty(this.closest(".property-card"))');
            }
        });
    });
    </script>
