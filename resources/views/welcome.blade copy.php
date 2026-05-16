<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Agence Immobilière immo'in a vôtre écoute. Trouvez le logement idéal — Agence immo'in vous accompagne pour concrétiser vos ventes et vos achats dans l'Immobilier. Trouvez dès à présent votre Bien avec notre Agence Immobiliere immo'in.">


    <meta name="keywords" content="agence immobilière Carthage, Agence le baroque, vente immobilier Carthage, location immobilier Carthage, achat immobilier Carthage, Tunisie immobilier, terrains, fond de commerce, appartements">
<link href="https://baroque-immo.tn/" rel="canonical" />    
<meta property="og:url" content="https://baroque-immo.tn" />
    <title>Agence Immobilière immo'in | Votre partenaire immobilier de confiance</title>



<meta property="og:title" content="Agence Immobilière immo'in - Votre partenaire immobilier de confiance" />

<meta property="og:description" content="Agence Immobilière immo'in a vôtre écoute. Trouvez le logement idéal — Agence immo'in vous accompagne pour concrétiser vos ventes et vos achats dans l'Immobilier." />
    
<meta property="og:site_name" content="Agence Immobilière immo'in" />
<meta property="og:type" content="website">
 <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/in.png') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "pub-8182502623916154",
        enable_page_level_ads: true
      });
    </script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-WWLJCKV3WL">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WWLJCKV3WL');
</script>
    @stack('stylesheets')

