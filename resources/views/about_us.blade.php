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
                    <img src="{{ asset('assets/img/logo/lf.png')}}" alt="Luxiflore">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-right">
                <div class="site-heading mb-3">
                    <span class="site-title-tagline">Qui sommes nous</span>
                </div>
                <div class="about-agency-section mt-4">
                    <h4 style="color: var(--color-main); font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">Luxiflore</h4>
                    <p class="about-text">
                    Avec Luxiflore, éclairez votre espace avec élégance naturelle. Nous proposons des bacs à fleurs et cache-pots en roche et pierre lumineuse pour sublimer votre décoration d'intérieur.
                    </p>
                    <div class="why-choose-us" style="margin-top: 1.5rem;">
                        <h5 style="color: var(--color-main); font-size: 1.2rem; margin-bottom: 1rem;">Nos spécialités :</h5>
                        <ul style="list-style: none; padding-left: 0;">
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Bacs à fleurs en roche et pierre lumineuse
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Cache-pots design et élégants
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Décoration d'intérieur
                            </li>
                            <li style="margin-bottom: 0.5rem; position: relative; padding-left: 1.5rem;">
                                <span style="position: absolute; left: 0; color: var(--color-main); font-weight: bold;">✓</span>
                                Élégance naturelle pour chaque espace
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
