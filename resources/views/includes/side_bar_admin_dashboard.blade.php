@php
    $logo = null;
    if (auth()->user()->store) {
        $logo = auth()->user()->store->logo;
    }
    $avatarPath = $logo ? 'uploads/store_logos/' . $logo : 'assets/img/account/user.jpg';
@endphp
<div class="modern-admin-sidebar">
    <div class="sidebar-header">
        <div class="sidebar-user-card">
            <div class="sidebar-avatar">
                <img src="{{ asset($avatarPath) }}" alt="Avatar">
            </div>
            <div class="sidebar-user-info">
                <div class="sidebar-user-name">{{ auth()->user()->username }}</div>
                <div class="sidebar-user-email">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>
    <nav class="sidebar-navigation">
        <div class="nav-section">
            <div class="nav-section-title section-bold">ADMINISTRATION</div>
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('dashboard_admin') ? 'active' : '' }}" href="{{ route('dashboard_admin') }}">
                        <i class="fas fa-tachometer-alt"></i> <span class="nav-link-text">TABLEAU DE BORD</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('profile_annonceur_immobilier') ? 'active' : '' }}" href="{{ route('profile_annonceur_immobilier') }}">
                        <i class="fas fa-user"></i> <span class="nav-link-text">MON COMPTE</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin.messages') ? 'active' : '' }}" href="{{ route('admin.messages') }}">
                        <i class="fas fa-envelope"></i> <span class="nav-link-text">MESSAGERIE</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin.mandats.index') ? 'active' : '' }}" href="{{ route('admin.mandats.index') }}">
                        <i class="fas fa-file-signature"></i> <span class="nav-link-text">MES MANDATS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin.prospect_contacts.index') ? 'active' : '' }}" href="{{ route('admin.prospect_contacts.index') }}">
                        <i class="fas fa-user-friends"></i> <span class="nav-link-text">SUIVI PROSPECTS</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-section">
            <div class="nav-section-title section-bold"> GESTION DES ANNONCES</div>
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin_all_properties') ? 'active' : '' }}" href="{{ route('admin_all_properties') }}">
                        <i class="fas fa-list"></i> <span class="nav-link-text">MES ANNONCES</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin.all_properties_premium') ? 'active' : '' }}" href="{{ route('admin.all_properties_premium') }}">
                        <i class="fas fa-crown"></i> <span class="nav-link-text">A VEDETTES</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-section">
            <div class="nav-section-title section-bold"> CONTENU & MARKETING</div>
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin.all_sliders') ? 'active' : '' }}" href="{{ route('admin.all_sliders') }}">
                        <i class="fas fa-images"></i> <span class="nav-link-text">SLIDERS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('admin.all_service_web') ? 'active' : '' }}" href="{{ route('admin.all_service_web') }}">
                        <i class="fas fa-link"></i> <span class="nav-link-text">LIENS UTILES</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-section nav-section-logout mt-4">
            <ul class="nav-list">
                <li class="nav-item">
                    @csrf 
                    <a class="nav-link logout-link logout-bold" href="{{ route('signout') }}">
                        <i class="fas fa-sign-out-alt"></i> <span class="nav-link-text">SE DÉCONNECTER</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<style>
