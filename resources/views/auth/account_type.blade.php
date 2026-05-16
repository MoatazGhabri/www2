@extends('layouts.app')

@section('pageTitle')
    Choisissez votre type de compte
@endsection

@section('content')
    <div class="account-type-selection">
        <!-- Hero Section -->
        <div class="selection-hero">
            <div class="hero-content">
                <img src="{{ asset('assets/img/logo/logo-dark.png') }}" alt="Logo" class="hero-logo">
                <h1>Commencez maintenant</h1>
                <p>Sélectionnez le type de compte qui correspond à vos besoins</p>
            </div>
        </div>

        <!-- Account Type Cards -->
        <div class="account-types-container">
            <div class="container">
                <div class="account-types-grid">
                    <!-- Immobilier Account -->
                    <div class="account-type-card property-card">
                        <div class="card-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Annonceur Immobilier</h3>
                        <p>Publiez et gérez vos annonces immobilières</p>
                        <a href="{{ route('get_register_immo') }}" class="account-type-btn">
                            Choisir ce compte
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Services Account -->
                    <div class="account-type-card service-card">
                        <div class="card-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h3>Annonceur Services</h3>
                        <p>Proposez vos services professionnels</p>
                        <a href="{{ route('service_user.register_form') }}" class="account-type-btn">
                            Choisir ce compte
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Modern Account Selection Styles */
        .account-type-selection {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin-top: 150px; /* Add this line to create space below the fixed header */
        }
        
        .selection-hero {
            background: linear-gradient(135deg, #004aad, #002d6b);
            color: white;
            padding: 4rem 1rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .selection-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero-logo {
            height: 60px;
            margin-bottom: 1.5rem;
            margin-top: 50px;
        }
        
        .selection-hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .selection-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .account-types-container {
            flex: 1;
            padding: 4rem 1rem;
            background: #f8fafc;
        }
        
        .account-types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .account-type-card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .account-type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .card-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .property-card .card-icon {
            background: rgba(0, 74, 173, 0.1);
            color: #004aad;
        }
        
        .service-card .card-icon {
            background: rgba(3, 186, 24, 0.1);
            color: #03ba18;
        }
        
        .account-type-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        
        .account-type-card p {
            color: #7f8c8d;
            margin-bottom: 2rem;
            flex-grow: 1;
        }
        
        .account-type-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .property-card .account-type-btn {
            background: rgba(0, 74, 173, 0.1);
            color: #004aad;
            border: 1px solid #004aad;
        }
        
        .property-card .account-type-btn:hover {
            background: #004aad;
            color: white;
        }
        
        .service-card .account-type-btn {
            background: rgba(3, 186, 24, 0.1);
            color: #03ba18;
            border: 1px solid #03ba18;
        }
        
        .service-card .account-type-btn:hover {
            background: #03ba18;
            color: white;
        }
        
        @media (max-width: 768px) {
            .selection-hero {
                padding: 3rem 1rem;
            }
            
            .selection-hero h1 {
                font-size: 2rem;
            }
            
            .selection-hero p {
                font-size: 1rem;
            }
            
            .account-types-container {
                padding: 2rem 1rem;
            }
            
            .account-types-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection