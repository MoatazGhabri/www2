@extends('layouts.dashboard')
@section('pageTitle')
    Liste Suivi de Prospect et Contact
@endsection
@section('content')
<style>
    .prospects-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 20px;
        margin-top: 24px;
        padding: 0 24px;
    }
    
    .prospect-card {
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
    
    .prospect-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .prospect-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(102, 126, 234, 0.2);
    }
    
    .prospect-card-header {
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .prospect-name {
        font-weight: 700;
        font-size: 1.3rem;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .prospect-phone {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #6c757d;
        font-size: 1rem;
        margin-bottom: 8px;
    }
    
    .prospect-phone i {
        color: #667eea;
        font-size: 1.1rem;
    }
    
    .prospect-email {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #6c757d;
        font-size: 0.95rem;
    }
    
    .prospect-email i {
        color: #667eea;
        font-size: 1rem;
    }
    
    .prospect-source {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }
    
    .badge-blue { background: #e6f0ff; color: #2563eb; }
    .badge-pink { background: #ffe6fa; color: #c2185b; }
    .badge-green { background: #e6f9e6; color: #1a7f37; }
    .badge-red { background: #ffeaea; color: #d32f2f; }
    .badge-darkblue { background: #e6eaff; color: #223a5e; }
    .badge-yellow { background: #fffbe6; color: #b59f00; }
    .badge-gray { background: #f2f2f2; color: #888; }
    
    .prospect-interaction {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #495057;
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 8px;
    }
    
    .prospect-interaction i {
        color: #667eea;
        font-size: 1rem;
    }
    
    .prospect-demand {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #495057;
        font-size: 0.95rem;
        font-weight: 500;
    }
    
    .prospect-demand i {
        color: #667eea;
        font-size: 1rem;
    }
    
    .prospect-status-indicator {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .status-high {
        background: #28a745;
    }
    
    .status-medium {
        background: #ffc107;
    }
    
    .status-low {
        background: #dc3545;
    }
    
    .prospects-header {
        padding: 24px 32px 0 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 24px;
    }
    
    .prospects-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        flex: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .prospects-header .btn-primary {
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
    
    .prospects-header .btn-primary:hover {
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
    
    .stat-item.high::before {
        background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
    }
    
    .stat-item.medium::before {
        background: linear-gradient(135deg, #ffc107 0%, #ffdb4d 100%);
    }
    
    .stat-item.low::before {
        background: linear-gradient(135deg, #dc3545 0%, #ff6b6b 100%);
    }
    
    .stat-item.total {
        border-left-color: #667eea;
    }
    
    .stat-item.high {
        border-left-color: #28a745;
    }
    
    .stat-item.medium {
        border-left-color: #ffc107;
    }
    
    .stat-item.low {
        border-left-color: #dc3545;
    }
    
    .stat-icon {
        font-size: 1.8rem;
        margin-bottom: 12px;
        display: block;
    }
    
    .stat-item.total .stat-icon {
        color: #667eea;
    }
    
    .stat-item.high .stat-icon {
        color: #28a745;
    }
    
    .stat-item.medium .stat-icon {
        color: #ffc107;
    }
    
    .stat-item.low .stat-icon {
        color: #dc3545;
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
        max-width: 700px;
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
        .prospects-container {
            grid-template-columns: 1fr;
            padding: 0 16px;
        }
        
        .prospects-header {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
            padding: 16px 16px 0 16px;
        }
        
        .prospects-header h1 {
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

<div class="prospects-header">
    <h1>Liste Suivi de Prospect et Contact</h1>
    <a href="{{ route('admin.prospect_contacts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter un prospect
    </a>
</div>

<!-- Table Statistics -->
<div class="table-stats">
    <div class="stat-item total">
        <i class="fas fa-users stat-icon"></i>
        <span class="stat-number">{{ $prospects->count() }}</span>
        <span class="stat-label">Total Prospects</span>
    </div>
    <div class="stat-item high">
        <i class="fas fa-chart-line stat-icon"></i>
        <span class="stat-number">{{ $prospects->where('client_interaction', 'Haute')->count() }}</span>
        <span class="stat-label">Interaction Haute</span>
    </div>
    <div class="stat-item medium">
        <i class="fas fa-chart-line stat-icon"></i>
        <span class="stat-number">{{ $prospects->where('client_interaction', 'Moyenne')->count() }}</span>
        <span class="stat-label">Interaction Moyenne</span>
    </div>
    <div class="stat-item low">
        <i class="fas fa-chart-line stat-icon"></i>
        <span class="stat-number">{{ $prospects->where('client_interaction', 'Faible')->count() }}</span>
        <span class="stat-label">Interaction Faible</span>
    </div>
</div>

<div class="search-container">
    <form action="{{ route('admin.prospect_contacts.index') }}" method="GET" class="search-form">
        <input type="text" name="client_name" value="{{ request('client_name') }}" placeholder="Rechercher par nom du client..." class="search-input">
        <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
    @if(request('client_name'))
        <a href="{{ route('admin.prospect_contacts.index') }}" class="clear-search-btn">
            <i class="fas fa-times"></i> Effacer la recherche
        </a>
    @endif
</div>

@if(request('client_name'))
    <div class="search-results-info">
        <i class="fas fa-search"></i>
        Recherche pour "{{ request('client_name') }}" - {{ $prospects->count() }} résultat(s) trouvé(s)
    </div>
@endif

<!-- Prospects Container -->
<div class="prospects-container">
    @forelse($prospects as $prospect)
    @php
        $interactionLevel = $prospect->client_interaction ?? 'Faible';
        $statusClass = $interactionLevel === 'Haute' ? 'status-high' : ($interactionLevel === 'Moyenne' ? 'status-medium' : 'status-low');
        $source = strtolower($prospect->prospect_source ?? 'autre');
        $sourceClass = match($source) {
            'appel téléphonique' => 'badge-blue',
            'visite à l\'agence' => 'badge-pink',
            'instagram' => 'badge-green',
            'facebook' => 'badge-darkblue',
            'site web' => 'badge-yellow',
            default => 'badge-gray'
        };
    @endphp
    <div class="prospect-card" onclick="openProspectModal({{ $prospect->id }})">
        <div class="prospect-status-indicator {{ $statusClass }}"></div>
        <div class="prospect-card-header">
            <div class="prospect-name">{{ $prospect->client_name }}</div>
            <div class="prospect-phone">
                <i class="fas fa-phone"></i>
                {{ $prospect->phone_number }}
            </div>
            <div class="prospect-email">
                <i class="fas fa-envelope"></i>
                {{ $prospect->email }}
            </div>
        </div>
        <div class="prospect-source {{ $sourceClass }}">
            {{ $prospect->prospect_source ?? 'Autre Source' }}
        </div>
        <div class="prospect-interaction">
            <i class="fas fa-chart-line"></i>
            Interaction: {{ $interactionLevel }}
        </div>
        <div class="prospect-demand">
            <i class="fas fa-home"></i>
            {{ $prospect->demand_reference ?: 'Aucune référence' }}
        </div>
    </div>
    @empty
    <div class="empty-state">
        <i class="fas fa-users"></i>
        <h3>Aucun prospect trouvé</h3>
        <p>Commencez par ajouter votre premier prospect ou contact.</p>
    </div>
    @endforelse
</div>

<!-- Modal -->
<div class="modal-overlay" id="prospectModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="modalTitle">Détails du Prospect</h2>
            <button class="modal-close" onclick="closeProspectModal()">
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
// Store prospect data for modal
const prospectsData = @json($prospects);

// Helper function to get interaction badge class
function getInteractionBadgeClass(interaction) {
    switch(interaction) {
        case 'Haute':
            return 'badge-green';
        case 'Moyenne':
            return 'badge-yellow';
        case 'Faible':
            return 'badge-red';
        default:
            return 'badge-gray';
    }
}

function openProspectModal(prospectId) {
    const prospect = prospectsData.find(p => p.id === prospectId);
    if (!prospect) return;
    
    // Populate modal title
    document.getElementById('modalTitle').textContent = `Prospect - ${prospect.client_name}`;
    
    // Populate modal body
    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
        <div class="detail-row">
            <div class="detail-label">Nom du Client</div>
            <div class="detail-value">${prospect.client_name}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Source du Prospect</div>
            <div class="detail-value">${prospect.prospect_source || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Numéro de téléphone</div>
            <div class="detail-value">${prospect.phone_number}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Adresse E-Mail</div>
            <div class="detail-value">${prospect.email || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Date Premier Appel</div>
            <div class="detail-value">${prospect.first_call_date || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Référence Bien de la demande</div>
            <div class="detail-value">${prospect.demand_reference || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Interaction du Client</div>
            <div class="detail-value">
                ${prospect.client_interaction ? 
                    `<span class="badge ${getInteractionBadgeClass(prospect.client_interaction)}">${prospect.client_interaction}</span>` : 
                    'Non spécifié'
                }
            </div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Références autres Biens Proposés</div>
            <div class="detail-value">${prospect.other_properties_reference || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Interaction du client (autres biens)</div>
            <div class="detail-value">
                ${prospect.other_interaction ? 
                    `<span class="badge ${getInteractionBadgeClass(prospect.other_interaction)}">${prospect.other_interaction}</span>` : 
                    'Non spécifié'
                }
            </div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Dates autres appels du client</div>
            <div class="detail-value">${prospect.other_call_dates || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Action de suivi à faire</div>
            <div class="detail-value">${prospect.followup_action || 'Non spécifié'}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">A Rappeler le</div>
            <div class="detail-value">${prospect.remind_at || 'Non spécifié'}</div>
        </div>
    `;
    
    // Populate modal actions
    const modalActions = document.getElementById('modalActions');
    modalActions.innerHTML = `
        <a href="/admin/prospect_contacts/${prospect.id}/edit" class="action-btn btn-edit">
            <i class="fas fa-edit"></i> Modifier
        </a>
        <form action="/admin/prospect_contacts/${prospect.id}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce prospect ?');">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="action-btn btn-delete">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
    `;
    
    // Show modal
    document.getElementById('prospectModal').style.display = 'flex';
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function closeProspectModal() {
    document.getElementById('prospectModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('prospectModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeProspectModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeProspectModal();
    }
});
</script>
@endsection 