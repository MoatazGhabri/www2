<title>{{ $title }} - Immobilier en Tunisie | RM Immobilier</title>

<meta name="description" content="Découvrez {{ $title }} avec RM Immobilier. Terrains lotis, maisons et logements à Nabeul. Consultez nos annonces avec photos, prix et localisation.">

<meta name="keywords" content="{{ $title }} Tunisie, immobilier {{ $title }} Nabeul, {{ $title }} à vendre, terrain loti, agence immobilière Nabeul, RM Immobilier {{ $title }}">

<link href="{{ Request::url() }}" rel="canonical" />

<meta property="og:site_name" content="RM Immobilier">
<meta property="og:title" content="{{ $title }} - RM Immobilier">
<meta property="og:description" content="Découvrez {{ $title }} avec RM Immobilier. Terrains lotis et logements avec photos, prix et localisation.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/rm.png') }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }} - RM Immobilier">
<meta name="twitter:description" content="Découvrez {{ $title }} avec RM Immobilier à Nabeul.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/rm.png') }}">

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "RealEstateListing",
    "name": "RM Immobilier",
    "description": "Vente de terrains lotis et viabilisés, maisons et logements, intermédiation immobilière sans frais à Nabeul.",
    "url": "https://www.rm-immobilier.tn/",
    "logo": "{{ asset('assets/img/logo/rm.png') }}",
    "image": "{{ asset('assets/img/logo/rm.png') }}",
    "streetAddress": "Rue Abdallah Farhat Dar Chabene 8075 Nabeul",
    "addressLocality": "Nabeul",
    "telephone": "+216-27040938",
    "sameAs": [
        "https://www.facebook.com/share/17XC9aMJzY/"
    ]
}
</script>
