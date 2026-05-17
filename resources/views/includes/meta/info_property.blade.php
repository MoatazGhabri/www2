<title>{{ $property[0]->title }} - Luxiflore</title>

<meta name="description" content="{{ $property[0]->title }} - Découvrez ce produit avec Luxiflore à Bizerte. Décoration d'intérieur, bacs à fleurs et cache-pots.">

<meta name="keywords" content="{{ $property[0]->title }}, Luxiflore, décoration intérieur, Bizerte, bac à fleurs">

<meta property="og:site_name" content="Luxiflore">
<meta property="og:title" content="{{ $property[0]->title }} - Luxiflore">
<meta property="og:description" content="Découvrez ce produit avec Luxiflore - Décoration d'intérieur à Bizerte.">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/lf.png') }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $property[0]->title }} - Luxiflore">
<meta name="twitter:description" content="Découvrez ce produit avec Luxiflore à Bizerte.">
<meta name="twitter:image" content="{{ isset($property[0]->filename) ? $property[0]->filename : url('assets/img/logo/lf.png') }}">

<link rel="canonical" href="{{ Request::url() }}">

<link rel="icon" type="image/png" href="{{ url('assets/img/logo/lf.png') }}">
