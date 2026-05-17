<title>{{ $title }} - Luxiflore</title>

<meta name="description" content="Découvrez {{ $title }} avec Luxiflore. Décoration d'intérieur, bacs à fleurs et cache-pots à Bizerte.">

<meta name="keywords" content="{{ $title }}, Luxiflore, décoration intérieur, Bizerte">

<link href="{{ Request::url() }}" rel="canonical" />

<meta property="og:site_name" content="Luxiflore">
<meta property="og:title" content="{{ $title }} - Luxiflore">
<meta property="og:description" content="Découvrez {{ $title }} avec Luxiflore à Bizerte.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/lf.png') }}">
