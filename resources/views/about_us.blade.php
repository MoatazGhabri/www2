@extends('layouts.app')
@section('pageTitle')
Qui sommes nous
@endsection
@section('content')
<style>
.about-area.py-120 {
    margin-top: 120px;
}
@media (max-width: 768px) {
    .about-area.py-120 {
        margin-top: 90px;
    }
}
</style>
<div class="about-area py-120 mb-30">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="about-left">
                <div class="about-img">
                    <img src="{{ asset('assets/img/logo/magic.png')}}" alt="Côte Magique">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-right">
                <div class="site-heading mb-3">
                    <span class="site-title-tagline">Qui sommes nous</span>
                </div>
                <div class="about-agency-section mt-4">
                    <h4 style="color: var(--color-main); font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">Côte Magique</h4>
                    <p style="font-size: 1.1rem; font-weight: 600; color: #2c3e50; margin-bottom: 1rem;">Qualité et Élégance — Donnez une touche de magie à votre maison</p>
                    <p class="about-text">
                    Décoration et Accessoires à Mssaken, Sousse. Nous vous proposons une sélection soignée de produits de décoration pour sublimer votre intérieur avec style et élégance.
                    </p>
                    <div class="why-choose-us" style="margin-top: 1.5rem;">
                        <h5 style="color: var(--color-main); font-size: 1.2rem; margin-bottom: 1rem;">Pourquoi choisir Côte Magique :</h5>
                        <ul style="list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Produits de qualité soigneusement sélectionnés
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Style et élégance pour chaque espace
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Service personnalisé à l'écoute de vos besoins
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Livraison disponible à Mssaken, Sousse
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
