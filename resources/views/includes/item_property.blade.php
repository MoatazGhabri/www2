<!-- Property Meta Tags for Mobile Sharing -->
<meta property="og:title" content="{{ $item->title ?? 'Propriété immobilière' }}">
<meta property="og:description" content="{{ $item->description ?? 'Découvrez cette propriété exceptionnelle' }}">
<meta property="og:image" content="{{ method_exists($item, 'get_meta_image') ? $item->get_meta_image() : asset('assets/img/product/01.jpg') }}">
<meta property="og:url" content="{{ url('/propertie_by_id/' . $item->id) }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="C�te Magique">
<meta property="og:image" content="{{ asset('assets/img/logo/magic.png') }}">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="600">
<meta property="og:image:alt" content="{{ $item->title }} - {{ $item->city->name }}, {{ $item->area->name }}">
<meta property="og:locale" content="fr_FR">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $item->title ?? 'Propriété immobilière' }}">
<meta name="twitter:description" content="{{ $item->description ?? 'Découvrez cette propriété exceptionnelle' }}">
<meta name="twitter:image" content="{{ method_exists($item, 'get_meta_image') ? $item->get_meta_image() : asset('assets/img/product/01.jpg') }}">

<!-- Structured Data for Rich Snippets -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "RealEstateListing",
  "name": "{{ $item->title ?? 'Propriété immobilière' }}",
  "description": "{{ $item->description ?? 'Découvrez cette propriété exceptionnelle' }}",
  "image": "{{ method_exists($item, 'get_meta_image') ? $item->get_meta_image() : asset('assets/img/product/01.jpg') }}",
  "url": "{{ url('/propertie_by_id/' . $item->id) }}",
  "price": "{{ $item->price ?? '' }}",
  "priceCurrency": "TND",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "{{ $item->city->name ?? '' }}",
    "addressRegion": "{{ $item->area->name ?? '' }}",
    "addressCountry": "TN"
  },
  "floorSize": {
    "@type": "QuantitativeValue",
    "value": "{{ $item->floor_area ?? $item->surfacetotal ?? '' }}",
    "unitCode": "MTK"
  },
  "numberOfRooms": "{{ $item->room_number ?? '' }}",
  "category": "{{ $item->category->name ?? '' }}",
  "operation": "{{ $item->operation->name ?? '' }}",
  "provider": {
    "@type": "RealEstateAgent",
    "name": "C�te Magique",
            "logo": "{{ asset('assets/img/logo/magic.png') }}"
  }
}
</script>

<div class="property-card" 
     data-property-id="{{ $item->id }}"
     data-property-title="{{ $item->title ?? '' }}"
     data-property-image="{{ method_exists($item, 'get_meta_image') ? $item->get_meta_image() : '' }}"
     data-property-url="{{ url('/propertie_by_id/' . $item->id) }}"
     data-property-description="{{ $item->description ?? '' }}"
     data-property-price="{{ $item->price ?? '' }}"
     data-property-location="{{ $item->city->name ?? '' }}, {{ $item->area->name ?? '' }}"
     data-property-type="{{ $item->category->name ?? '' }}"
     data-property-operation="{{ $item->operation->name ?? '' }}">
    <div class="property-image-container">
        <span class="property-badge {{ $item->operation->name === 'location' ? 'badge-rent' : 'badge-sale' }}">
            {{ ucfirst($item->category->name) }} {{ $item->operation->title }}
        </span>
        <a href="{{ auth()->check() && auth()->user()->is_admin ? route('admin_property_info', $item->id) : route('prop_info', $item->slug) }}">
            @if (isset($item->main_picture) &&
                    isset($item->main_picture) &&
                    isset($item->main_picture->alt) &&
                    file_exists(public_path('uploads/main_picture/images/properties/' . $item->main_picture->alt)))
                <?php
                $imagePath = asset('uploads/main_picture/images/properties/' . $item->main_picture->alt);
                [$width, $height] = getimagesize(public_path('uploads/main_picture/images/properties/' . $item->main_picture->alt));

                $style = $width < 410 && $height < 292 ? 'width: 410px; height: 292px;' : '';
                ?>
                <img src="{{ $imagePath }}" alt="{{ $item->title }}" class="property-card-img" style="{{ $style }}">
            @else
                <img src="{{ asset('assets/img/product/01.jpg') }}" alt="{{ $item->title }}" class="property-card-img">
            @endif
        </a>
        <div class="property-price {{ ($item->price == 0 || $item->price == 1) ? 'price-on-demand' : '' }}">
            @if ($item->price == 0 || $item->price == 1)
                Prix sur demande
            @elseif ($item->operation->name !== 'location')
                {{ $item->price }} DT
            @else
                {{ $item->price }} DT / Mois
            @endif
        </div>
    </div>
    <div class="property-content">
        <div class="property-header" style="display: flex; align-items: center; gap: 10px;">
            <!-- Removed announcer name -->
        </div>
        <div class="property-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $item->city->name }}, {{ substr($item->area->name, 0, 35) }}</span>
        </div>
        @if ($item->situation)
            <div class="property-feature">
                @if ($item->situation->slug === 'zone-urbaine')
                    <i class="fas fa-building"></i>
                @elseif($item->situation->slug === 'zone-industriel')
                    <i class="fas fa-industry"></i>
                @else
                    <i class="fas fa-tree"></i>
                @endif
                <span>{{ $item->situation->name }}</span>
            </div>
        @endif
        <div class="property-features">
            <div class="property-feature">
                <i class="fas fa-ruler-combined"></i>
                <span>{{ $item->floor_area ?? $item->surfacetotal }} (m²)</span>
            </div>
            <div class="property-feature">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ $item->created_at }}</span>
            </div>
        </div>
        <div class="property-footer" style="display: flex; align-items: center; justify-content: space-between;">
            <span class="property-badge badge-ref">{{ strtoupper($item->ref) }}</span>
            <div style="display: flex; align-items: center; gap: 10px;">
                <button onclick="shareProperty(this.closest('.property-card'))" class="share-button" title="Partager sur Facebook">
                    <i class="fas fa-share-alt"></i>
                </button>
                <a href="{{ route('prop_info_by_id', $item->id) }}" class="property-btn">Voir Détails <i class="fas fa-arrow-right"></i></a>
            </div>
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
        --color-success-dark: #059669;
        --color-warning-dark: #d97706;
        --color-main-hover: #ebb359;
    }