.modern-admin-sidebar {
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
    padding: 0;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.2);
    min-height: 99vh;
    width: 100%;
    max-width: 290px;
    position: sticky;
    top: 0;
    z-index: 100;
    transition: box-shadow 0.3s, left 0.3s;
}
.sidebar-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 24px 18px 18px 18px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}
.sidebar-user-card {
    display: flex;
    align-items: center;
    gap: 14px;
}
.sidebar-avatar {
    width: 54px;
    height: 54px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid rgba(255,255,255,0.3);
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.sidebar-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.sidebar-user-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.sidebar-user-name {
    font-size: 1.1rem;
    font-weight: 700;
    color: #fff;
}
.sidebar-user-email {
    font-size: 0.97rem;
    color: #e0e7ff;
}
.sidebar-toggle {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.5rem;
    cursor: pointer;
    display: none;
}
@media (max-width: 991px) {
    .modern-admin-sidebar {
        left: 0 !important;
        position: static !important;
        height: auto !important;
        min-height: 0 !important;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
        border-radius: 18px;
        max-width: 290px;
        z-index: 100;
    }
    .sidebar-toggle { display: none !important; }
}
@media (max-width: 991px) {
    .modern-admin-sidebar {
        margin-left: auto !important;
        margin-right: auto !important;
        float: none !important;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
}
.nav-section {
    border: none;
    margin-bottom: 10px;
}
.nav-section:last-child { border-bottom: none; }
.nav-section-title {
    padding: 18px 24px 10px 24px;
    margin: 0;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #6c757d;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    user-select: none;
    transition: background 0.2s;
}
.section-bold {
    font-weight: bold;
    text-transform: uppercase;
    color: #111;
    font-size: 1.08rem;
    margin-top: 18px;
    margin-bottom: 6px;
    letter-spacing: 0.5px;
}
.nav-list {
    list-style: none;
    margin: 0;
    padding: 0;
    margin-bottom: 0;
}
.nav-item {
    margin: 0;
}
.nav-link {
    display: flex;
    align-items: center;
    padding: 10px 24px;
    text-decoration: none;
    color: #222;
    transition: background 0.2s, color 0.2s;
    position: relative;
    font-weight: 500;
    font-size: 1.01rem;
    border-radius: 0;
    margin: 0;
    background: none;
}
.nav-link:hover {
    color: #1877ff;
    background: #f3f6fa;
}
.nav-link.active {
    font-weight: bold;
    color: #1877ff;
    background: #f3f6fa;
    border-left: 3px solid #1877ff;
}
.nav-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 0 4px 4px 0;
}
.nav-icon {
    width: 22px;
    text-align: center;
    margin-right: 14px;
    font-size: 17px;
    transition: all 0.3s;
}
.nav-text {
    flex: 1;
    white-space: nowrap;
}
.nav-badge {
    background: #ef4444;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    border-radius: 8px;
    padding: 2px 7px;
    margin-left: 8px;
    display: none;
}
.logout-link {
    color: #dc3545 !important;
    font-weight: 700;
}
.logout-link:hover {
    background: linear-gradient(90deg, rgba(220, 53, 69, 0.10), transparent);
    color: #c82333 !important;
}
.logout-link .nav-icon { color: inherit; }
.logout-link.logout-bold {
    color: #e53935 !important;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.logout-link.logout-bold:hover {
    background: #ffeaea;
    color: #b71c1c !important;
}
@media (max-width: 768px) {
    .modern-admin-sidebar { border-radius: 0; box-shadow: none; border: none; border-top: 1px solid #e9ecef; }
    .sidebar-header { padding: 16px; }
    .sidebar-avatar { width: 40px; height: 40px; }
    .sidebar-user-name { font-size: 1rem; }
    .nav-link { padding: 10px 16px; font-size: 14px; }
    .nav-section-title { padding: 0 16px 8px; font-size: 11px; }
}
@media (max-width: 991px), (max-width: 768px) {
    .modern-admin-sidebar {
        border-radius: 18px !important;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        min-height: 90vh !important;
        max-width: 290px !important;
        padding: 0 !important;
    }
    .sidebar-header {
        padding: 24px 18px 18px 18px !important;
    }
    .sidebar-avatar {
        width: 54px !important;
        height: 54px !important;
    }
    .sidebar-user-name {
        font-size: 1.1rem !important;
    }
    .nav-link {
        padding: 13px 28px !important;
        font-size: 15px !important;
    }
    .nav-section-title {
        padding: 18px 24px 10px 24px !important;
        font-size: 12px !important;
    }
}
.nav-link-text { margin-left: 10px; }
.nav-section-title i { margin-right: 10px; }
</style>
<script>
function toggleSection(header) {
    const section = header.closest('.collapsible');
    section.classList.toggle('open');
}
// Example: Show a badge for unread messages (replace with AJAX if needed)
document.addEventListener('DOMContentLoaded', function() {
    // Simulate unread count (replace with real AJAX call)
    var unreadCount = 0;
    if (window.adminUnreadMessages !== undefined) unreadCount = window.adminUnreadMessages;
    if (unreadCount > 0) {
        document.getElementById('admin-messages-badge').style.display = 'inline-block';
        document.getElementById('admin-messages-badge').textContent = unreadCount;
    }
});
</script>