<title>{{ $title }} - Immobilier en Tunisie | Côte Magique</title>

<meta name="description" content="Découvrez {{ $title }} avec Côte Magique. Votre futur bien immobilier vous attend. Consultez nos annonces détaillées avec photos, prix et localisation. Trouvez votre {{ $title }} idéal.">

<meta name="keywords" content="{{ $title }} Tunisie, immobilier {{ $title }} Tunisie, {{ $title }} à vendre Tunisie, {{ $title }} à louer Tunisie, bien immobilier {{ $title }} Tunisie, agence immobilière {{ $title }} Tunisie, Côte Magique {{ $title }}">

<!-- Canonical URL -->
<link href="{{ Request::url() }}" rel="canonical" />

<!-- Open Graph / Facebook -->
<meta property="og:site_name" content="Côte Magique">
<meta property="og:title" content="{{ $title }} - Côte Magique">
<meta property="og:description" content="Découvrez {{ $title }} avec Côte Magique. Votre futur bien immobilier vous attend avec photos, prix et localisation détaillés.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/magic.png') }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }} - Côte Magique">
<meta name="twitter:description" content="Découvrez {{ $title }} avec Côte Magique. Votre futur bien immobilier vous attend avec photos, prix et localisation détaillés.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/magic.png') }}">

<!-- Property Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "RealEstateListing",
    "name": "Côte Magique",
    "description": "Chez nous, chaque projet immobilier est avant tout une histoire humaine. Nous prenons le temps de comprendre vos besoins pour vous proposer des solutions adaptées.",
    "url": "https://www.cotemagic.tn/",
    "logo": "{{ asset('assets/img/logo/magic.png') }}",
    "image": "{{ asset('assets/img/logo/magic.png') }}",
    "streetAddress": "Tunisie",
    "addressLocality": "Tunis",
    "telephone": "+216-52996359",
    "sameAs": [
        "https://www.facebook.com/share/14YuMzBhCeM/"
    ]
}
</script>




