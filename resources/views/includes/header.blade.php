<!DOCTYPE html>
<html lang="fr" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Côte Magique - Agence immobilière en Tunisie. Chez nous, chaque projet immobilier est avant tout une histoire humaine.">
    <meta name="keywords" content="Côte Magique, agence immobilière Tunisie, achat appartement, vente maison, location appartement, terrain à vendre, immobilier Tunisie">
    <meta name="author" content="Côte Magique">
    <meta name="robots" content="index, follow">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/magic.png') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.cotemagic.tn">
    <meta property="og:title" content="Côte Magique - Votre partenaire immobilier de confiance en Tunisie">
    <meta property="og:description" content="Découvrez notre sélection de biens immobiliers : Appartements, villas, maisons, terrains, bureaux et locaux commerciaux.">
    <meta property="og:image" content="{{ asset('assets/img/logo/magic.png') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.cotemagic.tn">
    <meta property="twitter:title" content="Côte Magique - Votre partenaire immobilier de confiance">
    <meta property="twitter:description" content="Découvrez notre sélection de biens immobiliers : Appartements, villas, maisons, terrains, bureaux et locaux commerciaux.">
    <meta property="twitter:image" content="{{ asset('assets/img/logo/magic.png') }}">
    
    <title>Côte Magique - Votre agence immobilière en Tunisie</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
       :root {
        --color-main: #ebb359;
        --color-accent: #ebb359;
       }
        .header-accent-bar {
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1100;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1.5px solid rgba(158, 124, 1, 0.2);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 0 0 20px 20px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .navbar {
            padding: 1rem 0 0.8rem 0;
            transition: all 0.4s ease;
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }
        .header.scrolled .navbar {
            padding: 0.5rem 0 0.3rem 0;
        }
        .custom-nav {
            display: flex;
            justify-content: space-between !important;
            padding: 0 2rem;
        }
     
        @media  (max-width: 1800px) {
            .custom-nav {
                margin-left: auto !important;
                margin-right: auto !important;
            }
            
        }
        .navbar-brand {
            margin-left: 0 !important;
            padding-left: 0 !important;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
            color: var(--header-link) !important;
        }
        .navbar-brand img {
            height: 50px !important;
            width: 50px;
            transition: all 0.4s ease;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.08));
        }
        .header.scrolled .navbar-brand img {
            /* height: 40px; */
        }
        .navbar-nav {
            align-items: center !important;
            gap: 2.5rem !important;
            display: flex !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .nav-item {
            position: relative;
        }
        .na-link {
            color: var(--header-link) !important;
            font-weight: 700;
            font-size: 1rem;
            padding: 0.7rem 1.3rem !important;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
        }
        .na-link::after {
            content: '';
            display: block;
            position: absolute;
            left: 25%;
            bottom: 6px;
            width: 50%;
            height: 2px;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            border-radius: 2px;
            opacity: 0;
            transform: scaleX(0);
            transition: all 0.3s;
        }
        .na-link:hover::after {
            opacity: 1;
            transform: scaleX(1);
        }
        .na-link:hover {
            color: var(--header-link-hover) !important;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            box-shadow: 0 6px 18px rgba(0, 106, 254, 0.08);
            transform: translateY(-2px) scale(1.04);
        }
        .header-nav-right {
            display: flex !important;
            align-items: center !important;
            gap: 1.5rem !important;
            justify-content: flex-end !important;
            width: 100% !important;
        }
        .header-account-link {
            color: var(--header-link) !important;
            text-decoration: none;
            padding: 0.7rem 1.3rem;
            background: rgba(40, 125, 166, 0.07);
            border-radius: 50px;
            border: 1px solid var(--header-border);
            transition: all 0.3s ease;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .header-account-link:hover {
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(40, 125, 166, 0.13);
        }
        .btn-primary-custom {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            color: #fff !important;
            padding: 8px 24px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(40, 125, 166, 0.18);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(40, 125, 166, 0.22);
            color: var(--color-main);
            text-decoration: none;
        }
        .btn-primary-custom:hover::before {
            left: 100%;
        }
        .btn-primary-custom i {
            transition: transform 0.3s ease;
        }
        .btn-primary-custom:hover i {
            transform: translateX(5px);
        }
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: var(--shadow-light);
            margin-top: 0.5rem;
            padding: 1rem 0;
            min-width: 220px;
            animation: dropdownFadeIn 0.3s ease;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            padding: 0.75rem 1.5rem;
            color: var(--text-primary) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dropdown-item:hover {
                background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            color: white;
            transform: translateX(5px);
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            left: 100%;
            top: 0;
            margin-left: 0.5rem;
        }

        .header-account .dropdown img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .header-account .dropdown img:hover {
            border-color: rgba(255, 255, 255, 0.8);
            transform: scale(1.1);
        }

        .header-btn {
            display: flex;
            gap: 1rem;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            /* background: linear-gradient(90deg, #44535c 0%, #004d5e 100%); */
            border-radius: 12px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            transform: scale(1.05);
        }

        .navbar-toggler-btn-icon i {
            color: black !important;
            font-size: 1.25rem;
        }

        /* Scrolled state styles */
        .header.scrolled {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }
        
        .header.scrolled .na-link,
        .header.scrolled .dropdown-item,
        .header.scrolled .navbar-brand,
        .header.scrolled .navbar-toggler-btn-icon i,
        .header.scrolled .header-account-link {
            color: var(--color-main) !important;
        }

        .navbar-nav, .navbar-nav ul, .navbar-nav li, .nav-item {
            list-style: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .dropdown-submenu .dropdown-item::after {
            right: -2px !important;
        }

        .mobile-menu-right {
            display: none;
        }

        @media (min-width: 992px) {
            #log_out {
                display: none;
            }

            .header {
                margin-top: 1px;
            }
        }

        @media (max-width: 991.98px) {
            .mobile-menu-right {
                display: block;
            }

            .custom-nav {
                padding: 0 1rem;
            }

                    /* .navbar-collapse {
            background: var(--header-glass) !important;
            border-radius: 20px !important;
            margin-top: 1rem !important;
            padding: 1.5rem !important;
            box-shadow: var(--header-shadow) !important;
        } */

        .navbar-nav {
            flex-direction: column !important;
            gap: 0.5rem !important;
            width: 100% !important;
        }

            .na-link {
                color: var(--header-link) !important;
                text-align: center;
                width: 100%;
            }

            .header-nav-right {
                margin-top: 1rem !important;
                justify-content: center !important;
                flex-wrap: wrap !important;
                gap: 1rem !important;
            }

            .dropdown-menu {
                position: static !important;
                transform: none !important;
                box-shadow: none;
                background: rgba(0, 0, 0, 0.05);
                margin: 0.5rem 0;
            }

            /* Mobile menu open state */
            .navbar:not(.scrolled).menu-open .na-link,
            .navbar:not(.scrolled).menu-open .dropdown-item {
                color: var(--color-main) !important;
            }
            
            /* Ensure mobile menu displays properly when open */
            .navbar-collapse.show {
                display: block !important;
            }
            
            /* Smooth transitions for mobile menu */
            .navbar-collapse {
                transition: all 0.3s ease-in-out !important;
            }
            
            /* Ensure proper z-index for mobile menu */
            .navbar-collapse.show {
                z-index: 1050 !important;
            }
        }

        @media (max-width: 600px) {
            .navbar-brand img {
                height: auto !important;
            }
            .navbar {
                padding: 0.15rem 0 !important;
            }
            .header {
                border-radius: 0;
            }
            .header-accent-bar {
                height: 1.5px;
            }
            .custom-nav {
                margin-left:    10px !important;
            }
        }

        .menu-indicator {
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            transform: translateX(-50%);
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .na-link:hover .menu-indicator {
            width: 80%;
        }

        /* Bootstrap collapse behavior - let Bootstrap handle the display */
        /* Remove any display:none or display:block for .collapse.navbar-collapse */
        
        @media (min-width: 992px) {
            .collapse.navbar-collapse.show {
                display: flex !important;
                justify-content: flex-end !important;
                align-items: center !important;
                width: 100% !important;
            }
        }

        .na-link {
                color: var(--color-main) !important;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.5rem 1rem !important;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
        }
        .na-link::after {
            content: '';
            display: block;
            position: absolute;
            left: 25%;
            bottom: 6px;
            width: 50%;
            height: 2px;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            border-radius: 2px;
            opacity: 0;
            transform: scaleX(0);
            transition: all 0.3s;
        }
        .na-link:hover::after {
            opacity: 1;
            transform: scaleX(1);
        }
        .na-link:hover {
            color: var(--color-main) !important;
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            box-shadow: 0 6px 18px rgba(40, 125, 166, 0.08);
            transform: translateY(-2px) scale(1.04);
        }
        .header-nav-right {
            display: flex !important;
            align-items: center !important;
            gap: 1.5rem !important;
            justify-content: flex-end !important;
            width: 100% !important;
        }
        .header-account-link {
            color: var(--color-main) !important;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background: rgba(40, 125, 166, 0.05);
            border-radius: 50px;
            border: 1px solid var(--header-border);
            transition: all 0.3s ease;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .header-account-link:hover {
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 106, 254, 0.13); */
        }
        .header-contact-info i {
            color: var(--color-main) !important;
            margin-right: 6px;
        }
        .navbar-toggler-btn-icon i {
                color: var(--color-main) !important;
        }
        .menu-indicator {
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%) !important;
        }
        .header-btn .btn,
        .header-btn .btn-primary {
            background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%) !important;
            border-color: var(--color-main) !important;
        }
        .header-btn .btn:hover,
        .header-btn .btn-primary:hover {
            background: #fff !important;
            color: var(--color-main) !important;
            border-color: var(--color-main) !important;
        }

        /* Header contact info and login alignment */
        .header-contact-login-row {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            justify-content: flex-end;
            flex-wrap: wrap;
        }
        .header-contact-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1.2rem;
            margin-bottom: 0;
        }
        @media (max-width: 600px) {
            .header-contact-login-row {
                flex-direction: column;
                align-items: flex-end;
                gap: 0.5rem;
            }
            .header-contact-info {
                flex-direction: column;
                align-items: flex-end;
                gap: 0.2rem;
            }
        }
        .navbar-brand {
            margin-left: 0 !important;
            padding-left: 0 !important;
            display: flex;
            align-items: center;
        }
        .container.custom-nav {
            padding-left: 0 !important;
        }
        @media (max-width: 600px) {
            .container.custom-nav {
                padding-left: 0 !important;
            }
        }

        /* Header nav and contact info in one line, including Se Connecter */
        .header-nav-contact-row {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 100%;
            gap: 2.2rem;
            flex-wrap: wrap;
        }
        .header-nav-contact-row > * {
            margin-bottom: 0 !important;
        }
        .header-nav-contact-info {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }
        .header-account-link {
            margin-left: 0 !important;
        }
        @media (max-width: 991px) {
            .header-nav-contact-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.7rem;
            }
            .header-nav-contact-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.2rem;
            }
        }

        /* Se Connecter top right positioning */
        .header-login-topright {
            position: static !important;
            background: none !important;
            padding: 0 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            margin-left: 0 !important;
        }
        /* Header main row: logo, nav, contact, login all in one line */
        .header-main-row {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            width: 100%;
            flex-wrap: nowrap;
            position: relative;
            padding-top: 0;
        }
        .header-main-row > * {
            margin-bottom: 0 !important;
        }
        @media (max-width: 991px) {
            .header-main-row {
                flex-direction: column;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.7rem;
                padding: 0.5rem 0.2rem;
                width: 100%;
                text-align: center !important;
            }
            .navbar-nav {
                flex-direction: column !important;
                align-items: center !important;
                width: 100%;
                margin-bottom: 0.5rem !important;
                text-align: center !important;
            }
            .header-nav-contact-info {
                flex-direction: column !important;
                align-items: center !important;
                gap: 0.2rem;
                margin-bottom: 0.5rem;
                text-align: center !important;
            }
            .header-account-link.header-login-topright {
                align-self: center !important;
                margin-bottom: 0.5rem;
                text-align: center !important;
                display: flex !important;
                justify-content: center !important;
            }
            .mobile-menu-right {
                display: block !important;
            }
        }
        .header-nav-contact-info span {
            font-size: 0.95rem !important;
        }
        .header-main-row {
            gap: 1.2rem;
        }
        @media (max-width: 991px) {
            .na-link, .header-account-link, .header-nav-contact-info span {
                font-size: 0.95rem !important;
                padding: 0.4rem 0.7rem !important;
            }
            .header-main-row {
                gap: 0.5rem;
            }
        }
        .na-link:hover, .header-account-link:hover {
            color: var(--color-main) !important;
            background: rgba(40, 125, 166, 0.1);
            text-decoration: none;
        }
        .header-nav-contact-info span:hover {
            color: var(--color-main) !important;
            cursor: pointer;
        }

        @media (max-width: 991.98px) {
            .navbar-nav {
                flex-direction: column !important;
                align-items: center !important;
                width: 100% !important;
                margin-bottom: 0.5rem !important;
                text-align: center !important;
            }
            .nav-item .admin-center {
                display: flex;
                justify-content: center;
                width: 100%;
            }
            .admin-center .na-link {
                margin: 0 auto;
            }
            .admin-center .na-link {
                display: block !important;
                text-align: center !important;
                margin: 0 auto !important;
                width: 100%;
            }
        }

    </style>
