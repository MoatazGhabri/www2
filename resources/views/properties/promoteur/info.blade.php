@extends('layouts.app')
@section('meta')
    <!-- Open Graph meta tags -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $property[0]->title }}">
    <meta property="og:description" content="{{ $property[0]->description }}">
    <meta property="og:image" content="{{ $property[0]->get_meta_image() }}">
    <meta property="og:type" content="website" />

    {{-- @if (config('services.facebook.app_id'))
        <meta property="fb:app_id" content="{{ config('services.facebook.app_id') }}">
    @endif --}}
@endsection
@section('pageTitle')
    {{ $property[0]->title }}
@endsection
@section('content')

    <style>
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

        .product-favorite,
        .product-status {
            font-size: 12px;
        }

        .product-info>p,
        .product-date,
        .product-category-title {
            font-size: 12px;
        }

        li>img {
            height: 100%;
        }

        .img_sl {
            /* width: 825px !important; */
            width: 880px !important;
            height: 550px !important;
        }

        .flex-control-nav {
            display: flex !important;
        }

        @media only screen and (max-width: 600px) {
            .img_sl {
                /* width: 366px !important;
                                                                                                                                                                                                                        height: 228px !important; */
                width: 390px !important;
                height: 260px !important;

            }

            .product-info>p,
            .product-date,
            .product-category-title {
                font-size: 16px;
            }

            

            .flex-control-nav {
                display: flex !important;
            }


            .site-breadcrumb {
                background-size: contain !important;
                /* margin-top: -200px !important; */
            }


            

            .site-breadcrumb {
                padding-top: 50px;
                padding-bottom: 50px;

            }


        }

        .favorited .fa-heart {
            color: red;
        }

        .fa-heart-o {
            color: gray;
        }

    </style>



    {{-- <div class="site-breadcrumb">

        <div class="container">
            <img class="sli" src="{{ asset('images/new/8.png') }}" alt="">
        </div>
    </div> --}}
    {{-- {{ dd("test") }} --}}
    @include('includes.slider')


    <div class="product-single py-120">
        <div class="container">

            <div class="row">

                <div class="col-lg-9 mb-4">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if (session()->has('successFav'))
                        <div class="alert alert-success">
                            {{ session()->get('successFav') }}
                        </div>
                    @endif



                    <div class="product-single-wrapper">
                        <div class="product-single-title-container" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <h1 style="font-size: 28px; margin-bottom: 0;">{{ strtoupper($property[0]->title) }}</h1>
                                <hr style="margin: 0.5rem 0; border: none; height: 1px; background:rgb(132, 138, 147);">
                                <div style="display: flex; align-items: center; justify-content: space-between; margin: 0;">
                                    <p style="margin: 0; display: flex; align-items: center; gap: 0.5rem; font-size: 1rem; color: #6b7280;">
                                        <img src="{{ asset('icon_png/calendar.png') }}" alt="" style="width:32px; margin-right: 4px;">
                                        <span style="margin-left: -5px;">Publié le {{ $property[0]->created_at }}</span>
                                    </p>
                                    <div class="product-single-btn" style="display: flex; align-items: center; gap: 1rem;">
                                        @if (Auth::check())
                                            @if (Auth::user()->favorites->contains('favoritable_id', $property[0]->id))
                                                <a onclick="submitAdd()" style="border: 1px solid #6b7280; background: #fff; border-radius: 5px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;" class="favorite-button favorited" href="#" onmouseover="this.style.borderColor='#fc3131'; this.style.color='#fc3131'" onmouseout="this.style.borderColor='#6b7280'; this.style.color=''">
                                                    <i class="fa-solid fa-heart"></i>
                                                </a>
                                                <form style="display:none" id="add_fav"
                                                    action="{{ route('favorites.store', ['favoritableType' => 'App\\Models\\PromoteurProperty', 'favoritableId' => $property[0]->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @else
                                                <a onclick="submitDelete()" class="favorite-button" href="#" style="background: #fff; border-radius: 5px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border: 1px solid #6b7280; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#fc3131'; this.style.color='#fc3131'" onmouseout="this.style.borderColor='#6b7280'; this.style.color=''">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                                <form style="display:none" id="del_fav"
                                                    action="{{ route('favorites.store', ['favoritableType' => 'App\\Models\\PromoteurProperty', 'favoritableId' => $property[0]->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        @else
                                            <a onclick="goLogin()" class="favorite-button" href="#" style="background: #fff; border-radius: 5px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border: 1px solid #6b7280; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#fc3131'; this.style.color='#fc3131'" onmouseout="this.style.borderColor='#6b7280'; this.style.color=''">
                                                <i class="far fa-heart"></i>
                                            </a>
                                            <form id="goLogin" style="display:none" action="{{ route('login') }}" method="GET">
                                                @csrf
                                            </form>
                                        @endif
                                        <a href="#" onclick="shareOnFacebook()" style="background: #fff; border-radius: 5px; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border: 1px solid #6b7280; transition: all 0.3s ease;" onmouseover="this.style.borderColor='#fc3131'; this.style.color='#fc3131'" onmouseout="this.style.borderColor='#6b7280'; this.style.color=''"><i class="far fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-single-slider">
                            <div class="item-gallery">
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">

                                        @foreach ($property[0]->images as $item)
                                            <li data-thumb="{{ asset('uploads/promoteur_property/' . $item->title) }}">
                                                <img src="{{ asset('uploads/promoteur_property/' . $item->title) }}"
                                                    alt="{{$property[0]->title}}" class="img_sl">
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="product-single-info-container" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <img src="{{ asset('icon_png/ref.png') }}" alt="" style="width:32px;">
                                    <span style="background: #fc3131; color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;"> ref: {{ strtoupper($property[0]->ref) }}</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="color: #fc3131; font-size: 1.2rem; font-weight: 700;">
                                        @if($property[0]->price_total == 0 || $property[0]->price_total == 1)
                                            Prix sur demande
                                        @else
                                            {{ $property[0]->price_total }} DT
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <hr style="margin: 0.5rem 0; border: none; height: 1px; background: rgb(132, 138, 147);">
                            <div class="product-single-moreinfo">
                                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; justify-content: space-between;">
                                    <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem;">
                                        <img src="{{ asset('icon_png/type.png') }}" alt="{{$property[0]->category->name}}" style="width:35px">
                                        <span style="font-size: 0.9rem; color: #374151;">{{ strtoupper($property[0]->category->name) }}</span>
                                    </li>
                                    <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem;">
                                        <img src="{{ asset('icon_png/operation.png') }}" alt="{{$property[0]->operation->name}}" style="width:35px">
                                        <span style="font-size: 0.9rem; color: #374151;">{{ strtoupper($property[0]->operation->name) }}</span>
                                    </li>
                                    <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem;">
                                        <img src="{{ asset('icon_png/location.png') }}" alt="{{ $property[0]->city->name }}, {{ $property[0]->area->name }}" style="width:35px">
                                        <span style="font-size: 0.9rem; color: #374151;">{{ $property[0]->city->name }}, {{ $property[0]->area->name }}</span>
                                    </li>
                                    <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem;">
                                        <img src="{{ asset('icon_png/eyes.png') }}" alt="" style="width:35px">
                                        <span style="font-size: 0.9rem; color: #374151;">{{ $property[0]->count_views }} Vues</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-single-feature" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Détails</h4>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>

                            @if (
                                $property[0]->nb_bedroom != 0 ||
                                    $property[0]->nb_living != 0 ||
                                    $property[0]->nb_bathroom != 0 ||
                                    $property[0]->nb_kitchen != 0 ||
                                    $property[0]->suite_parental != 0 ||
                                    $property[0]->salle_eau != 0 ||
                                    $property[0]->nb_etage != 0 ||
                                    $property[0]->nb_terrasse != 0)
                                <div class="product-single-feature-list">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                                @if ($property[0]->nb_bedroom != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/bedroom.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Chambre</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 30px; text-align: center;">{{ $property[0]->nb_bedroom }}</span>
                                                        </div>
                                                    </li>
                                                @endif

                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                            <img src="{{ asset('icon_png/kitchen.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                            <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Cuisine</span>
                                                        </div>
                                                        <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 80px; text-align: center;">
                                                            @if ($property[0]->nb_kitchen != 0)
                                                                Équipé
                                                            @else
                                                                Non équipé
                                                            @endif
                                                        </span>
                                                    </div>
                                                </li>
                                                @if ($property[0]->suite_parental != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/bedroom.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Suite Parental</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 30px; text-align: center;">{{ $property[0]->suite_parental }}</span>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                                @if ($property[0]->nb_living != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/salon.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Salon</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 30px; text-align: center;">{{ $property[0]->nb_living }}</span>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if ($property[0]->nb_bathroom != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/bethroom.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Salle de bains</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 30px; text-align: center;">{{ $property[0]->nb_bathroom }}</span>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if ($property[0]->salle_eau != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/salle_eau.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Salle d'eau</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 30px; text-align: center;">{{ $property[0]->salle_eau }}</span>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                                @if ($property[0]->nb_etage != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/etage.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Numéro étage</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 50px; text-align: center;">{{ $property[0]->nb_etage == 'rdc' ? strtoupper($property[0]->nb_etage) : $property[0]->nb_etage }}</span>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if ($property[0]->nb_terrasse != 0)
                                                    <li style="width: 100%;">
                                                        <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                            <div style="display: flex; align-items: center; gap: 0.6rem;">
                                                                <img src="{{ asset('icon_png/terrase.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                                <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Terrasse</span>
                                                            </div>
                                                            <span style="background: #fc3131; color: white; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 600; min-width: 30px; text-align: center;">{{ $property[0]->nb_terrasse }}</span>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="product-single-feature" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Équipements</h4>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>

                            <div class="product-single-feature-list">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                            @if ($property[0]->wifi == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">WiFi</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->balcon == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/balcon.png') }}" alt="balcon" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Balcon</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->garden == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Jardin</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->garage == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/garage.png') }}" alt="garage" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Garage</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->parking == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/parking.png') }}" alt="parking" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Parking</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->ascenseur == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/asc.png') }}" alt="Ascenseur" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Ascenseur</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->heating == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/chauffage.png') }}" alt="chauffage" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Chauffage</span>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                            @if ($property[0]->climatisation == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/clim.png') }}" alt="air_condition" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Climatisation Central</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->system_alarm == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/camera.png') }}" alt="camera" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Système alarme</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->piscine == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/piscine.png') }}" alt="piscine" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Piscine Privée</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->swimming_pool_public == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/picine_public.png') }}" alt="piscine" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Piscine Collective</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if ($property[0]->split == 1)
                                                <li style="width: 100%;">
                                                    <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                        <img src="{{ asset('icon_png/split.png') }}" alt="split" style="width: 40px; height: 40px; object-fit: contain; min-width: 40px;">
                                                        <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Split</span>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- -----------------Details Sur Le Prix--------------------------- --}}

                        <div class="product-single-description mt-4" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Prix</h4>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                        @if ($property[0]->price_total !== null && $property[0]->price_total != 0 && $property[0]->price_total != 1)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Prix Total : {{ $property[0]->price_total }} (TND)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->price_metre !== null && $property[0]->price_metre != 0)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Prix du m² : {{ $property[0]->price_metre }} (TND)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->price_metre_terrasse !== null && $property[0]->price_metre_terrasse != 0)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Prix du m² Terrasse : {{ $property[0]->price_metre_terrasse }} (TND)</span>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                        @if ($property[0]->price_metre_jardin !== null && $property[0]->price_metre_jardin != 0)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Prix du m² jardin : {{ $property[0]->price_metre_jardin }} (TND)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->price_cellier !== null && $property[0]->price_cellier != 0)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Prix cellier : {{ $property[0]->price_cellier }} (TND)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->price_parking !== null && $property[0]->price_parking != 0)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Prix place parking : {{ $property[0]->price_parking }} (TND)</span>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>



                        {{-- -----------------Surface--------------------------- --}}
                        <div class="product-single-description mt-4" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Surfaces</h4>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                        @if ($property[0]->surface_totale !== null)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Surface Total : {{ $property[0]->surface_totale }} (m²)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->surface_habitable !== null)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Surface Habitable : {{ $property[0]->surface_habitable }} (m²)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->surface_terrasse !== null)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Surface Terrasse : {{ $property[0]->surface_terrasse }} (m²)</span>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                                        @if ($property[0]->surface_jardin !== null)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Surface Jardin : {{ $property[0]->surface_jardin }} (m²)</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if ($property[0]->surface_cellier !== null)
                                            <li style="width: 100%;">
                                                <div style="background: white; border-radius: 10px; padding: 0.8rem; display: flex; align-items: center; gap: 0.6rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%;">
                                                    <i class="fad fa-circle-check" style="color: #fc3131; font-size: 1.4rem; min-width: 22px; text-align: center;"></i>
                                                    <span style="font-size: 0.85rem; color: #374151; font-weight: 500;">Surface Cellier : {{ $property[0]->surface_cellier }} (m²)</span>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="product-single-description mt-4" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Remise des clés</h4>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <div style="background: white; border-radius: 10px; padding: 1rem; display: flex; align-items: center; gap: 0.8rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 85%; max-width: 400px;">
                                    <img src="{{ asset('icon_png/key.png') }}" alt="clés" style="width: 50px; height: 50px; object-fit: contain;">
                                    <span style="font-size: 1rem; color: #374151; font-weight: 600;">{{ ucfirst($property[0]->remise_des_clés) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="product-single-description mt-4 title__" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Déscription</h4>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>
                            <div style="background: white; border-radius: 10px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                <p style="font-size: 1rem; color: #374151; line-height: 1.6; margin: 0; text-align: justify;">
                                    {{ $property[0]->description }}
                                </p>
                            </div>
                        </div>
                        @if ($property[0]->vedio_path)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-single-description mt-4" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); height: 400px;">
                                        <div style="text-align: center; margin-bottom: 1.5rem;">
                                            <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Vidéo</h4>
                                            <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                            <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                                        </div>
                                        <div style="background: white; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: flex; justify-content: center; align-items: center;">
                                            <video id="videoPreview" width="320" height="240" controls style="width: 100%; max-width: 400px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                                                @if (!$property[0]->vedio_path) style="display:none" @endif>
                                                <source id="videoSource"
                                                    src="{{ asset($property[0]->vedio_path ? 'uploads/videos/properties_promoteur/' . $property[0]->vedio_path : '') }}"
                                                    type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    @if($property[0]->map_embed_url || $property[0]->address)
                                    <div class="product-single-description mt-4" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); height: 400px;">
                                        <div style="text-align: center; margin-bottom: 1.5rem;">
                                            <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Localisation</h4>
                                            <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                            <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                                        </div>
                                        <div style="background: white; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                            @if($property[0]->address)
                                            <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem;">
                                                <i class="far fa-map-marker-alt" style="color: #fc3131; font-size: 1.5rem;"></i>
                                                <span style="font-size: 1rem; color: #374151; font-weight: 600;">{{ $property[0]->address }}</span>
                                            </div>
                                            @endif
                                            <div id="map" style="width: 100%; height: 185px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                                                @if($property[0]->map_embed_url)
                                                    <iframe 
                                                        src="{{ $property[0]->map_embed_url }}" 
                                                        width="100%" 
                                                        height="100%" 
                                                        style="border:0; border-radius: 8px;" 
                                                        allowfullscreen="" 
                                                        loading="lazy" 
                                                        referrerpolicy="no-referrer-when-downgrade">
                                                    </iframe>
                                                @elseif($property[0]->address)
                                                    <div style="text-align: center; color: #6b7280;">
                                                        <i class="far fa-map" style="font-size: 3rem; margin-bottom: 0.5rem; display: block;"></i>
                                                        <p style="margin: 0; font-size: 0.9rem;">Carte interactive</p>
                                                        <p style="margin: 0; font-size: 0.8rem; color: #9ca3af;">{{ $property[0]->address }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            @if($property[0]->map_embed_url || $property[0]->address)
                            <div class="product-single-description mt-4" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); height: 400px;">
                                <div style="text-align: center; margin-bottom: 1.5rem;">
                                    <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Localisation</h4>
                                    <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                    <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                                </div>
                                <div style="background: white; border-radius: 10px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                    @if($property[0]->address)
                                    <div style="display: flex; align-items: center; gap: 0.8rem; margin-bottom: 1rem;">
                                        <i class="far fa-map-marker-alt" style="color: #fc3131; font-size: 1.5rem;"></i>
                                        <span style="font-size: 1rem; color: #374151; font-weight: 600;">{{ $property[0]->address }}</span>
                                    </div>
                                    @endif
                                    <div id="map" style="width: 100%; height: 140px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                                        @if($property[0]->map_embed_url)
                                            <iframe 
                                                src="{{ $property[0]->map_embed_url }}" 
                                                width="100%" 
                                                height="100%" 
                                                style="border:0; border-radius: 8px;" 
                                                allowfullscreen="" 
                                                loading="lazy" 
                                                referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        @elseif($property[0]->address)
                                            <div style="text-align: center; color: #6b7280;">
                                                <i class="far fa-map" style="font-size: 3rem; margin-bottom: 0.5rem; display: block;"></i>
                                                <p style="margin: 0; font-size: 0.9rem;">Carte interactive</p>
                                                <p style="margin: 0; font-size: 0.8rem; color: #9ca3af;">{{ $property[0]->address }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endif
                        {{-- pub --}}
                        {{-- {{ dd($user) }} --}}
                        {{-- <div class="blog-comments-form">
                            <h4 class="mb-4">Informations sur l'annonceur</h4>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class=" ">
                                        <label class="star-label"
                                            style="
                                                color: black;
                                            "><i
                                                class="fa fa-user-circle"
                                                style="
                                                color: #fc3131;
                                            "></i>
                                            {{ $user->first_name }} {{ $user->last_name }}</label>
                                        @if (isset($user->phone) && !empty($user->phone))
                                        <br>

                                            <label class="star-label"
                                                style="
                                                    color: black;
                                                    "><i
                                                    class="fa fa-phone-circle"
                                                    style="
                                                            color: #fc3131;
                                                        "></i>
                                                {{ $user->phone }}</label>
                                @endif
                                        <br>
                                        <label class="star-label"
                                            style="
                                                    color: black;
                                                "><i
                                                class="fa fa-envelope-circle"
                                                style="
                                                color: #fc3131;
                                            "></i>
                                            {{ $user->user->email }}</label>


                                    </div>
                                </div>

                            </div>
                            
                        </div> --}}
                        {{-- endpub --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog-comments-form">
                                    <div class="product-sidebar mb-3">
                                        <div class="product-single-sidebar-item contact-card" style="background: #fff; border-radius: 14px; box-shadow: 0 4px 16px rgba(252,49,49,0.08); padding: 2rem 1.5rem; margin-bottom: 30px; transition: box-shadow 0.3s;">
                                            <h5 class="contact-title" style="font-size: 1.2rem; font-weight: 700; color: #fc3131; text-align: center; margin-bottom: 1.5rem; letter-spacing: 0.01em;">Contact annonceur</h5>
                                            <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                            <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 1.5rem auto;"></div>
                                            <div class="contact-info" style="display: flex; flex-direction: column; align-items: center; gap: 18px; margin-bottom: 18px;">
                                                @if($user_logo)
                                            <img src="{{ asset('uploads/store_logos/' . $user_logo) }}" alt="" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; box-shadow: 0 2px 8px rgba(252,49,49,0.10); margin-bottom: 8px;">
                                        @else
                                            <div style="width: 80px; height: 80px; border-radius: 50%; background: #fc3131; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(252,49,49,0.10); margin-bottom: 8px;">
                                                <i class="far fa-user" style="font-size: 2rem; color: white;"></i>
                                            </div>
                                        @endif
                                                <div class="contact-name" style="font-size: 1.15rem; font-weight: 600; color: #111827; text-align: center; margin-bottom: 0;">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</div>
                                                @if (($user && $user->phone) || $user->mobile)
                                                    <div class="phone-section" style="width: 100%; display: flex; flex-direction: column; align-items: center; gap: 10px;">
                                                        @if($user->phone)
                                                            <div class="phone-display" style="display: flex; align-items: center; gap: 8px; font-size: 1rem; color: #4b5563;">
                                                                <i class="far fa-phone" style="font-size: 1.1rem; color: #fc3131; margin-right: 2px;"></i>
                                                                <span class="author-number" style="font-family: monospace; font-size: 1.1rem; font-weight: 500;">{{ substr($user->phone, 0, 5) }}XXXX</span>
                                                                <span class="author-reveal-number" style="display:none; font-family: monospace; font-size: 1.1rem; font-weight: 500; color: #fc3131;">{{ $user->phone }}</span>
                                                            </div>
                                                            <button type="button" class="display-number-button" data-user-id="{{ $property[0]->user->id }}" data-phone="{{ $user->phone }}" style="background: linear-gradient(90deg, #fc3131, #dc2626); color: #fff; border: none; border-radius: 8px; font-weight: 600; font-size: 1rem; padding: 8px 0; width: 100%; transition: background 0.3s, box-shadow 0.3s; box-shadow: 0 2px 8px rgba(252,49,49,0.10); cursor: pointer;">Afficher le numéro</button>
                                                            <a href="tel:{{ $user->phone }}" class="call-button theme-border-btn w-100 mt-2" data-user-id="{{ $property[0]->user->id }}" data-phone="{{ $user->phone }}" style="background: #fff; color: #fc3131; border: 1.5px solid #fc3131; border-radius: 8px; font-weight: 600; font-size: 1rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem; transition: background 0.3s, box-shadow 0.3s; padding: 8px 0; margin-top: 0;">Appeler</a>
                                                        @endif
                                                        
                                                        @if($user->mobile)
                                                            <div class="phone-display" style="display: flex; align-items: center; gap: 8px; font-size: 1rem; color: #4b5563; margin-top: 10px;">
                                                                <i class="far fa-phone" style="font-size: 1.1rem; color: #fc3131; margin-right: 2px;"></i>
                                                                <span class="author-number" style="font-family: monospace; font-size: 1.1rem; font-weight: 500;">{{ substr($user->mobile, 0, 5) }}XXXX</span>
                                                                <span class="author-reveal-number" style="display:none; font-family: monospace; font-size: 1.1rem; font-weight: 500; color: #fc3131;">{{ $user->mobile }}</span>
                                                            </div>
                                                            <button type="button" class="display-number-button" data-user-id="{{ $property[0]->user->id }}" data-phone="{{ $user->mobile }}" style="background: linear-gradient(90deg, #fc3131, #dc2626); color: #fff; border: none; border-radius: 8px; font-weight: 600; font-size: 1rem; padding: 8px 0; width: 100%; transition: background 0.3s, box-shadow 0.3s; box-shadow: 0 2px 8px rgba(252,49,49,0.10); cursor: pointer; margin-top: 5px;">Afficher le numéro</button>
                                                            <a href="tel:{{ $user->mobile }}" class="call-button theme-border-btn w-100 mt-2" data-user-id="{{ $property[0]->user->id }}" data-phone="{{ $user->mobile }}" style="background: #fff; color: #fc3131; border: 1.5px solid #fc3131; border-radius: 8px; font-weight: 600; font-size: 1rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem; transition: background 0.3s, box-shadow 0.3s; padding: 8px 0; margin-top: 0;">Appeler</a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog-comments-form" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                                    <div class="product-sidebar mb-3">
                                        <div style="text-align: center; margin-bottom: 1.5rem;">
                                            <h4 class="mb-2" onclick="getmessage()" style="cursor: pointer; text-align: center; color: #fc3131; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent; transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                                Envoyer Mail <i class="fa fa-plus-circle" style="margin-left: 0.5rem; transition: all 0.3s ease;"></i>
                                            </h4>
                                            <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                            <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                                        </div>
                                        <form action="{{ route('send.email.client') }}" method="POST" id="message-form" style="display:none; background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nom & Prénom" id="name" name="name" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'name',
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" id="email" name="email" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'email',
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <input type="number" min="0" class="form-control @error('phone') is-invalid @enderror" placeholder="N° Tel" id="phone" name="phone" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'phone',
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <textarea class="form-control @error('message') is-invalid @enderror" rows="4" id="message" name="message" placeholder="Message*" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb; resize: vertical; min-height: 120px;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">Je suis intéressé par cette annonce [REF: {{ $property[0]->ref }} ] et j'aimerais avoir plus de détails.</textarea>
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'message',
                                                    ])
                                                    <input type="hidden" name="type" value="property-promoteur">
                                                    <input type="hidden" name="property_id" value="{{ $property[0]->id }}">
                                                    <div style="text-align: center; margin-top: 2rem;">
                                                        <button type="submit" class="theme-btn" style="background: linear-gradient(90deg, #fc3131, #dc2626); color: #fff; border: none; border-radius: 8px; font-weight: 600; font-size: 1.1rem; padding: 1rem 2rem; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(252,49,49,0.2); cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(252,49,49,0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(252,49,49,0.2)'">
                                                            Envoyer <i class="far fa-paper-plane" style="font-size: 1rem;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- New Envoyer Message Section -->
                                <div class="blog-comments-form" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                                    <div class="product-sidebar mb-3">
                                        <div style="text-align: center; margin-bottom: 1.5rem;">
                                            <h4 class="mb-2" onclick="getmessage2()" style="cursor: pointer; text-align: center; color: #fc3131; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent; transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                                Envoyer Message <i class="fa fa-plus-circle" style="margin-left: 0.5rem; transition: all 0.3s ease;"></i>
                                            </h4>
                                            <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                            <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                                        </div>
                                        <form action="{{ route('send.message.promoteur') }}" method="POST" id="message-form2" style="display:none; background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <input type="text" class="form-control @error('name2') is-invalid @enderror" placeholder="Nom & Prénom" id="name2" name="name" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'name2',
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <input type="email" class="form-control @error('email2') is-invalid @enderror" placeholder="E-mail" id="email2" name="email" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'email2',
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <input type="number" min="0" class="form-control @error('phone2') is-invalid @enderror" placeholder="N° Tel" id="phone2" name="phone" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'phone2',
                                                    ])
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                                        <textarea class="form-control @error('message2') is-invalid @enderror" rows="4" id="message2" name="message" placeholder="Message*" style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 0.8rem 1rem; font-size: 1rem; transition: all 0.3s ease; background: #f9fafb; resize: vertical; min-height: 120px;" onfocus="this.style.borderColor='#fc3131'; this.style.backgroundColor='#fff'" onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'">Je suis intéressé par cette annonce [REF: {{ $property[0]->ref }} ] et j'aimerais avoir plus de détails.</textarea>
                                                    </div>
                                                    @include('message_session.error_field_message', [
                                                        'fieldName' => 'message2',
                                                    ])
                                                    <input type="hidden" name="type" value="property-promoteur-message">
                                                    <input type="hidden" name="property_id" value="{{ $property[0]->id }}">
                                                    <input type="hidden" name="promoteur_id" value="{{ $property[0]->user->id }}">
                                                    <div style="text-align: center; margin-top: 2rem;">
                                                        <button type="submit" class="theme-btn" style="background: linear-gradient(90deg, #fc3131, #dc2626); color: #fff; border: none; border-radius: 8px; font-weight: 600; font-size: 1.1rem; padding: 1rem 2rem; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(252,49,49,0.2); cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(252,49,49,0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(252,49,49,0.2)'">
                                                            Envoyer <i class="far fa-paper-plane" style="font-size: 1rem;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- endtest --}}

                        @if (count($propertyRelated) > 0)
                            <div class="product-single-related mt-5">
                                <div style="text-align: center; margin-bottom: 1.5rem;">
                                    <h4 style="color: #fc3131; font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">Annonces Similaires</h4>
                                    <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                    <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                                </div>
                                <div class="row">
                                    @foreach ($propertyRelated as $item)
                                        <div class="col-md-6 col-lg-4">
                                            @include('includes.item_promoteur_property')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-lg-3">

                    <div class="product-sidebar mb-3">
                        <div class="product-single-sidebar-item" style="background: #f3f4f6; border-radius: 10px; padding: 1.5rem 1rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div style="text-align: center; margin-bottom: 1.5rem;">
                                <h5 style="color: #fc3131; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; display: inline-block; position: relative; background: transparent;">PUBLICITÉS</h5>
                                <div style="width: 100%; height: 1px; background: #e5e7eb; margin: 0 auto; position: relative;"></div>
                                <div style="width: 80px; height: 4px; background: #fc3131; border-radius: 2px; margin: -3px auto 0 auto;"></div>
                            </div>

                            <div class="blog-item-img" style="overflow: auto; display: flex; flex-direction: column; gap: 1rem;">
                                @foreach ($ads as $ad)
                                    <a href="{{ $ad->url ? route('ad.click', ['id' => $ad->id]) : '#' }}" class="mb-4"
                                        title="{{ ucfirst($ad->description) }}" style="display: block; background: white; border-radius: 10px; padding: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s ease; text-decoration: none;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)'">
                                        <img src="{{ asset($ad ? 'uploads/ads/' . $ad->alt : 'assets/img/account/user0.jpg') }} "
                                            alt="{{ ucfirst($ad->description) }}" style="width: 100%; height: auto; border-radius: 8px; object-fit: cover;">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <form id="call-action-form" method="POST" action="{{ route('save_statistique') }}" style="display: none;">
        @csrf
        <input type="hidden" name="user_id" id="user-id-input">
        <input type="hidden" name="action_type" value="call">
        <input type="hidden" name="phone" id="phone-input">
    </form>
    {{-- statistique --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#call-button').on('click', function(e) {

            //     document.getElementById('call-button').addEventListener('click', function(e) {
            //         e.preventDefault(); // Prevent the default link action

            //         // Get the data attributes
            //         var userId = this.getAttribute('data-user-id');
            //         var phone = this.getAttribute('data-phone');
            //         console.log("this" + userId);
            //         console.log(phone);

            //         // Set the form inputs
            //         document.getElementById('user-id-input').value = userId;
            //         document.getElementById('phone-input').value = phone;

            //         // Submit the form
            //         document.getElementById('call-action-form').submit();
            //     });

            //     var userId = $(this).data('user-id');
            //     var action_type = 'call';



            //     $.ajax({
            //         url: ' {{ route('save_statistique') }}',
            //         type: 'POST',
            //         data: {
            //             _token: '{{ csrf_token() }}',
            //             user_id: userId,
            //             action_type: action_type

            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                 window.location.href = 'tel:' + phone;
            //             }
            //         }
            //     });
            // });

            $('.call-button').on('click', function(e) {
                e.preventDefault(); // Prevent the default button action

                // Get the data attributes
                var userId = $(this).data('user-id');
                var phone = $(this).data('phone');
                console.log("User ID: " + userId);
                console.log("Phone: " + phone);

                // Set the form inputs
                $('#user-id-input').val(userId);
                $('#phone-input').val(phone);

                // Submit the form
                $.ajax({
                type: 'POST',
                url: $('#call-action-form').attr('action'),
                data: $('#call-action-form').serialize(),
                success: function(response) {
                    // On success, redirect to the dialer
                    window.location.href = 'tel:' + phone;
                },
                error: function(error) {
                    console.error("Error submitting form:", error);
                    // Optionally, handle the error
                }
            });
            });


            $('.display-number-button').on('click', function() {
                var userId = $(this).data('user-id');
                var phone = $(this).data('phone');
                console.log(userId);
                console.log(phone);

                var action = 'displayed_number';

                // Get the specific phone display elements for this button
                var phoneDisplay = $(this).prev('.phone-display');
                var authorNumber = phoneDisplay.find('.author-number');
                var authorRevealNumber = phoneDisplay.find('.author-reveal-number');
                var button = $(this);

                // Show the full number and hide the masked number
                authorNumber.hide();
                authorRevealNumber.show();
                
                // Change button text and disable it
                button.text('Numéro affiché').prop('disabled', true).css({
                    'background': 'linear-gradient(90deg, #6b7280, #4b5563)',
                    'cursor': 'not-allowed'
                });

                $.ajax({
                    url: ' {{ route('save_statistique') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: userId,
                        action_type: action
                    },
                    success: function(response) {
                        console.log('Statistics saved successfully');
                    },
                    error: function(error) {
                        console.error('Error saving statistics:', error);
                    }
                });
            });
        });
    </script>
    {{-- end statistique --}}
    <script>
        function getmessage() {
            var divItem = document.getElementById("message-form");
            if (divItem.style.display === 'none') {
                divItem.style.display = 'block';
            } else {
                divItem.style.display = 'none';
            }
        }

        function getmessage2() {
            var divItem = document.getElementById("message-form2");
            if (divItem.style.display === 'none') {
                divItem.style.display = 'block';
            } else {
                divItem.style.display = 'none';
            }
        }

        function submitAdd() {
            document.getElementById('add_fav').submit();
        }

        function submitDelete() {
            document.getElementById('del_fav').submit();
        }

        function goLogin() {
            document.getElementById('goLogin').submit();
        }

        function shareOnFacebook() {
            var url = encodeURIComponent('{{ url()->current() }}');
            var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    </script>
@endsection
	