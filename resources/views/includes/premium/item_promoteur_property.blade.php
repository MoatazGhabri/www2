<div class="property-card">
    <div class="property-image-container">
        <span class="property-badge {{ $item->propertypromoteur->operation->name === 'location' ? 'badge-rent' : 'badge-sale' }}">
            {{ ucfirst($item->propertypromoteur->category->name) }} {{ $item->propertypromoteur->operation->title }}
        </span>
        <a href="{{ route('prop_info_promoteur', $item->propertypromoteur->slug) }}">
            @if ($item->propertypromoteur->getFirstImageOrDefault())
                <img src="{{ asset('uploads/promoteur_property/' . $item->propertypromoteur->getFirstImageOrDefault()) }}" alt="{{ $item->propertypromoteur->title }}" class="property-card-img">
            @else
                <img src="{{ asset('assets/img/product/01.jpg') }}" alt="{{ $item->propertypromoteur->title }}" class="property-card-img">
            @endif
        </a>
        <div class="property-price">
            {{ $item->propertypromoteur->price_total }} DT
        </div>
    </div>
    <div class="property-content">
        <div class="property-header" style="display: flex; align-items: center; gap: 10px;">
            <div class="property-title">
                <a href="#">{{ ucfirst($item->propertypromoteur->user->promoteur->first_name . ' ' . $item->propertypromoteur->user->promoteur->last_name) }}</a>
            </div>
        </div>
        <div class="property-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $item->propertypromoteur->city->name }}, {{ $item->propertypromoteur->area->name }}</span>
        </div>
        <div class="property-features">
            <div class="property-feature">
                <i class="fas fa-ruler-combined"></i>
                <span>{{ $item->propertypromoteur->surface_totale }} (m²)</span>
            </div>
            <div class="property-feature">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ $item->propertypromoteur->created_at }}</span>
            </div>
        </div>
        <div class="property-footer" style="display: flex; align-items: center; gap: 10px;">
            <span class="property-badge badge-ref">{{ strtoupper($item->propertypromoteur->ref) }}</span>
            <a href="{{ route('prop_info_promoteur', $item->propertypromoteur->slug) }}" class="property-btn">
                Voir Détails <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>


