<div class="property-card">
    <div class="property-image-container">
        <span class="property-badge {{ $item->operation->name === 'location' ? 'badge-rent' : 'badge-sale' }}">
            {{ ucfirst($item->category->name) }} {{ $item->operation->title }}
        </span>
        <a href="{{ route('prop_info_promoteur', $item->slug) }}">
            @if ($item->getFirstImageOrDefault())
                <img src="{{ asset('uploads/promoteur_property/' . $item->getFirstImageOrDefault()) }}" 
                     alt="{{ $item->title }}" 
                     class="property-card-img">
            @else
                <img src="{{ asset('assets/img/product/01.jpg') }}" 
                     alt="{{ $item->title }}" 
                     class="property-card-img">
            @endif
        </a>
        <div class="property-price {{ ($item->price_total == 0 || $item->price_total == 1) ? 'price-on-demand' : '' }}">
            @if ($item->price_total == 0 || $item->price_total == 1)
                Prix sur demande
            @else
                {{ $item->price_total }} DT
            @endif
        </div>
    </div>
    <div class="property-content">
        <div class="property-header">
            <div class="property-title">
                <a href="#">
                    {{ ucfirst($item->user->promoteur->first_name . ' ' . $item->user->promoteur->last_name) }}
                </a>
            </div>
        </div>
        <div class="property-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $item->city->name }}, {{ $item->area->name }}</span>
        </div>
        <div class="property-features">
            @if ($item->surface_totale != 0)
                <div class="property-feature">
                    <i class="fas fa-ruler-combined"></i>
                    <span>{{ $item->surface_totale }} (m²)</span>
                </div>
            @endif
            <div class="property-feature">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ $item->created_at }}</span>
            </div>
        </div>
        <div class="property-footer">
            <span class="property-badge badge-ref">{{ strtoupper($item->ref) }}</span>
            <a href="{{ route('prop_info_promoteur', $item->slug) }}" class="property-btn">Voir Détails <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<style>
        :root {
        --color-main: #fc7b0b;
        --color-sale: #10b981;         
        --color-rent: #f59e0b;        
        --color-border: #e5e7eb;       
        --color-bg: #ffffff;           
        --color-shadow: rgba(0, 0, 0, 0.1);
        --color-shadow-strong: rgba(0,0,0,0.18);
        --color-shadow-light: rgba(0,0,0,0.12);
        --color-text: #111827;
        --color-text-light: #6b7280;
        --color-btn-hover: #013064;
        --color-price-bg: rgba(246, 59, 72, 0.95);
        --color-on-demand: #f59e0b;
        --color-white: #fff;
        --color-success-dark: #059669;
        --color-warning-dark: #d97706;
        --color-main-hover: #013064;
    }

/* Property Card Container */
.property-card {
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: 1pc;
    box-shadow: 0 2px 8px var(--color-shadow);
    margin-bottom: 32px;
    width: 100%;
    max-width: 350px;
    margin-left: auto;
    margin-right: auto;
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
    border-radius: 2pc;
}

/* Property Badges */
.property-badge {
    position: absolute;
    padding: 4px 12px;
    border-radius: 20px;
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
    background: linear-gradient(135deg, var(--color-sale), var(--color-success-dark));
    color: var(--color-white);
}

.badge-rent {
    top: 16px;
    right: 40px;
    background: linear-gradient(135deg, var(--color-rent), var(--color-warning-dark));
    color: var(--color-white);
}

/* Property Price */
.property-price {
    position: absolute;
    left: 40px;
    bottom: 16px;
    background: var(--color-price-bg);
    color: var(--color-white);
    font-size: 10px;
    padding: 8px 16px;
    border-radius: 8pc;
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

.property-btn {
    background-color: var(--color-main);
    color: var(--color-white);
    display: inline-block;
    vertical-align: middle;
    padding: 4px 12px;
    border-radius: 20px;
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
    .property-card {
        max-width: 320px;
    }
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
    .property-card {
        max-width: 100%;
    }
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