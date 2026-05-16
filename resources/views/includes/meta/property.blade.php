<title>{{ $title }} - Immobilier en Tunisie | IAF</title>

<meta name="description" content="Découvrez {{ $title }} avec IAF - Agence Immobilière Agrebi Frères. Vente, achat et location de terrains agricoles. Consultez nos annonces avec photos, prix et localisation.">

<meta name="keywords" content="{{ $title }} Tunisie, immobilier {{ $title }} Tunisie, {{ $title }} à vendre Tunisie, {{ $title }} à louer Tunisie, terrain agricole {{ $title }} Tunisie, agence immobilière Sfax, IAF {{ $title }}">

<!-- Canonical URL -->
<link href="{{ Request::url() }}" rel="canonical" />

<!-- Open Graph / Facebook -->
<meta property="og:site_name" content="IAF - Agence Immobilière Agrebi Frères">
<meta property="og:title" content="{{ $title }} - IAF">
<meta property="og:description" content="Découvrez {{ $title }} avec IAF. Vente, achat et location de terrains agricoles avec photos, prix et localisation détaillés.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/iaf.png') }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }} - IAF">
<meta name="twitter:description" content="Découvrez {{ $title }} avec IAF - Agence Immobilière Agrebi Frères. Terrains agricoles avec photos, prix et localisation.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/iaf.png') }}">

<!-- Property Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "RealEstateListing",
    "name": "IAF - Agence Immobilière Agrebi Frères",
    "description": "Agence spécialisée en intermédiation immobilière : vente, achat et location de terrains agricoles en Tunisie.",
    "url": "https://www.iaf-immo.tn/",
    "logo": "{{ asset('assets/img/logo/iaf.png') }}",
    "image": "{{ asset('assets/img/logo/iaf.png') }}",
    "streetAddress": "Sfax",
    "addressLocality": "Sfax",
    "telephone": "+216-94303262",
    "sameAs": [
        "https://www.facebook.com/share/1CVwX3rUev/"
    ]
}
</script>



