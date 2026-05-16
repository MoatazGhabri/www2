<title>{{ $property[0]->title }} - IAF</title>

<meta name="description" content="{{ $property[0]->title }} - Découvrez ce bien avec IAF, Agence Immobilière Agrebi Frères. Vente, achat et location de terrains agricoles en Tunisie.">

<meta name="keywords" content="{{ $property[0]->title }}, immobilier Tunisie, terrains agricoles, agence immobilière Sfax, achat terrain agricole, vente terrain agricole, location terrain agricole, IAF">

<!-- Open Graph / Facebook -->
<meta property="og:site_name" content="IAF - Agence Immobilière Agrebi Frères">
<meta property="og:title" content="{{ $property[0]->title }} - IAF">
<meta property="og:description" content="Découvrez ce bien immobilier avec IAF - Agence Immobilière Agrebi Frères, spécialiste des terrains agricoles en Tunisie.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/iaf.png') }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $property[0]->title }} - IAF">
<meta name="twitter:description" content="Découvrez ce bien immobilier avec IAF - Agence Immobilière Agrebi Frères en Tunisie.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/iaf.png') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ Request::url() }}">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ url('assets/img/logo/iaf.png') }}">
