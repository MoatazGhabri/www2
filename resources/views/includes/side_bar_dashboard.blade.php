<div class="modern-profile-container">
    <div class="profile-header-section">
        @if (session('message'))
            <div class="success-notification animate-fade-in" role="alert">
                <div class="notification-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="notification-content">
                    {{ session('message') }}
                </div>
                <button class="notification-close" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        <div class="profile-avatar-container">
            <div class="avatar-wrapper"
                style="background-image:url({{ asset(auth()->user()->getLogo() ? 'uploads/store_logos/' .  auth()->user()->getLogo()  : 'assets/img/account/user.jpg') }});">
                <div class="avatar-overlay">
                    <div class="avatar-status-indicator online"></div>
                </div>
            </div>
        </div>

        <div class="profile-identity-section">
            <h3 class="profile-username">
                {{ auth()->user()->username }} 
                @if (auth()->user()->checkType() == 'promoteur')
                    <span class="verified-badge" title="Promoteur">
                        <i class="fas fa-id-badge"></i>
                    </span>
                @endif
            </h3>
            <p class="profile-email">{{ substr(auth()->user()->email, 0, 38) }}</p>
        </div>
    </div>

    <nav class="profile-navigation">
        <ul class="nav-menu-list">
            <li class="nav-menu-item">
                <a class="nav-link {{ Route::currentRouteNamed('dashboard_annonceur_immobilier') ? 'active' : '' }}"
                    href="{{ route('dashboard_annonceur_immobilier') }}">
                    <div class="nav-icon-wrapper">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span class="nav-text">Tableau de bord</span>
                    <div class="nav-indicator"></div>
                </a>
            </li>
            
            <li class="nav-menu-item">
                <a class="nav-link {{ Route::currentRouteNamed('profile_annonceur_immobilier') ? 'active' : '' }}"
                    href="{{ route('profile_annonceur_immobilier') }}">
                    <div class="nav-icon-wrapper">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <span class="nav-text">Mon compte</span>
                    <div class="nav-indicator"></div>
                </a>
            </li>

            @can('isAgent')
                <li class="nav-menu-item">
                    <a class="nav-link {{ Route::currentRouteNamed('all_user_property') ? 'active' : '' }}"
                        href="{{ route('all_user_property') }}">
                        <div class="nav-icon-wrapper">
                            <i class="fas fa-building"></i>
                        </div>
                        <span class="nav-text">Mes annonces</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
                
                <li class="nav-menu-item">
                    <a class="nav-link {{ Route::currentRouteNamed('get_add_property') ? 'active' : '' }}"
                        href="{{ route('get_add_property') }}">
                        <div class="nav-icon-wrapper">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <span class="nav-text">Publier des annonces</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
            @endcan

            @can('isPromoteur')
                <li class="nav-menu-item">
                    <a class="nav-link {{ Route::currentRouteNamed('all_promoteur_property') ? 'active' : '' }}"
                        href="{{ route('all_promoteur_property') }}">
                        <div class="nav-icon-wrapper">
                            <i class="fas fa-city"></i>
                        </div>
                        <span class="nav-text">Mes annonces</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
                
                <li class="nav-menu-item">
                    <a class="nav-link {{ Route::currentRouteNamed('promoteur.messages.index') ? 'active' : '' }}"
                        href="{{ route('promoteur.messages.index') }}">
                        <div class="nav-icon-wrapper">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span class="nav-text">Messages</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
                
                <li class="nav-menu-item">
                    <a class="nav-link {{ Route::currentRouteNamed('get_add_property') ? 'active' : '' }}"
                        href="{{ route('get_add_property') }}">
                        <div class="nav-icon-wrapper">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <span class="nav-text">Publier des annonces</span>
                        <div class="nav-indicator"></div>
                    </a>
                </li>
            @endcan

            <li class="nav-menu-item">
                <a class="nav-link {{ Route::currentRouteNamed('user_favories') ? 'active' : '' }}" 
                    href="{{ route('user_favories') }}">
                    <div class="nav-icon-wrapper">
                        <i class="fas fa-heart"></i>
                    </div>
                    <span class="nav-text">Mes favoris</span>
                    <div class="nav-indicator"></div>
                </a>
            </li>
            
            <li class="nav-menu-item nav-divider">
                <div class="divider-line"></div>
            </li>
            
            <li class="nav-menu-item">
                @csrf 
                <a class="nav-link logout-link" href="{{ route('signout') }}">
                    <div class="nav-icon-wrapper">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <span class="nav-text">Se déconnecter</span>
                    <div class="nav-indicator"></div>
                </a>
            </li>
        </ul>
    </nav>
