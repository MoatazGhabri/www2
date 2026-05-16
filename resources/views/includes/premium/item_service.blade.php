{{-- {{ dd(!empty($item->classified->mainPicture->picture_path)) }} --}}
<div class="property-card">
    <div class="property-image-container">
        <span class="property-badge badge-sale">{{ ucfirst($item->service->category->name) }}</span>
        <a href="{{ route('service_info_front', $item->service->slug) }}">
            @if (!empty($item->service->mainPicture->picture_path) &&
                    file_exists(public_path('uploads/service/main_picture/' . $item->service->mainPicture->picture_path)))
                <?php
                $imagePath = asset('uploads/service/main_picture/' . $item->service->mainPicture->picture_path);
                [$width, $height] = getimagesize(public_path('uploads/service/main_picture/' . $item->service->mainPicture->picture_path));
                $style = $width < 410 && $height < 292 ? 'width: 410px; height: 292px;' : '';
                ?>
                <img src="{{ $imagePath }}" alt="{{ ucfirst($item->service->title) }}" class="property-card-img" style="{{ $style }}">
            @else
                <img src="{{ asset('assets/img/product/01.jpg') }}" alt="{{ ucfirst($item->service->title) }}" class="property-card-img">
            @endif
        </a>
    </div>
    <div class="property-content">
        <div class="property-header" style="display: flex; align-items: center; gap: 10px;">
            <div class="property-title">
                <a href="#">{{ ucfirst($item->service->title) }}</a>
            </div>
        </div>
        <div class="property-location">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ $item->service->city->name ?? '' }}, {{ $item->service->area->name ?? '' }}</span>
        </div>
        <div class="property-features">
            <div class="property-feature">
                <i class="fas fa-tag"></i>
                <span>{{ $item->service->category->name }}</span>
            </div>
            <div class="property-feature">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ $item->service->created_at->format('d/m/y') }}</span>
            </div>
        </div>
        <div class="property-footer">
            <span class="property-badge badge-ref">{{ strtoupper($item->service->ref) }}</span>
            <a href="{{ route('service_info_front', $item->service->slug) }}" class="property-btn">
                Voir Détails <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- </div> --}}
