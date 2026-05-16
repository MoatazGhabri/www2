<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    
    @foreach($properties as $property)
    <url>
        <loc>{{ url('/propertie_by_id/' . $property->id) }}</loc>
        <lastmod>{{ $property->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        @if($property->main_picture)
        <image:image>
            <image:loc>{{ asset('uploads/property_photo/' . $property->main_picture) }}</image:loc>
            <image:title>{{ $property->title }} - {{ $property->city->name ?? 'Tunisie' }}</image:title>
            <image:caption>{{ $property->title }} en {{ $property->city->name ?? 'Tunisie' }} - Mon Réseau Immobilier</image:caption>
        </image:image>
        @endif
    </url>
    @endforeach
    
</urlset>