</div>

<style>
.modern-profile-container {
    background: linear-gradient(135deg, #667eea 0%,rgb(61, 78, 112) 100%);
    border-radius: 20px;
    padding: 0;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.modern-profile-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
    pointer-events: none;
}

.profile-header-section {
    padding: 2rem;
    text-align: center;
    position: relative;
    z-index: 2;
}

.success-notification {
    background: rgba(16, 185, 129, 0.9);
    color: white;
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
}

.notification-icon {
    font-size: 1.2rem;
    opacity: 0.9;
}

.notification-content {
    flex: 1;
    font-weight: 500;
}

.notification-close {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    padding: 0.25rem;
    border-radius: 50%;
    transition: all 0.2s ease;
}

.notification-close:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.animate-fade-in {
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.profile-avatar-container {
    margin-bottom: 1.5rem;
}

.avatar-wrapper {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0 auto;
    position: relative;
    border: 4px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.avatar-wrapper:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
}

.avatar-overlay {
    position: absolute;
    bottom: 5px;
    right: 5px;
}

.avatar-status-indicator {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.avatar-status-indicator.online {
    background: #10b981;
}

.profile-identity-section {
    color: white;
}

.profile-username {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.verified-badge {
    background: rgba(59, 130, 246, 0.9);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.profile-email {
    font-size: 0.9rem;
    opacity: 0.8;
    margin: 0;
    font-weight: 400;
}

.profile-navigation {
    padding: 0 1rem 1rem;
    position: relative;
    z-index: 2;
}

.nav-menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-menu-item {
    margin-bottom: 0.25rem;
}

.nav-menu-item.nav-divider {
    margin: 1rem 0;
    display: flex;
    justify-content: center;
}

.divider-line {
    width: 60%;
    height: 1px;
    background: rgba(255, 255, 255, 0.2);
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 0.875rem 1rem;
    text-decoration: none;
    color: rgba(255, 255, 255, 0.8);
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-weight: 500;
    gap: 0.75rem;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: all 0.5s ease;
}

.nav-link:hover::before {
    left: 100%;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(5px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.nav-link.active {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.nav-link.active .nav-indicator {
    background: white;
    transform: scale(1);
}

.nav-link.logout-link:hover {
    background: rgba(239, 68, 68, 0.2);
    color: #fca5a5;
}

.nav-icon-wrapper {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.nav-text {
    flex: 1;
    font-size: 0.95rem;
}

.nav-indicator {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: transparent;
    transition: all 0.3s ease;
    transform: scale(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .modern-profile-container {
        border-radius: 12px;
    }
    
    .profile-header-section {
        padding: 1.5rem;
    }
    
    .avatar-wrapper {
        width: 80px;
        height: 80px;
    }
    
    .profile-username {
        font-size: 1.25rem;
    }
    
    .nav-link {
        padding: 0.75rem;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .modern-profile-container {
        background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
    }
}

/* Animations */
.nav-link {
    animation: slideInLeft 0.5s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.nav-menu-item:nth-child(1) .nav-link { animation-delay: 0.1s; }
.nav-menu-item:nth-child(2) .nav-link { animation-delay: 0.2s; }
.nav-menu-item:nth-child(3) .nav-link { animation-delay: 0.3s; }
.nav-menu-item:nth-child(4) .nav-link { animation-delay: 0.4s; }
.nav-menu-item:nth-child(5) .nav-link { animation-delay: 0.5s; }
.nav-menu-item:nth-child(6) .nav-link { animation-delay: 0.6s; }
.nav-menu-item:nth-child(7) .nav-link { animation-delay: 0.7s; }

/* Glassmorphism effect */
.modern-profile-container {
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}

/* Hover effects for better interactivity */
.nav-link:active {
    transform: translateX(3px) scale(0.98);
}

/* Custom scrollbar if needed */
.profile-navigation::-webkit-scrollbar {
    width: 4px;
}

.profile-navigation::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 2px;
}

.profile-navigation::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 2px;
}

.profile-navigation::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>