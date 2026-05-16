<title>{{ $property[0]->title }} - Côte Magique</title>

<meta name="description" content="{{ $property[0]->title }} - Découvrez ce bien immobilier exceptionnel avec Côte Magique, votre partenaire immobilier de confiance en Tunisie. Appartements, villas, maisons, terrains, bureaux et commerces.">

<meta name="keywords" content="{{ $property[0]->title }}, immobilier Tunisie, agence immobilière Tunisie, achat appartement Tunisie, vente maison Tunisie, location appartement Tunisie, terrain à vendre Tunisie, Côte Magique">

<!-- Open Graph / Facebook -->
<meta property="og:site_name" content="Côte Magique">
<meta property="og:title" content="{{ $property[0]->title }} - Côte Magique">
<meta property="og:description" content="Découvrez ce bien immobilier exceptionnel avec Côte Magique, votre partenaire immobilier de confiance en Tunisie.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/magic.png') }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $property[0]->title }} - Côte Magique">
<meta name="twitter:description" content="Découvrez ce bien immobilier exceptionnel avec Côte Magique, votre partenaire immobilier de confiance en Tunisie.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/magic.png') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ Request::url() }}">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ url('assets/img/logo/magic.png') }}">