<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Côte Magique - Agence immobilière en Tunisie. Chez nous, chaque projet immobilier est avant tout une histoire humaine.">


    <meta name="keywords" content="Côte Magique, agence immobilière Tunisie, vente immobilier, location immobilier, achat immobilier, terrains, fond de commerce, appartements">
<link href="https://www.cotemagic.tn" rel="canonical" />    
<meta property="og:url" content="https://www.cotemagic.tn" />
    <title>Côte Magique - Agence Immobilière</title>



<meta property="og:title" content="Côte Magique - Votre partenaire Immobilier de confiance" />

    <meta property="og:description" content="Chez nous, chaque projet immobilier est avant tout une histoire humaine. Contactez-nous au (+216) 52 996 359">
   
<meta property="og:site_name" content="Côte Magique" />
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('assets/img/logo/magic.png') }}">
 <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/magic.png') }}">

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
        google_ad_client: "pub-4232444239452582",
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
    :root {
        --color-main:  #ebb359;
        --color-accent: #ebb359;
    }
    .outline-view-all-btn {
    display: block;
    width: 100%;
    max-width: 400px;
    margin: 0 auto 1.2rem auto;
    padding: 10px 0;
    border: 2px solid var(--color-main);
    background: #fff;
    color: var(--color-main);
    font-size: 1.3rem;
    font-weight: bold;
    border-radius: 12px;
    text-align: center;
    text-transform: uppercase;
    transition: background 0.2s, color 0.2s;
    box-shadow: 0 2px 8px rgba(1,69,158, 0.08);
    letter-spacing: 1px;
    cursor: pointer;
    text-decoration: none;
}
.outline-view-all-btn:hover {
    background: var(--color-main);
    color: #fff;
}
    .modern-view-all-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--color-main) 0%, var(--color-main) 50%, var(--color-main) 100%);
    color: white;
    padding: 10px 28px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18);
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
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.22);
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
.site-title-tagline {
    display: inline-block;
    background: linear-gradient(135deg, var(--color-main) 0%, var(--color-main) 100%);
    color: white;
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0,0.3);
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
    @media only screen and (max-width: 600px) {
        .hero-background {
            background-size: contain !important;
            margin-top: -320px !important;
        }

        .owl-nav {
            display: none;
        }

        .search-area {
            margin-top: -420px;
        }

        .hero-section {
            margin-top: 100px !important;
        }
    }

    .hero-background {
        height: 1000px;
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


    @include('includes.header')
    <!-- header area end -->

    {{-- --}}
    {{-- {{ dd($sliders) }} --}}
    <main class="main ">
    
        <!-- hero area -->
        <div class="hero-section" style="margin-top: 200px;">
            <div class="hero-slider owl-carousel owl-theme">

                @foreach ($sliders as $item)
                <div class="hero-single hero-background slider-item" style="background:url({{ asset('uploads/sliders/' . $item->alt) }});" data-id="{{ $item->id }}" data-url="{{ $item->url ? $item->url : '#' }}">

                </div>
                @endforeach


            </div>
        </div>
        <!-- hero area end -->


        <!-- search area -->
        <div class="search-area">
            <div class="container">
                <div class="search-wrapper">
                    <div class="search-form">
                        <form id="searchForm" method="GET" action="{{ route('all_properties') }}">

                            <!-- @csrf -->
                            <div class="row align-items-center mb-2">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                            <select class="select" name="category_id"  >
                                                <option value="">Catégorie</option>
                                                @foreach ($categories as $value)
                                                <option value="{{ $value->id }}">
                                                    {{ ucfirst($value->name) }}
                                                </option>
                                                @endforeach


                                            </select>
                                            <i class="fas fa-layer-group"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    
                                        <div class="form-group-icon">
                                            <select class="select" name="operation_id"  >
                                                <option value="">Opération</option>
                                                @foreach ($operation as $value)
                                                <option value="{{ $value->id }}" >
                                                    {{ ucfirst($value->title) }}
                                                </option>
                                                @endforeach


                                            </select>
                                            <i class="fas fa-layer-group"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                            <input type="text" class="form-control" placeholder="Référence" name="reference">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mb-2">
                                


                            <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="form-group-icon">
                                <select class="select" name="city_id" id="citySelect">
                                    <option value="">Ville</option>
                                    @foreach ($cities as $value)
                                    <option value="{{ $value->id }}" {{ old('city_id') == $value->id ? 'selected' : '' }}>
                                        {{ ucfirst($value->name) }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-location-dot"></i>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4">
                                <div class="form-group" id="area_div">
                            <div class="form-group-icon">

                                <select class="select" name="area_id" id="areaSelect">
                                    <option value="">Région</option>
                                </select>
                                <i class="fas fa-location-dot"></i>
                            </div>
                        </div>
                        </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="theme-btn"><span class="fas fa-search"></span>Rechercher</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>

                    <div class="search-keyword">
                        <span>Mots-clés tendance:</span>
                       
                        <a href="{{ url('/cherche/-vente') }}">A Vendre</a>
                        <a href="{{ url('/cherche/-location') }}">A Louer</a>
                        <!-- <a href="#">Furnitures</a> -->
                    </div>

                </div>
            </div>
        </div>
        <!-- search area end -->






        {{-- end_promoteur --}}
        <!-- product area -->
        <div class="product-area bg py-120" style="
                    padding-bottom: 10px !important;
                ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">ANNONCES VEDETTES</span>
                            <h1 class="site-title">Explorez nos annonces vedettes</h1>
                            <p>Prêt pour votre vision. Investissez dans votre avenir.
                            </p>
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
                <div class="row justify-content-center ">
                    <div class="col-md-6 text-center">
                            <a href="/cherche/" class="outline-view-all-btn">VOIR TOUTES LES OFFRES<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endif
           



       
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
                                <h4 class="mt-2 mb-2" style="font-weight: 700; color: var(--color-main);">{{ ucfirst($item->title) }}</h4>
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
    @include('includes.floating_social')


    <!-- js -->
    <!-- js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
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
        $(document).ready(function() {
            // Form submission debugging
            $('#searchForm').on('submit', function(e) {
                console.log('Form submitting with data:');
                console.log('Category:', $('select[name="category_id"]').val());
                console.log('Operation:', $('select[name="operation_id"]').val());
                console.log('Reference:', $('input[name="reference"]').val());
                console.log('City:', $('select[name="city_id"]').val());
                console.log('Area:', $('select[name="area_id"]').val());
                // Form will continue to submit normally
            });
            
            // Handle city selection change
            $('#citySelect').on('change', function() {
                var cityId = $(this).val();
                
                if (!cityId) {
                    $('#areaSelect').html('<option value="">Région</option>');
                    $('#areaSelect').niceSelect('update');
                    return;
                }

                // Make an AJAX request to fetch areas based on the selected city
                $.ajax({
                    url: '/get-areas/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options
                        $('#areaSelect').html('<option value="">Région</option>');
                        
                        // Populate areas dropdown with new options
                        $.each(data, function(key, value) {
                            $('#areaSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Destroy and reinitialize nice-select to refresh the UI
                        $('#areaSelect').niceSelect('destroy');
                        $('#areaSelect').niceSelect();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading areas:', error);
                    }
                });
            });

            ///slider
            $('.slider-item').on('click', function(e) {
                e.preventDefault();
                console.log('first')
                var adId = $(this).data('id');
                var adUrl = $(this).data('url');

                if (adUrl === '#') {
                    return;
                }

                $.ajax({
                    url: "{{ route('slider.click') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: adId
                    },
                    success: function(response) {
                        // window.location.href = response.url;
                        if (response.url) {
                            window.open(response.url, '_blank');
                        } else {
                            console.log('An error occurred while processing your request.');
                        }
                    },
                    error: function(xhr) {
                        console.error('An error occurred:', xhr.responseText);
                    }
                });
            });
        });
    </script>
    {{-- @notifyJs --}}

</body>


</html>