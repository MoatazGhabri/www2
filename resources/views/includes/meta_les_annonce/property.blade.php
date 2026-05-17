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
