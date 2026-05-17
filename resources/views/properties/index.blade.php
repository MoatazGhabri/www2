@extends('layouts.app')
@section('pageTitle')
    Annonces
@endsection
@section('content')
    <style>
        .product-favorite,
        .product-status {
            color: #b48437;
            font-size: 12px;
        }

        .product-date,
        .product-info p {
            font-size: 12px;
        }
    </style>

    <style>
        @media only screen and (max-width: 600px) {
            .site-breadcrumb {
                background-size: contain !important;
                /* margin-top: -200px !important; */
            }

            .site-breadcrumb {
                padding-top: 50px;
                padding-bottom: 50px;
            }
        }

        @media only screen and (min-width: 600px) {
            .sli {
                height: 400px;
                width: 100%;
            }

            .site-breadcrumb {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        }
    </style>

    <style>
    .modern-list-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background: #fff;
        width: 100%;
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(44,62,80,0.10);
        padding: 1.2rem 2rem;
        margin-bottom: 2rem;
        font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        min-height: 64px;
        border-top: 3px solid #006AFE;
    }

    .modern-list-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1e293b;
        letter-spacing: -0.5px;
        text-align: left;
        flex: 1;
        margin-bottom: 0;
        line-height: 1.1;
        vertical-align: top;
    }

    .modern-list-count {
        font-size: 1.05rem;
        color: #64748b;
        font-weight: 500;
        text-align: right;
        flex-shrink: 0;
        margin-left: 1.5rem;
        margin-bottom: 0;
        line-height: 1.1;
        vertical-align: top;
    }

    @media (max-width: 600px) {
        .modern-list-header {
            flex-direction: column;
            align-items: stretch;
            padding: 1rem 1rem;
            min-height: unset;
        }
        .modern-list-title {
            margin-bottom: 0.5rem;
            text-align: left;
        }
        .modern-list-count {
            text-align: left;
            margin-left: 0;
        }
    }
    .site-heading {
    position: relative;
    padding: 3rem 0;
    margin-bottom: 4rem;
}

.site-title-tagline {
    color: #b48437;
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 2rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: block;
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
    background: linear-gradient(135deg, #b48437 0%, #b48437 50%, #b48437 100%);
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
    background: linear-gradient(90deg, #b48437, #b48437);
    border-radius: 2px;
}

.site-heading p {
    font-size: 1.2rem;
    color: #7f8c8d;
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
    background: linear-gradient(135deg, #b48437 0%, #b48437 50%, #b48437 100%);
    color: white;
    padding: 10px 28px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(43, 166, 232, 0.18);
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
    box-shadow: 0 12px 35px rgba(43, 166, 232, 0.22);
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
    </style>

    <!-- Horizontal Search Form -->
    @include('includes.search_form_horizontal')

    <!-- product area -->
    <div class="product-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-12">
                        <div class="product">
                            <div class="modern-list-header">
                                <span class="modern-list-title">{{$title}}</span>
                                <span class="modern-list-count">Affichage {{ $props->appends(request()->query())->total() }} Résultats</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($props as $item)
                            @if (!$item->user == null)
                                <div class="col-md-6 col-lg-4">
                                    @include('includes.item_property')
                                </div>
                            @endif
                        @endforeach

                        <!-- pagination -->
                        {!! $props->appends(request()->query())->links('vendor.pagination.default') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product area end -->

<!-- Lien utiles section -->
<div class="service-area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="site-heading text-center">
                    <div class="site-title-tagline">Lien utiles</div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
        @foreach ($serviceWeb as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0 h-100 service-item" style="border-radius: 20px; transition: transform 0.2s;">
                    <div class="card-body text-center d-flex flex-column align-items-center justify-content-center" style="padding: 2rem;">
                        <div class="service-icon mb-3">
                            <img src="{{ asset('uploads/serviceWeb/'.$item->imageUrl) }}" alt="{{ $item->title }}">
                        </div>
                        <h4 class="mt-2 mb-2" style="font-weight: 700; color: #b48437;">{{ ucfirst($item->title) }}</h4>
                        <p class="mb-3" style="color: #6b7280; min-height: 60px;">{{ $item->description }}</p>
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
@include('includes.floating_social')
@endsection

