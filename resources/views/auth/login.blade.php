@extends('layouts.app')

@section('pageTitle')
    Connexion - Luxiflore
@endsection

@section('content')
    <div class="modern-login-container">
        <div class="login-illustration">
            <div class="illustration-overlay">
                <img src="{{ asset('assets/img/logo/lf.png') }}" alt="Luxiflore" class="login-logo">
                <h2>Bienvenue chez Luxiflore</h2>
                <p>Connectez-vous pour accéder à votre espace personnel</p>
            </div>
        </div>

        <div class="login-form-container">
            <div class="login-form-wrapper">
                <div class="login-header">
                    <h1>Connexion</h1>
                    <p>Entrez vos informations d'identification</p>
                </div>

                <form action="{{ route('login') }}" method="post" class="modern-login-form">
                    @csrf
                    
                    @if (Session::get('fail'))
                        <div class="alert alert-error">
                            <div class="alert-content">
                                {{ Session::get('fail') }}
                            </div>
                            <button type="button" class="alert-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input id="email" type="email" class="form-input @error('email') error @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Adresse e-mail">
                        </div>
                        @include('message_session.error_field_message', ['fieldName' => 'email'])
                    </div>

                    <div class="form-group">
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password"
                                class="form-input @error('password') error @enderror" 
                                name="password" required autocomplete="current-password"
                                placeholder="Mot de passe">
                            <button type="button" class="toggle-password" tabindex="-1">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                        @include('message_session.error_field_message', ['fieldName' => 'password'])
                    </div>

                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Se souvenir de moi</label>
                        </div>
                        
                        <!-- @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">
                                Mot de passe oublié ?
                            </a>
                        @endif -->
                    </div>

                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>

                    <!-- <div class="login-footer">
                        <p>Pas encore de compte ? <a href="{{ route('account_type') }}">Créer un compte</a></p>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Modern Login Page Styles */
        .modern-login-container {
            display: flex;
            min-height: 100vh;
            margin-top: 120px;
        }
        
        .login-illustration {
            flex: 1;
            background: linear-gradient(135deg, var(--color-main), var(--color-main));
            background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 2rem;
        }
        
        .login-illustration::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(124, 138, 124, 0.8);
        }
        
        .illustration-overlay {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            max-width: 500px;
        }
        
        .login-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            margin-bottom: 2.5rem;
        }
        
        .login-illustration h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .login-illustration p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .login-form-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: #f8fafc;
        }
        
        .login-form-wrapper {
            max-width: 450px;
            width: 100%;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
        }
        
        .login-header {
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .login-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            color: #7f8c8d;
            font-size: 0.95rem;
        }
        
        .modern-login-form {
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
            border-color: var(--color-main);
            box-shadow: 0 0 0 3px rgba(1, 53, 158, 0.2);
        }
        
        .form-input.error {
            border-color: #e74c3c;
        }
        
        .input-with-icon .toggle-password {
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            color: #95a5a6;
            font-size: 1.1rem;
            z-index: 2;
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 0.5rem;
            accent-color: #ff0101;
        }
        
        .remember-me label {
            font-size: 0.9rem;
            color: #2c3e50;
        }
        
        .forgot-password {
            font-size: 0.9rem;
            color: #ff0101;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .forgot-password:hover {
            color: #ff0101;
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--color-main), var(--color-main));
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
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(1, 53, 158, 0.3);
        }
        
        .login-button i {
            font-size: 1rem;
        }
        
        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
        
        .login-footer a {
            color: #ff0101;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        
        .login-footer a:hover {
            color: #ff0101;
            text-decoration: underline;
        }
        
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
        
        .alert-close {
            background: none;
            border: none;
            color: #d32f2f;
            cursor: pointer;
            padding: 0 0 0 1rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .modern-login-container {
                flex-direction: column;
            }
            
            .login-illustration {
                padding: 2rem 1rem;
                min-height: 200px;
            }
            
            .login-form-container {
                padding: 2rem 1rem;
            }
            
            .login-form-wrapper {
                padding: 1.5rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.toggle-password');
            const toggleIcon = document.getElementById('togglePasswordIcon');
            if (toggleBtn && passwordInput && toggleIcon) {
                toggleBtn.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    toggleIcon.classList.toggle('fa-eye');
                    toggleIcon.classList.toggle('fa-eye-slash');
                });
            }
            
            // Close alert
            const alertClose = document.querySelector('.alert-close');
            if (alertClose) {
                alertClose.addEventListener('click', function() {
                    this.closest('.alert-error').style.display = 'none';
                });
            }
        });
    </script>
@endsection