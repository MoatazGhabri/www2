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
                    <img src="{{ asset('assets/img/logo/iaf.png')}}" alt="IAF - Agence Immobilière Agrebi Frères">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-right">
                <div class="site-heading mb-3">
                    <span class="site-title-tagline">Qui sommes nous</span>
                </div>
                <div class="about-agency-section mt-4">
                    <h4 style="color: var(--color-main); font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">Agence Immobilière Agrebi Frères - IAF</h4>
                    <p class="about-text">
                    Agence Immobilière Agrebi Frères -IAF- est une agence spécialisée dans l'intermédiation immobilière, facilitant et gérant les opérations de vente, d'achat et de location de terrains agricoles de tout type. Grâce à son expertise et à sa parfaite connaissance du marché, IAF vous accompagne et vous conseille à chaque étape de votre projet.
                    </p>
                    <div class="why-choose-us" style="margin-top: 1.5rem;">
                        <h5 style="color: var(--color-main); font-size: 1.2rem; margin-bottom: 1rem;">Pourquoi choisir IAF :</h5>
                        <ul style="list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Compétence : une expertise dédiée au secteur immobilier
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Confiance : un accompagnement sérieux et professionnel
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Transparence : des démarches claires et un suivi en toute honnêteté
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
