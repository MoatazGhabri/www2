    <footer class="modern-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <!-- About Us Column -->
                    <div class="footer-column">
                        <div class="footer-logo-box">
                            <a href="#" class="footer-logo">
                                        <img src="{{ asset('assets/img/logo/iaf.png') }}" alt="IAF - Agence Immobilière Agrebi Frères">
                            </a>
                            <p class="footer-about">
                            Agence Immobilière Agrebi Frères - IAF. Spécialisée en intermédiation immobilière : vente, achat et location de terrains agricoles en Tunisie.
                            </p>
                            <div class="footer-social-icons">
                                <a href="https://www.facebook.com/share/1CVwX3rUev/" class="social-icon" aria-label="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Pages Column -->
                    <div class="footer-column">
                        <h4 class="footer-title">Navigation <i class="fas fa-compass"></i></h4>
                        <ul class="footer-links">
                            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Accueil</a></li>
                            <li><a href="{{ url('/cherche/-vente') }}"><i class="fas fa-tag"></i> A vendre</a></li>
                            <li><a href="{{ url('/cherche/-location') }}"><i class="fas fa-house-user"></i> A louer</a></li>
                            <!-- <li><a href="{{ route('all_properties_promoteur') }}"><i class="fas fa-building"></i> Direct Promoteurs</a></li>
                            <li><a href="{{route('index_service_front')}}"><i class="fas fa-concierge-bell"></i> Services</a></li>
                            <li><a href="{{route('index_classified_front')}}"><i class="fas fa-box-open"></i> Ventes Diverses</a></li> -->
                        </ul>
                    </div>

                    <!-- Links Column -->
                    <div class="footer-column">
                        <h4 class="footer-title">Liens Utiles <i class="fas fa-link"></i></h4>
                        <ul class="footer-links">
                            <li><a href="{{ route('about_us') }}"><i class="fas fa-info-circle"></i> Qui sommes nous</a></li>
                            <li><a href="{{ route('term_condition') }}"><i class="fas fa-file-contract"></i> Conditions générales</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contactez-nous</a></li>
                        </ul>
                    </div>

                    <!-- Contact Column -->
                    <div class="footer-column">
                        <h4 class="footer-title">Contactez-nous <i class="fas fa-address-book"></i></h4>
                        <ul class="footer-contact-info">
                            <li><a href="tel:+21694303262"><i class="fas fa-phone"></i> +216 94 303 262</a></li>
                            <li><a href="https://wa.me/21694303262" target="_blank"><i class="fab fa-whatsapp"></i> +216 94 303 262</a></li>
                            <li><i class="fas fa-map-marker-alt"></i> Sfax</li>
                            <li><a href="mailto:kamel.twitc@gmail.com"><i class="fas fa-envelope-open-text"></i> kamel.twitc@gmail.com</a></li>
                        </ul>                   
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <p class="copyright-text">
                        &copy; Copyright <span>{{ date('Y') }}</span> <a href="{{ url('https://immobiliere.tn') }}"> Azur Platforms Events </a> - Tous droits réservés
                    </p>
                    <div class="footer-legal">
                        <a href="{{ route('term_condition') }}">Conditions d'utilisation</a>
                        <a href="#">Politique de confidentialité</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Back to Top Button -->
    </footer>

    <style>
    /* Modern Footer Styles */
    .modern-footer {
            /* background: linear-gradient(135deg, #7a8087ff 0%, #004d5e6dff 100%); */

        background: linear-gradient(135deg, #ffffffff 0%, #fefefeff 100%);
        color: #101010;
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        position: relative;
        overflow: hidden;
    }
    :root {
        --color-main: #759f17;
        --color-accent: #759f17;
    }
    .modern-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--color-main), var(--color-main));
    }

    .footer-top {
        padding: 60px 0 40px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .footer-column {
        margin-bottom: 20px;
    }

    .footer-logo-box {
        margin-bottom: 20px;
    }

    .footer-logo img {
        height: 100px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .footer-about {
        color: var(--color-main) !important;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 15px;
    }

    .footer-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
        color: #141313ff;
    }

    .footer-title i {
        margin-left: 8px;
        color: var(--color-main);
    }

    .footer-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, var(--color-main), var(--color-main));
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: #1b1b1cff;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        font-size: 14px;
    }

    .footer-links a:hover {
        color: var(--color-main);
        transform: translateX(5px);
    }

    .footer-links i {
        margin-right: 10px;
        width: 18px;
        text-align: center;
        color: var(--color-main);
        font-size: 14px;
    }

    .footer-contact-info {
        list-style: none;
        padding: 0;
        margin: 0 0 25px 0;
    }

    .footer-contact-info li {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
        color: #1a1b1cff;
        font-size: 14px;
        line-height: 1.5;
    }

    .footer-contact-info i {
        margin-right: 12px;
        color: var(--color-main);
        font-size: 16px;
        margin-top: 3px;
    }

    .footer-contact-info a {
        color: #070707ff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-contact-info a:hover {
        color: var(--color-main);
    }

    .footer-social-icons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        color: #0e0d0dff;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .social-icon:hover {
        background: var(--color-main);
        transform: translateY(-3px);
    }

    .footer-newsletter {
        margin-top: 25px;
    }

    .footer-newsletter h5 {
        font-size: 16px;
        margin-bottom: 15px;
        color: #ffffff;
    }

    .newsletter-form {
        display: flex;
        position: relative;
    }

    .newsletter-form input {
        flex: 1;
        padding: 12px 15px;
        border: none;
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-size: 14px;
        outline: none;
    }

    .newsletter-form input::placeholder {
        color: #bdc3c7;
    }

    .newsletter-form button {
        position: absolute;
        right: 5px;
        top: 5px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--color-main);
        color: #ffffff;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .newsletter-form button:hover {
    background: var(--color-main);
    }

    .footer-bottom {
        background: rgba(0, 0, 0, 0.2);
        padding: 20px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .footer-bottom-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    @media (min-width: 768px) {
        .footer-bottom-content {
            flex-direction: row;
            justify-content: space-between;
            text-align: left;
        }
    }

    .copyright-text {
        color: #262627ff;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .copyright-text a {
        color: var(--color-main);
        text-decoration: none;
    }

    .footer-legal {
        display: flex;
        gap: 15px;
    }

    .footer-legal a {
        color: #080808ff;
        font-size: 13px;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-legal a:hover {
        color: var(--color-main);
    }

    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background: var(--color-main);
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
    }

    .back-to-top.active {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        background: var(--color-main);
        transform: translateY(-3px);
    }

    /* Animation for links */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .footer-column:nth-child(1) { animation: fadeIn 0.5s ease forwards; }
    .footer-column:nth-child(2) { animation: fadeIn 0.5s ease 0.1s forwards; }
    .footer-column:nth-child(3) { animation: fadeIn 0.5s ease 0.2s forwards; }
    .footer-column:nth-child(4) { animation: fadeIn 0.5s ease 0.3s forwards; }
    </style>

    <script>
    // Back to top button functionality
    window.addEventListener('scroll', function() {
        var backToTop = document.querySelector('.back-to-top');
        if (window.pageYOffset > 300) {
            backToTop.classList.add('active');
        } else {
            backToTop.classList.remove('active');
        }
    });

    document.querySelector('.back-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
    </script>