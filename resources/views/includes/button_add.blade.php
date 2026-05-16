<style>
.btn-primary-custom {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--color-main) 0%, var(--color-main) 100%);
    color: #fff !important;
    padding: 10px 28px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(0, 106, 254, 0.18);
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.btn-primary-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}
.btn-primary-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(0, 106, 254, 0.22);
    color: #fff;
    text-decoration: none;
}
.btn-primary-custom:hover::before {
    left: 100%;
}
.btn-primary-custom i {
    transition: transform 0.3s ease;
}
.btn-primary-custom:hover i {
    transform: translateX(5px);
}
@media (max-width: 768px) {
    .btn-primary-custom {
        padding: 9px 20px;
        font-size: 14px;
    }
}
@media (max-width: 480px) {
    .btn-primary-custom {
        padding: 8px 14px;
        font-size: 13px;
    }
}
</style>
@if (auth()->guard("service_user")->check())
    <a href="{{ route('service_show_add') }}" class="btn-primary-custom"><i class="fas fa-plus"></i>
        Ajouter Annonce</a>
@elseif (auth()->guard('classified_user')->check())
    <a href="{{ route('show_add') }}" class="btn-primary-custom"> <i class="fas fa-plus"></i>
        Ajouter Annonce</a>
@elseif (Auth::check())
    @if (auth()->user()->is_admin)
        <a href="{{ route('get_add_property') }}" class="btn-primary-custom"> <i class="fas fa-plus"></i>
            Ajouter Annonce</a>
    @else
        <li class="nav-item" id="log_out">
            <a class="nav-link" href="{{ route('profile_annonceur_immobilier') }}"><i class="fas fa-user"></i>
                Dashboard</a>
        </li>
        <a href="{{ route('get_add_property') }}" class="btn-primary-custom"> <i class="fas fa-plus"></i>
            Ajouter Annonce</a>
    @endif
@endif