</head>
<style>
    @media only screen and (max-width: 600px) {
        .hero-background {
            background-size: contain !important;
            margin-top: -320px !important;
        }

        .owl-nav {
            display: none;
        }

        .search-area {
            margin-top: -400px;
        }
        .search-area {
            margin-top: 20px !important;
        }
        .search-positioner {
            position: static !important;
            transform: none !important;
            margin-top: 20px !important;
        }
        .hero-container {
            height: auto !important;
            min-height: unset !important;
            overflow: visible !important;
            margin-top: 80px !important;
        }
        .hero-section {
            margin-top: 80px !important;
        }
    }
    .hero-container, .hero-section {
        margin-top: 100px;
    }
    /* Hero Image Section */
    .hero-container {
        position: relative;
        width: 100%;
        height: 150vh;
        overflow: hidden;
        margin-top: 100px; /* Added padding between header and search area */
    }
    
    .hero-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('assets/img/header/head.png') }}'); /* Use a default image */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat; /* Prevent background image repetition */
        z-index: 1;
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: 2;
    }
    
    /* Search Area Between Slider and Content */
    .search-area-between {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 40px 0;
        margin: 0;
        position: relative;
        z-index: 10;
    }
    
    .search-area-between .search-form-container {
        background-color: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .search-area-between .trending-keywords {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.75rem;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 1rem;
        border-radius: 8px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }
    
    /* Search Form Styles */
    .search-form-container {
        background-color: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        margin-bottom: 1.5rem;
    }
    
    .search-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr) 60px;
        gap: 1rem;
        align-items: center;
    }
    
    .form-group {
        position: relative;
        margin-bottom: 0;
        height: 100%;
    }
    
    .select-wrapper, .input-with-icon {
        position: relative;
        height: 100%;
    }
    
    .modern-select, .modern-input {
        width: 100%;
        height: 48px;
        padding: 0.75rem 1rem;
        padding-right: 2.5rem;
        border: 1px solid #e0e3e7;
        border-radius: 8px;
        background-color: white;
        appearance: none;
        font-size: 0.9rem;
        color: #0064fd;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .modern-select:focus, .modern-input:focus {
        outline: none;
        border-color: #0064fd;
        box-shadow: 0 0 0 2px rgba(133, 81, 49, 0.2);
    }
    
    .select-wrapper i, .input-with-icon i {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #0064fd;
        pointer-events: none;
    }
    
    .search-icon-btn {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
    
    .modern-search-btn {
        width: 48px;
        height: 48px;
        padding: 0;
        background-color: #0064fd;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .modern-search-btn:hover {
        background-color: #0064fd;
        transform: translateY(-1px);
    }
    
    .modern-search-btn i {
        font-size: 1rem;
        margin: 0;
    }
    
    .error-message {
        display: none;
        color: #dc3545;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        position: absolute;
        bottom: -18px;
        left: 0;
    }
    
    .trending-keywords {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.75rem;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 1rem;
        border-radius: 8px;
    }
    
    .keywords-label {
        font-size: 0.9rem;
        color: #0064fd;
        font-weight: 500;
    }
    
    .keywords-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .keyword-tag {
        padding: 0.35rem 0.75rem;
        background-color: white;
        border-radius: 20px;
        font-size: 0.8rem;
        color: #0064fd;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid #e0e3e7;
    }
    
    .keyword-tag:hover {
        background-color: #0064fd;
        color: white;
        border-color: #0064fd;
    }
    
    /* Content Section */
    .content-section {
        padding: 4rem 0;
        background-color: white;
    }
    
    /* Responsive Styles */
    @media (max-width: 1200px) {
        .search-grid {
            grid-template-columns: repeat(3, 1fr) 60px;
        }
        
        .hero-container {
            height: 70vh;
            min-height: 500px;
        }
    }
    
    @media (max-width: 992px) {
        .search-grid {
            grid-template-columns: repeat(2, 1fr) 60px;
        }
        
        .hero-container {
            height: 65vh;
        }
        
        .search-positioner {
            top: 55%;
        }
    }
    
    @media (max-width: 768px) {
        .search-grid {
            grid-template-columns: 1fr 60px;
            gap: 0.75rem;
        }
        
        .hero-container {
            height: 60vh;
            min-height: 450px;
            margin-top: 70px; /* Adjusted for mobile */
        }
        
        .search-form-container {
            padding: 1rem;
        }
        
        .modern-select, .modern-input {
            height: 42px;
            font-size: 0.85rem;
        }
        
        .modern-search-btn {
            width: 42px;
            height: 42px;
        }
    }
    
    @media (max-width: 576px) {
        .hero-container {
            height: 70vh;
            min-height: 500px;
            margin-top: 60px; /* More padding for small mobile */
        }
        
        .search-positioner {
            top: 50%;
            padding: 0 15px;
        }
        
        .trending-keywords {
            flex-direction: column;
            align-items: flex-start;
            padding: 0.75rem;
        }
        
        .keywords-container {
            width: 100%;
        }
        
        .keyword-tag {
            flex-grow: 1;
            text-align: center;
        }
    }
    
    @media (max-width: 480px) {
        .search-grid {
            grid-template-columns: 1fr;
        }
        
        .search-icon-btn {
            justify-content: center;
        }
        
        .modern-search-btn {
            width: 100%;
            height: 42px;
        }
        
        .hero-container {
            height: 80vh;
            margin-top: 60px; /* Final adjustment for very small screens */
        }
        
        .header {
            padding: 0.5rem 0; /* Reduce header height on mobile */
        }
    }

.site-heading {
    position: relative;
    padding: 3rem 0;
    margin-bottom: 4rem;
}

.site-title-tagline {
    display: inline-block;
        background: linear-gradient(135deg, #0064fd 0%, #0052cc 100%);
    color: white;
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
        box-shadow: 0 8px 25px rgba(48, 179, 75, 0.3);
    position: relative;
    overflow: hidden;
}

.site-title-tagline::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.site-title-tagline:hover::before {
    left: 100%;
}

.site-title {
    font-size: 3.5rem;
    font-weight: 800;
        background: linear-gradient(135deg, #0064fd 0%, #0052cc 50%, #0064fd 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    text-shadow: 0 4px 8px rgba(0,0,0,0.1);
    position: relative;
}

.site-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
        background: linear-gradient(90deg, #0064fd, #0052cc);
    border-radius: 2px;
}

.site-heading p {
    font-size: 1.2rem;
    color: #101010;
    font-weight: 400;
    line-height: 1.6;
    margin-top: 1rem;
    opacity: 0.9;
}

/* Modern Design for "Voir tous" Buttons */
.modern-view-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
        background: linear-gradient(135deg, #0064fd 0%, #0052cc 50%, #0064fd 100%);
    color: white;
    padding: 10px 28px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
        box-shadow: 0 8px 25px rgba(48, 179, 75, 0.18);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: none;
    cursor: pointer;
}

.modern-view-all-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.modern-view-all-btn:hover {
    transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(48, 179, 75, 0.22);
    color: white;
    text-decoration: none;
}

.modern-view-all-btn:hover::before {
    left: 100%;
}

.modern-view-all-btn i {
    transition: transform 0.3s ease;
}

.modern-view-all-btn:hover i {
    transform: translateX(5px);
}

/* Animation for the entire section */
.site-heading {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .site-title {
        font-size: 2.5rem;
    }
    
    .site-title-tagline {
        font-size: 12px;
        padding: 10px 20px;
    }
    
    .site-heading p {
        font-size: 1rem;
    }
    
    .modern-view-all-btn {
        padding: 9px 20px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .site-title {
        font-size: 2rem;
    }
    
    .site-title-tagline {
        font-size: 11px;
        padding: 8px 16px;
    }
    
    .modern-view-all-btn {
        padding: 8px 14px;
        font-size: 13px;
    }
}
/* Add new styles for outline buttons and the Lien utiles title */
.outline-view-all-btn {
    display: block;
    width: 100%;
    max-width: 400px;
    margin: 0 auto 1.2rem auto;
    padding: 10px 0;
    border: 2px solid #0064fd;
    background: #fff;
    color: #0064fd;
    font-size: 1.3rem;
    font-weight: bold;
    border-radius: 12px;
    text-align: center;
    text-transform: uppercase;
    transition: background 0.2s, color 0.2s;
    box-shadow: 0 2px 8px rgba(48, 179, 75, 0.08);
    letter-spacing: 1px;
    cursor: pointer;
    text-decoration: none;
}
.outline-view-all-btn:hover {
    background: #0064fd;
    color: #fff;
}
/* Static style for VOIR NOS LIENS UTILES label */
.static-outline-label {
    display: block;
    width: 100%;
    max-width: 400px;
    margin: 0 auto 1.2rem auto;
    padding: 10px 0;
    border: 2px solid #0064fd;
    background: #fff;
    color: #0064fd;
    font-size: 1.3rem;
    font-weight: bold;
    border-radius: 12px;
    text-align: center;
    text-transform: uppercase;
    box-shadow: 0 2px 8px rgba(48, 179, 75, 0.08);
    letter-spacing: 1px;
    cursor: default;
    text-decoration: none;
    pointer-events: none;
}
.lien-utiles-title {
    color: #0064fd;
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 2rem;
}
/* ServiceWeb cards: fixed height and width, aligned content */
.service-item {
    display: flex;
    flex-direction: column;
    height: 500px; /* Fixed height */
    width: 350px;  /* Fixed width */
    max-width: 100%;
    margin: 0 auto;
    border-radius: 20px;
}
.service-item .card-body {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 100%;
    padding: 2rem;
}
.service-icon {
    height: 180px;
    width: 320px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #eee;
}
.service-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.service-item h4 {
    min-height: 48px;
    text-align: center;
    margin-bottom: 0.5rem;
    margin-top: 0.5rem;
}
.service-item p {
    flex: 1 1 auto;
    min-height: 40px;
    max-height: 80px;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 1.5rem;
    text-align: center;
}
@media (max-width: 991px) {
    .service-item {
        height: 420px;
        width: 100%;
    }
}
</style>

<body class="home-4">
<!-- <div class="preloader">
        <div class="loader">
            <div class="loader-dot"></div>
            <div class="loader-dot dot2"></div>
            <div class="loader-dot dot3"></div>
            <div class="loader-dot dot4"></div>
            <div class="loader-dot dot5"></div>
        </div>
    </div> -->


    <header class="header" id="mainHeader">
        @include('includes.header')
    </header>

    <main class="main" style="padding-top: 30px;">
        <div class="hero-container">
        @include('includes.slider')
        </div>
        <!-- search area -->
        <div class="search-area-between">
            <div class="search-form-container">
                <form id="searchForm" method="GET" action="#">
                    <div class="search-grid">
                        <!-- Category Select -->
                        <div class="form-group">
                            <div class="select-wrapper">
                                <select class="modern-select" name="category_id">
                                    <option value="" disabled selected>Catégorie</option>
                                    @foreach ($categories as $value)
                                    <option value="{{ $value->name }}">
                                        {{ ucfirst($value->name) }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <small class="error-message" id="category_error">Veuillez sélectionner une catégorie</small>
                        </div>
                        
                        <!-- Operation Select -->
                        <div class="form-group">
                            <div class="select-wrapper">
                                <select class="modern-select" name="operation_id">
                                    <option value="" disabled selected>Opération</option>
                                    @foreach ($operation as $value)
                                    <option value="{{ $value->name }}">
                                        {{ ucfirst($value->name) }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <small class="error-message" id="operation_error">Veuillez sélectionner une opération de propriété</small>
                        </div>
                        
                        <!-- Reference Input -->
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="text" class="modern-input" placeholder="Référence" name="reference">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        
                        <!-- City Select -->
                        <div class="form-group">
                            <div class="select-wrapper">
                                <select class="modern-select" name="city_id" id="citySelect">
                                    <option value="">Ville</option>
                                    @foreach ($cities as $value)
                                    <option value="{{ $value->id }}" {{ old('city_id') == $value->id ? 'selected' : '' }}>
                                        {{ ucfirst($value->name) }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        
                        <!-- Area Select -->
                        <div class="form-group" id="area_div">
                            <div class="select-wrapper">
                                <select class="modern-select" name="area_id" id="areaSelect">
                                    <option value="">Région</option>
                                </select>
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="form-group search-icon-btn">
                            <button type="submit" class="modern-search-btn" aria-label="Search">
                                <i class="fas fa-search"></i>
                                <span class="search-text">Chercher</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="trending-keywords">
                <span class="keywords-label">Mots-clés tendance:</span>
                <div class="keywords-container">
                    <a href="{{ url('/cherche/-vente') }}" class="keyword-tag">A Vendre</a>
                    <a href="{{ url('/cherche/-location') }}" class="keyword-tag">A Louer</a>
                </div>
            </div>
        </div>
        <!-- search area end -->






        {{-- end_promoteur --}}
        <!-- product area --> 
        <div class="product-area" style="
                    padding-bottom: 10px !important;
                ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">ANNONCES VEDETTES</span>
                            <h1 class="site-title">Explorez nos annonces vedettes</h1>
                            <p>Prêt pour votre vision. Investissez dans votre avenir.</p>
                        </div>
                    </div>
                </div>
                @if (count($properties) > 0)
                <div class="row">

                    @foreach ($properties as $item)
                    {{-- {{ dd($item) }} --}}
                    @if (!$item->property) @continue @endif
                    {{-- {{ dd($item->property->main_picture->alt) }} --}}
                    <div class="col-md-6 col-lg-4">
                        {{-- @if ($item->type__ == 'property') --}}
                        @include('includes.premium.item_property')

                        {{-- @endif --}}
                    </div>
                    @endforeach


                </div>
                <div class="row justify-content-center mt-6">
                    <div class="col-md-12 text-center">
                        <a href="/cherche/" class="outline-view-all-btn">VOIR TOUTES LES OFFRES <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endif
                {{-- ----------------------- premium ------------------ --}}
               
                @if (count($classifieds) > 0)
                <div class="row mt-3">
                    <div class="col-lg-7 mx-auto">
                        <div class="site-heading text-center">

                            <h2 class="site-title">Annonces Débarras</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($classifieds as $item)
                    @if (!$item->classified) @continue @endif

                    <div class="col-md-6 col-lg-4">
                        {{-- @if ($item->type__ == 'property') --}}
                        @include('includes.premium.item_classified')

                        {{-- @endif --}}
                    </div>
                    @endforeach


                </div>

                <div class="row justify-content-center mt-6">

                    <div class="col-md-12 text-center">
                        <a href="{{ route('index_classified_front') }}" class="outline-view-all-btn">VOIR TOUTES LES OFFRES <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endif


               
            </div>
        </div>
        <!-- product area end -->



        <!-- service area -->
        <div class="service-area pt-120 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="site-heading text-center">
                            <div class="site-title-tagline">VOIR NOS LIENS UTILES</div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                @foreach ($serviceWeb as $item)
                    <div class="col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                        <div class="card shadow-sm border-0 service-item">
                            <div class="card-body">
                                <div class="service-icon">
                                    <img src="{{ asset('uploads/serviceWeb/'.$item->imageUrl) }}" alt="{{ $item->title }}">
                                </div>
                                <h4 class="mt-2 mb-2" style="font-weight: 700; color: #0064fd;">{{ ucfirst($item->title) }}</h4>
                                <p class="mb-3" style="color: #101010;">{{ $item->description }}</p>
                                <a href="{{$item->lien}}" class="modern-view-all-btn">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                   
                </div>
                
            </div>
        </div>
    </main>



    <!-- footer area -->
    @include('includes.footer')
    <!-- footer area end -->



    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="fas fa-angle-up"></i></a>
    <!-- scroll-top end -->

    <!-- WhatsApp floating button -->
     <a href="https://wa.me/21655247745" target="_blank" id="whatsapp-float" title="Contactez-nous sur WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <style>
    #whatsapp-float {
        position: fixed;
        right: 30px;
        bottom: 20px;
        z-index: 9999;
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        color: #fff;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: 0 4px 16px rgba(44, 62, 80, 0.18);
        transition: background 0.3s, transform 0.2s;
        text-decoration: none;
    }
    #whatsapp-float:hover {
        background: linear-gradient(135deg, #128c7e 0%, #25d366 100%);
        transform: translateY(-4px) scale(1.08);
        color: #fff;
        text-decoration: none;
    }
    </style>

<a href="https://www.facebook.com/share/16cEDaf85b/" target="_blank" id="facebook-float" title="Suivez-nous sur Facebook">
    <i class="fab fa-facebook-f"></i>
</a>

<style>
#facebook-float {
    position: fixed;
    right: 30px;
    bottom: 90px; /* Higher than WhatsApp button */
    z-index: 9999;
    background: linear-gradient(135deg, #1877f2 0%, #145dbf 100%);
    color: #fff;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    box-shadow: 0 4px 16px rgba(44, 62, 80, 0.18);
    transition: background 0.3s, transform 0.2s;
    text-decoration: none;
}

#facebook-float:hover {
    background: linear-gradient(135deg, #145dbf 0%, #1877f2 100%);
    transform: translateY(-4px) scale(1.08);
    color: #fff;
    text-decoration: none;
}
</style>

    <!-- js -->
    <!-- js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/js.js') }}"></script>

    @stack('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const citySelect = document.getElementById('citySelect');
    const areaSelect = document.getElementById('areaSelect');
    if (citySelect && areaSelect) {
        citySelect.addEventListener('change', function() {
            var cityId = this.value;
            areaSelect.innerHTML = '<option value="">Région</option>';
            if(cityId) {
                fetch('/get-areas/' + cityId)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(function(area) {
                            var opt = document.createElement('option');
                            opt.value = area.id;
                            opt.textContent = area.name;
                            areaSelect.appendChild(opt);
                        });
                    });
            }
        });
    }
});
</script>
    {{-- @notifyJs --}}

</body>
<script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('mainHeader');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Show text on mobile search button
        function updateSearchButton() {
            const searchBtn = document.querySelector('.modern-search-btn');
            const searchText = document.querySelector('.search-text');
            if (window.innerWidth <= 480) {
                searchText.style.display = 'inline';
                searchBtn.style.width = '100%';
                searchBtn.style.justifyContent = 'center';
                searchBtn.style.gap = '8px';
            } else {
                searchText.style.display = 'none';
                searchBtn.style.width = '48px';
            }
        }

        window.addEventListener('resize', updateSearchButton);
        document.addEventListener('DOMContentLoaded', updateSearchButton);
    </script>
</html>