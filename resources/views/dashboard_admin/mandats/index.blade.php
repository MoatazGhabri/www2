@extends('layouts.dashboard')
@section('pageTitle')
    Liste de mandats de vente et location
@endsection
@section('content')
<style>
    .mandats-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
        margin-top: 24px;
        padding: 0 24px;
    }
    
    .mandat-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-left: 4px solid #667eea;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .mandat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .mandat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.2);
    }
    
    .mandat-card-header {
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .mandat-owner {
        font-weight: 700;
        font-size: 1.3rem;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .mandat-phone {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #6c757d;
        font-size: 1rem;
    }
    
    .mandat-phone i {
        color: #667eea;
        font-size: 1.1rem;
    }
    
    .mandat-category {
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }
    
    .mandat-location {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #495057;
        font-size: 1rem;
        font-weight: 500;
    }
    
    .mandat-location i {
        color: #667eea;
        font-size: 1.1rem;
    }
    
    .mandat-status-indicator {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .status-active {
        background: #28a745;
    }
    
    .status-expired {
        background: #dc3545;
    }
    
    .status-pending {
        background: #ffc107;
    }
    
    .mandats-header {
        padding: 24px 32px 0 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 24px;
    }
    
    .mandats-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        flex: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .mandats-header .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .mandats-header .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .search-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        margin-top: 20px;
        padding: 0 24px;
    }
    
    .search-form {
        max-width: 400px;
        width: 100%;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 14px 20px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fff;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .search-btn {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .search-btn:hover {
        transform: translateY(-50%) scale(1.05);
    }
    
    .clear-search-btn {
        background: #6c757d;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        margin-left: 12px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    
    .clear-search-btn:hover {
        background: #495057;
        color: white;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .search-results-info {
        text-align: center;
        margin: 16px 24px;
        padding: 12px 20px;
        background: #e3f2fd;
        border-radius: 8px;
        color: #1976d2;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .search-results-info i {
        color: #1976d2;
    }
    
    .table-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 16px;
        margin-bottom: 20px;
        margin: 0 24px 20px 24px;
    }
    
    .stat-item {
        background: white;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-left: 3px solid;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .stat-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(0,0,0,0.15);
    }
    
    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
    }
    
    .stat-item.total::before {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .stat-item.active::before {
        background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    }
    
    .stat-item.expired::before {
        background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 100%);
    }
    
    .stat-item.expiring::before {
        background: linear-gradient(135deg, #ffc107 0%, #ffdb4d 100%);
    }
    
    .stat-item.total {
        border-left-color: #667eea;
    }
    
    .stat-item.active {
        border-left-color: #28a745;
    }
    
    .stat-item.expired {
        border-left-color: #dc3545;
    }
    
    .stat-item.expiring {
        border-left-color: #ffc107;
    }
    
    .stat-icon {
        font-size: 1.8rem;
        margin-bottom: 12px;
        display: block;
    }
    
    .stat-item.total .stat-icon {
        color: #667eea;
    }
    
    .stat-item.active .stat-icon {
        color: #28a745;
    }
    
    .stat-item.expired .stat-icon {
        color: #dc3545;
    }
    
    .stat-item.expiring .stat-icon {
        color: #ffc107;
    }
    
    .stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        display: block;
        margin-bottom: 6px;
        color: #2c3e50;
    }
    
    .stat-label {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
    }
    
    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 10000;
        backdrop-filter: blur(5px);
    }
    
    .modal-content {
        background: white;
        border-radius: 20px;
        padding: 32px;
        max-width: 600px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        animation: modalSlideIn 0.3s ease-out;
    }
    
    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 2px solid #e9ecef;
    }
    
    .modal-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
    }
    
    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #6c757d;
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: all 0.3s ease;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .modal-close:hover {
        background: #f8f9fa;
        color: #495057;
    }
    
    .modal-body {
        margin-bottom: 24px;
    }
    
    .detail-row {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 16px;
        margin-bottom: 16px;
        padding: 12px 0;
        border-bottom: 1px solid #f8f9fa;
    }
    
    .detail-label {
        font-weight: 600;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }
    
    .detail-value {
        font-weight: 500;
        color: #2c3e50;
        font-size: 1rem;
    }
    
    .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        padding-top: 20px;
        border-top: 2px solid #e9ecef;
    }
    
    .action-btn {
        padding: 12px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: white;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        color: white;
        text-decoration: none;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .btn-delete {
        background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
        grid-column: 1 / -1;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #dee2e6;
        margin-bottom: 20px;
    }
    
    .empty-state h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #495057;
    }
    
    .empty-state p {
        font-size: 1.1rem;
        color: #6c757d;
    }
    
    @media (max-width: 768px) {
        .mandats-container {
            grid-template-columns: 1fr;
            padding: 0 16px;
        }
        
        .mandats-header {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
            padding: 16px 16px 0 16px;
        }
        
        .mandats-header h1 {
            font-size: 1.5rem;
            margin-bottom: 16px;
        }
        
        .search-container {
            padding: 0 16px;
        }
        
        .table-stats {
            margin: 0 16px 20px 16px;
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .modal-content {
            padding: 24px;
            margin: 20px;
        }
        
        .detail-row {
            grid-template-columns: 1fr;
            gap: 8px;
        }
        
        .modal-actions {
            flex-direction: column;
        }
    }
</style>

<div class="mandats-header">
    <h1>Liste des mandats de vente et location</h1>
    <a href="{{ route('admin.mandats.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter un mandat
    </a>
</div>

<!-- Table Statistics -->
<div class="table-stats">
    <div class="stat-item total">
        <i class="fas fa-file-contract stat-icon"></i>
        <span class="stat-number">{{ $mandats->count() }}</span>
        <span class="stat-label">Total Mandats</span>
    </div>
    <div class="stat-item active">
        <i class="fas fa-check-circle stat-icon"></i>
        <span class="stat-number">{{ $mandats->where('end_date', '>=', now())->count() }}</span>
        <span class="stat-label">Actifs</span>
    </div>
    <div class="stat-item expired">
        <i class="fas fa-times-circle stat-icon"></i>
        <span class="stat-number">{{ $mandats->where('end_date', '<', now())->count() }}</span>
        <span class="stat-label">Expirés</span>
    </div>
    <div class="stat-item expiring">
        <i class="fas fa-exclamation-triangle stat-icon"></i>
        <span class="stat-number">{{ $mandats->where('end_date', '>=', now())->where('end_date', '<=', now()->addDays(30))->count() }}</span>
        <span class="stat-label">Expirent bientôt</span>
    </div>
</div>

<div class="search-container">
    <form action="{{ route('admin.mandats.index') }}" method="GET" class="search-form">
        <input type="text" name="owner_name" value="{{ request('owner_name') }}" placeholder="Rechercher par nom du propriétaire..." class="search-input">
        <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
    @if(request('owner_name'))
        <a href="{{ route('admin.mandats.index') }}" class="clear-search-btn">
            <i class="fas fa-times"></i> Effacer la recherche
        </a>
    @endif
</div>

@if(request('owner_name'))
    <div class="search-results-info">
        <i class="fas fa-search"></i>
        Recherche pour "{{ request('owner_name') }}" - {{ $mandats->count() }} résultat(s) trouvé(s)
    </div>
@endif

<!-- Mandats Container -->
<div class="mandats-container">
    @forelse($mandats as $mandat)
    @php
        $isExpired = $mandat->end_date < now();
        $expiresSoon = $mandat->end_date >= now() && $mandat->end_date <= now()->addDays(30);
        $statusClass = $isExpired ? 'status-expired' : ($expiresSoon ? 'status-pending' : 'status-active');
    @endphp
    <div class="mandat-card" onclick="openMandatModal({{ $mandat->id }})">
        <div class="mandat-status-indicator {{ $statusClass }}"></div>
        <div class="mandat-card-header">
            <div class="mandat-owner">{{ $mandat->owner_name }}</div>
            <div class="mandat-phone">
                <i class="fas fa-phone"></i>
                {{ $mandat->phone_number }}
            </div>
        </div>
        <div class="mandat-category">{{ $mandat->category }}</div>
        <div class="mandat-location">
            <i class="fas fa-map-marker-alt"></i>
            {{ $mandat->location }}
        </div>
    </div>
    @empty
    <div class="empty-state">
        <i class="fas fa-file-contract"></i>
        <h3>Aucun mandat trouvé</h3>
        <p>Commencez par ajouter votre premier mandat de vente ou de location.</p>
    </div>
    @endforelse
</div>

<!-- Modal -->
<div class="modal-overlay" id="mandatModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="modalTitle">Détails du Mandat</h2>
            <button class="modal-close" onclick="closeMandatModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Modal content will be populated by JavaScript -->
        </div>
        <div class="modal-actions" id="modalActions">
            <!-- Action buttons will be populated by JavaScript -->
        </div>
    </div>
</div>

<script>
// Store mandat data for modal
const mandatsData = @json($mandats);

function openMandatModal(mandatId) {
    const mandat = mandatsData.find(m => m.id === mandatId);
    if (!mandat) return;
    
    // Populate modal title
    document.getElementById('modalTitle').textContent = `Mandat - ${mandat.owner_name}`;
    
    // Populate modal body
    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
        <div class="detail-row">
            <div class="detail-label">Propriétaire</div>
            <div class="detail-value">${mandat.owner_name}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Téléphone</div>
            <div class="detail-value">${mandat.phone_number}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Catégorie</div>
            <div class="detail-value">${mandat.category}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Lieu</div>
            <div class="detail-value">${mandat.location}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Date début</div>
            <div class="detail-value">${formatDate(mandat.start_date)}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Date fin</div>
            <div class="detail-value">${formatDate(mandat.end_date)}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Type</div>
            <div class="detail-value">${mandat.type}</div>
        </div>
        ${mandat.observations ? `
        <div class="detail-row">
            <div class="detail-label">Observations</div>
            <div class="detail-value">${mandat.observations}</div>
        </div>
        ` : ''}
    `;
    
    // Populate modal actions
    const modalActions = document.getElementById('modalActions');
    modalActions.innerHTML = `
        <a href="/admin/mandats/${mandat.id}/edit" class="action-btn btn-edit">
            <i class="fas fa-edit"></i> Modifier
        </a>
        <form action="/admin/mandats/${mandat.id}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce mandat ?');">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="action-btn btn-delete">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
    `;
    
    // Show modal
    document.getElementById('mandatModal').style.display = 'flex';
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function closeMandatModal() {
    document.getElementById('mandatModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
}

// Close modal when clicking outside
document.getElementById('mandatModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeMandatModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeMandatModal();
    }
});
</script>
@endsection 