/* Property Card Container */
.property-card {
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: 8px;
    box-shadow: 0 2px 8px var(--color-shadow);
    margin-bottom: 32px;
}

.property-card:hover {
    box-shadow: 0 8px 25px var(--color-shadow);
    border-color: var(--color-main);
}

/* Property Image Section */
.property-image-container {
    position: relative;
    overflow: visible;
    height: 240px;
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 18px;
}

.property-card-img {
    box-shadow: 0 8px 24px var(--color-shadow-strong), 0 1.5px 6px var(--color-shadow-light);
    background: var(--color-white);
    width: 98%;
    height: 98%;
    object-fit: cover;
    transition: transform 0.3s ease;
    display: block;
    margin-top: 2px;
    border-radius: 12px;
}

/* Property Badges */
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
    background: var(--color-main);
    color: var(--color-white);
    position: static;
    margin-left: 10px;
    display: inline-block;
    vertical-align: middle;
}

.badge-sale {
    top: 16px;
    right: 40px;
    background: linear-gradient(135deg, var(--color-sale), var(--color-success-dark), var(--color-sale), var(--color-success-dark));
    color: var(--color-white);
}

.badge-rent {
    top: 16px;
    right: 40px;
    background: linear-gradient(135deg, var(--color-rent), var(--color-warning-dark), var(--color-rent), var(--color-warning-dark));
    color: var(--color-white);
}

/* Property Price */
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
    box-shadow: 0 2px 8px var(--color-shadow);
}

.price-on-demand {
    background: var(--color-on-demand) !important;
    color: var(--color-white) !important;
    font-weight: bold;
}

/* Property Content */
.property-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* Property Header */
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

/* Property Location */
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

/* Property Features */
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

/* Property Footer */
.property-footer {
    border-top: 1px solid var(--color-border);
    padding-top: 16px;
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Share Button */
.share-button {
    padding: 6px 10px;
    border: 1px solid var(--color-border);
    background: var(--color-white);
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s;
    color: var(--color-text-light);
    font-size: 12px;
}

.share-button:hover {
    background-color: #f3f4f6;
    color: var(--color-main);
    border-color: var(--color-main);
}

.share-button i {
    font-size: 12px;
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
}

.property-btn:hover {
    background-color: var(--color-btn-hover);
    color: var(--color-white);
}

.property-btn i {
    margin-left: 8px;
    font-size: 10px;
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
        padding: 6px;
    }
    .container {
        grid-template-columns: 1fr;
        gap: 10px;
        padding: 0 4px;
    }
    .property-content {
        padding: 8px;
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
    // const url = window.location.origin + '/propertie_by_id/' + {{ $item->id }};
    const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
    window.open(shareUrl, '_blank', 'width=600,height=400');
}

// Enhanced sharing function for mobile devices
function shareProperty(propertyCard) {
    const title = propertyCard.dataset.propertyTitle || 'Propriété immobilière';
    const image = propertyCard.dataset.propertyImage || '';
    const url = propertyCard.dataset.propertyUrl || '';
    const description = propertyCard.dataset.propertyDescription || 'Découvrez cette propriété exceptionnelle';
    
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