</head>
<body>

    <header class="header" id="mainHeader">
        <div class="main-navigation" style="color:white !important;">
            <nav class="navbar navbar-expand-lg">
                <div class="container custom-nav">
                    <a class="navbar-brand" href="/">
                   <img src="{{ asset('assets/img/logo/magic.png') }}" alt="Côte Magique Logo" style="width: 100px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-btn-icon"><i class="fas fa-bars"></i></span>
</button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        @if (!Auth::check() && !auth()->guard('classified_user')->check() && !auth()->guard('service_user')->check())
                            <div class="header-main-row">
                                <ul class="navbar-nav" style="margin-bottom: 0;">
                                    <li class="nav-item"><a class="na-link" href="/">Accueil</a></li>
                                    <li class="nav-item"><a class="na-link" href="/cherche/-location">A Louer</a></li>
                                    <li class="nav-item"><a class="na-link" href="/cherche/-vente">A Vendre</a></li>
                                </ul>


                                <div class="header-nav-contact-info">
                                        <span style="color: var(--color-main); font-weight: 600; font-size: 1rem;"><i class="fas fa-envelope" style="color: var(--color-main);"></i>  contact@cotemagic.tn</span>
                                    <span style="color: var(--color-main); font-weight: 600; font-size: 1rem;"><i class="fab fa-whatsapp" style="color: var(--color-main);"></i>  +216 52 996 359</span>  
                                    
                                </div>
                                <a href="{{ route('login') }}" class="header-account-link header-login-topright"><i class="fas fa-user-circle"></i> Se Connecter</a>
                            </div>
                        @else
                            <div class="header-nav-right">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="na-link" href="/">Accueil</a></li>
                                    <li class="nav-item"><a class="na-link" href="/cherche/-location">A Louer</a></li>
                                    <li class="nav-item"><a class="na-link" href="/cherche/-vente">A Vendre</a></li>
                                    @if(auth()->user() && auth()->user()->is_admin)
                                        <li class="nav-item"><a class="na-link" href="{{ route('dashboard_admin') }}" style="text-wrap: nowrap !important">Espace Admin</a></li>
                                    @endif
                                </ul>
                                <div class="header-account">
                                    @auth
                                        @if (auth()->guard('web')->check() && !auth()->user()->is_admin)
                                            @php
                                                $user_logo = null;
                                                if (auth()->user()->store) {
                                                    $user_logo = auth()->user()->store->logo;
                                                }
                                            @endphp
                                            <div class="dropdown">
                                                <div data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="{{ asset($user_logo ? 'uploads/store_logos/' . $user_logo : 'assets/img/account/user.jpg') }}" alt="">
                                                </div>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('profile_annonceur_immobilier') }}"><i class="fas fa-user"></i> Mon Compte</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" @can('isAgent') href="{{ route('all_user_property') }}" @else href="{{ route('all_promoteur_property') }}" @endcan><i class="fas fa-layer-group"></i> Mes Annonces</a>
                                                    </li>
                                                    <li>
                                                        @csrf <a class="dropdown-item" href="{{ route('signout') }}"><i class="far fa-sign-out"></i> Log Out</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    @endauth
                                    @if (auth()->guard('classified_user')->check())
                                        @include('includes.classified')
                                    @elseif(auth()->guard('service_user')->check())
                                        @include('includes.service')
                                    @endif
                                </div>
                                <div class="header-btn">
                                    @include('includes.button_add')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </header>

</body>
</html>