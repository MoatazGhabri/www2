@extends('layouts.app')
@section('pageTitle')
    Register
@endsection

@section('content')
@include("includes.image_page")

<div class="modern-register-container">
    <div class="register-hero">
        <div class="hero-overlay">
            <img src="{{ asset('assets/img/logo/logo-dark.png') }}" alt="Logo" class="hero-logo">
            <h1>Bienvenue sur Immobiliere.tn</h1>
            <p>Inscrivez-vous pour accéder à toutes les fonctionnalités et publier vos annonces immobilières facilement.</p>
        </div>
    </div>
    <div class="register-form-container">
        <div class="register-form-wrapper">
            <div class="register-header">
                <h2>Créer votre compte</h2>
                <p>Remplissez le formulaire ci-dessous pour vous inscrire.</p>
            </div>
            @if ($errors->has('register'))
                <div class="alert-error">
                    <div class="alert-content">
                        {{ $errors->first('register') }}
                    </div>
                    <button type="button" class="alert-close">&times;</button>
                </div>
            @endif
            <form action="{{ route('register_immo') }}" method="POST" class="modern-register-form">
                @csrf
                <div class="form-group">
                    <label>Nom & Prénom</label>
                    <div class="input-with-icon">
                        <input id="name" type="text" class="form-input @error('name') error @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Votre nom & prénom">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                @if ($errors->has('name'))
                    <span class="error-message">{{ $errors->first('name') }}</span>
                @endif

                <div class="form-group">
                    <label>Adresse E-mail</label>
                    <div class="input-with-icon">
                        <input id="email" type="email" class="form-input @error('email') error @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Votre E-mail">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                @endif

                <div class="form-group">
                    <label>Mot de passe</label>
                    <div class="input-with-icon">
                        <input id="password" type="password"
                            class="form-input @error('password') error @enderror" name="password" required
                            placeholder="******">
                        <i class="fas fa-lock"></i>
                        <!-- <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button> -->
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif

                <div class="form-group">
                    <label>Confirmation mot de passe</label>
                    <div class="input-with-icon">
                        <input id="password_confirmation" type="password"
                            class="form-input @error('password_confirmation') error @enderror"
                            name="password_confirmation" required placeholder="******">
                        <i class="fas fa-lock"></i>
                        <!-- <button type="button" class="toggle-password"><i class="fas fa-eye"></i></button> -->
                    </div>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="error-message">{{ $errors->first('password_confirmation') }}</span>
                @endif

                <div class="form-group">
                    <label>Catégorie</label>
                    <select name="category" id="category"
                        class="form-input @error('category') error @enderror" required>
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach ($types as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('category'))
                    <span class="error-message">{{ $errors->first('category') }}</span>
                @endif

                <div class="terms-group">
                    <input class="terms-checkbox" type="checkbox" value="" id="agree">
                    <label class="terms-label" for="agree">
                        J'accepte <a href="#" class="terms-link">les conditions d'utilisation.</a>
                    </label>
                </div>

                <button type="submit" class="register-button"><i class="fas fa-sign-in"></i> Inscription</button>
            </form>
            <div class="register-footer">
                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}" class="login-link">Se connecter.</a></p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');
        togglePasswordButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        });

        // Close alert
        const alertCloseButtons = document.querySelectorAll('.alert-close');
        alertCloseButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.alert-error').style.display = 'none';
            });
        });

        // Select2 for category
        $('#category').select2();
    });
</script>
@endpush
@endsection

<style>
    /* Modern Registration Page Styles */
    .modern-register-container {
        display: flex;
        min-height: 100vh;
    }
    
    .register-hero {
        flex: 1;
        background: linear-gradient(135deg, #004aad, #002d6b);
        background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .register-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 74, 173, 0.8);
    }
    
    .hero-overlay {
        position: relative;
        z-index: 1;
        color: white;
        text-align: center;
        padding: 2rem;
        max-width: 600px;
    }
    
    .hero-logo {
        height: 60px;
        margin-bottom: 2rem;
    }
    
    .register-hero h1 {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .register-hero p {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    
    .register-form-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        background: #f8fafc;
        margin-top: 110px; 
    }
    
    .register-form-wrapper {
        max-width: 500px;
        width: 100%;
    }
    
    .register-header {
        margin-bottom: 2rem;
    }
    
    .register-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    
    .register-header p {
        color: #7f8c8d;
        font-size: 0.95rem;
    }
    
    /* Alert Styles */
    .alert-error {
        background: #ffebee;
        color: #d32f2f;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    
    .alert-content {
        flex: 1;
    }
    
    .alert-content ul {
        margin: 0;
        padding-left: 1.25rem;
    }
    
    .alert-close {
        background: none;
        border: none;
        color: #d32f2f;
        cursor: pointer;
        padding: 0 0 0 1rem;
    }
    
    /* Form Styles */
    .modern-register-form {
        margin-top: 1.5rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .input-with-icon {
        position: relative;
    }
    
    .input-with-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #95a5a6;
        font-size: 1rem;
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 45px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        height: 50px;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #004aad;
        box-shadow: 0 0 0 3px rgba(0, 74, 173, 0.2);
    }
    
    .form-input.error {
        border-color: #e74c3c;
    }
    
    .error-message {
        display: block;
        margin-top: 0.5rem;
        color: #e74c3c;
        font-size: 0.85rem;
    }
    
    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #95a5a6;
        cursor: pointer;
        font-size: 1rem;
    }
    
    /* Terms Checkbox */
    .terms-group {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
    }
    
    .terms-checkbox {
        margin-right: 0.75rem;
        width: 18px;
        height: 18px;
        accent-color: #004aad;
    }
    
    .terms-label {
        font-size: 0.9rem;
        color: #2c3e50;
        line-height: 1.4;
    }
    
    .terms-link {
        color: #004aad;
        text-decoration: none;
        font-weight: 500;
    }
    
    .terms-link:hover {
        text-decoration: underline;
    }
    
    /* Register Button */
    .register-button {
        width: 100%;
        padding: 0.75rem;
        background: linear-gradient(135deg, #004aad, #003b8a);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        height: 50px;
    }
    
    .register-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 74, 173, 0.3);
    }
    
    .register-button i {
        font-size: 1rem;
    }
    
    /* Footer Link */
    .register-footer {
        margin-top: 1.5rem;
        text-align: center;
        font-size: 0.9rem;
        color: #7f8c8d;
    }
    
    .login-link {
        color: #004aad;
        text-decoration: none;
        font-weight: 500;
    }
    
    .login-link:hover {
        text-decoration: underline;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .modern-register-container {
            flex-direction: column;
        }
        
        .register-hero {
            padding: 2rem 1rem;
            min-height: 200px;
        }
        
        .register-form-container {
            padding: 2rem 1rem;
        }
        
        .hero-logo {
            height: 50px;
            margin-bottom: 1rem;
        }
        
        .register-hero h1 {
            font-size: 1.8rem;
        }
        
        .register-hero p {
            font-size: 1rem;
        }
    }
</style>
