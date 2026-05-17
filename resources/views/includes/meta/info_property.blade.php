<title>{{ $property[0]->title }} - RM Immobilier</title>

<meta name="description" content="{{ $property[0]->title }} - Découvrez ce bien avec RM Immobilier à Nabeul. Terrains lotis, maisons et logements.">

<meta name="keywords" content="{{ $property[0]->title }}, immobilier Nabeul, terrains lotis, RM Immobilier, maison, logement">

<meta property="og:site_name" content="RM Immobilier">
<meta property="og:title" content="{{ $property[0]->title }} - RM Immobilier">
<meta property="og:description" content="Découvrez ce bien immobilier avec RM Immobilier à Nabeul.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/rm.png') }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $property[0]->title }} - RM Immobilier">
<meta name="twitter:description" content="Découvrez ce bien immobilier avec RM Immobilier à Nabeul.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/rm.png') }}">

<link rel="canonical" href="{{ Request::url() }}">

<link rel="icon" type="image/png" href="{{ url('assets/img/logo/rm.png') }}">
