@extends('layouts.dashboard')

@section('pageTitle')
    Mon Compte
@endsection

@section('sectionTitle')
    <div class="dashboard-header">
        <h1 class="dashboard-title">Mon Compte</h1>
        <p class="dashboard-subtitle">Gérez vos informations personnelles</p>
    </div>
@endsection

@section('content')
    <div class="modern-profile-container">
        <div class="profile-grid">
            <!-- Account Information Section -->
            <div class="profile-section">
                <div class="profile-card">
                    <div class="card-header">
                        <i class="fas fa-user-circle card-icon"></i>
                        <h3 class="card-title">Informations de compte</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-modern">
                                <ul class="error-list">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if (session()->has('success_profile'))
                            <div class="alert alert-success alert-modern">
                                <i class="fas fa-check-circle"></i> {{ session()->get('success_profile') }}
                            </div>
                        @endif

                        <form action="{{ route('updateProfile') }}" method="POST" class="profile-form">
                            @csrf
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">
                                        @if (auth()->user()->isCompany())
                                            Raison sociale (Nom entreprise)
                                        @else
                                            Nom & Prénom
                                        @endif
                                    </label>
                                    <input type="text" class="form-input" value="{{ auth()->user()->username }}" name="username">
                                    @error('username')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-input" value="{{ auth()->user()->email }}" name="email">
                                    @error('email')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Téléphone mobile</label>
                                    <input type="text" class="form-input" value="@if(auth()->user()->isAdmin()){{ auth()->user()->mobile }}@else{{ $userType->mobile ?? '' }}@endif" 
                                        placeholder="" name="mobile" onkeypress="return isNumberKey(event)">
                                    @error('mobile')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Téléphone fixe</label>
                                    <input type="text" class="form-input" value="@if(auth()->user()->isAdmin()){{ auth()->user()->phone }}@else{{ $userType->phone ?? '' }}@endif" 
                                        placeholder="" name="phone" onkeypress="return isNumberKey(event)">
                                    @error('phone')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Ville</label>
                                    <select class="form-select" name="city_id" id="citySelect">
                                        <option value="">Choisir une ville</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ auth()->user()->city_id == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Région</label>
                                    <select class="form-select" name="area_id" id="areaSelect">
                                        <option value="">Choisir une région</option>
                                        @foreach ($areas as $area)
                                            <option {{ auth()->user()->area_id == $area->id ? 'selected' : '' }} 
                                                value="{{ $area->id }}">{{ $area->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group full-width">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-input" name="address" 
                                        value="@if(auth()->user()->isAdmin()){{ auth()->user()->address }}@else{{ $userType->address ?? '' }}@endif" placeholder="Votre adresse complète">
                                    @error('address')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="type_user" name="type_user" value="{{ auth()->user()->checkType() }}">

                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Sauvegarder
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Change Password Section -->
                @include('includes.change_password_account')
            </div>

            <!-- Shop Information Section -->
            <div class="profile-section">
                <div class="profile-card">
                    <div class="card-header">
                        <i class="fas fa-store card-icon"></i>
                        <h3 class="card-title">Informations</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateStore') }}" method="POST" enctype="multipart/form-data" class="shop-form">
                            @csrf
                            
                            @if ($errors->has('store'))
                                <div class="alert alert-danger alert-modern">
                                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first('store') }}
                                </div>
                            @endif
                            
                            @if (session()->has('success_store'))
                                <div class="alert alert-success alert-modern">
                                    <i class="fas fa-check-circle"></i> {{ session()->get('success_store') }}
                                </div>
                            @endif

                            <!-- Logo Upload -->
                            <div class="upload-group">
                                <div class="upload-preview logo-preview">
                                    @if (auth()->user()->store)
                                        <img src="{{ asset(auth()->user()->store->logo ? 'uploads/store_logos/' . auth()->user()->store->logo : 'assets/img/store/01.jpg') }}" 
                                            alt="Store Logo" id="logoPreview">
                                    @else
                                        <img src="{{ asset('assets/img/store/01.jpg') }}" alt="Default Store Logo" id="logoPreview">
                                    @endif
                                    <div class="upload-overlay">
                                        <i class="fas fa-camera"></i>
                                        <span>Changer le logo</span>
                                    </div>
                                </div>
                                <input type="file" class="file-input" name="logo" id="logoInput" accept="image/*">
                                @error('logo')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Banner Upload -->
                            <div class="upload-group">
                                <div class="upload-preview banner-preview">
                                    @if (auth()->user()->store)
                                        <img src="{{ asset(auth()->user()->store->banner ? 'uploads/store_banners/' . auth()->user()->store->banner : 'assets/img/store/banner.jpg') }}" 
                                            alt="Store Banner" id="bannerPreview">
                                    @else
                                        <img src="{{ asset('assets/img/store/banner.jpg') }}" alt="Default Store Banner" id="bannerPreview">
                                    @endif
                                    <div class="upload-overlay">
                                        <i class="fas fa-camera"></i>
                                        <span>Changer la bannière</span>
                                    </div>
                                </div>
                                <input type="file" class="file-input" name="banner" id="bannerInput" accept="image/*">
                                @error('banner')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Shop Details -->
                            <div class="form-group">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-input" value="{{ auth()->user()->store->store_name ?? '' }}" 
                                    placeholder="Nom" name="store_name">
                                @error('store_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="store_email" class="form-input" 
                                    value="{{ auth()->user()->store->store_email ?? '' }}" placeholder="Email">
                                @error('store_email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Lien Facebook</label>
                                    <input type="text" class="form-input" placeholder="https://www.facebook.com" 
                                        name="fb_link" value="{{ auth()->user()->store->fb_link ?? '' }}">
                                    @error('fb_link')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Lien de site Web</label>
                                    <input type="text" name="site_web_link" class="form-input" 
                                        placeholder="https://www.site-web.com" value="{{ auth()->user()->store->site_link ?? '' }}">
                                    @error('site_web_link')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Sauvegarder Changements
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Modern Profile Dashboard Styles */
        .dashboard-header {
            margin-bottom: 2rem;
        }
        
        .dashboard-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .dashboard-subtitle {
            font-size: 1.1rem;
            color: #7f8c8d;
        }
        
        .modern-profile-container {
            padding: 1rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        @media (min-width: 992px) {
            .profile-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .profile-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s ease;
            margin-bottom: 2rem;
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            padding: 1.5rem 1.5rem 0;
        }
        
        .card-icon {
            font-size: 1.5rem;
            color: #3498db;
            margin-right: 1rem;
        }
        
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .alert-modern {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            border: none;
        }
        
        .alert-modern i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
        }
        
        .error-list {
            margin: 0;
            padding-left: 1.5rem;
        }
        
        .profile-form, .shop-form {
            margin-top: 1rem;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        
        .form-input, .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }
        
        .error-message {
            display: block;
            margin-top: 0.5rem;
            color: #e74c3c;
            font-size: 0.85rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .btn-primary i {
            margin-right: 0.5rem;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }
        
        /* Upload Styles */
        .upload-group {
            margin-bottom: 2rem;
        }
        
        .upload-preview {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .logo-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        
        .banner-preview {
            width: 100%;
            height: 180px;
            margin-bottom: 1rem;
        }
        
        .upload-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .upload-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .upload-overlay i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .upload-preview:hover .upload-overlay {
            opacity: 1;
        }
        
        .file-input {
            display: none;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .form-row {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>

    <script>
        // Image Upload Preview
        document.addEventListener('DOMContentLoaded', function() {
            // Logo preview
            const logoInput = document.getElementById('logoInput');
            const logoPreview = document.getElementById('logoPreview');
            
            if (logoInput && logoPreview) {
                logoInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            logoPreview.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
            
            // Banner preview
            const bannerInput = document.getElementById('bannerInput');
            const bannerPreview = document.getElementById('bannerPreview');
            
            if (bannerInput && bannerPreview) {
                bannerInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            bannerPreview.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
            
            // Click event for upload areas
            document.querySelectorAll('.upload-preview').forEach(preview => {
                preview.addEventListener('click', function() {
                    const inputId = this.classList.contains('logo-preview') ? 'logoInput' : 'bannerInput';
                    document.getElementById(inputId).click();
                });
            });
        });

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode == 43 || (charCode >= 48 && charCode <= 57))
                return true;
            return false;
        }
    </script>
@endsection