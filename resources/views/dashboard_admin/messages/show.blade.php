@extends('layouts.dashboard')

@section('pageTitle')
    Détail du message
@endsection

@section('sectionTitle')
    Détail du message
@endsection

@section('content')
<div class="container-fluid">
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce message ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Détail du message</h4>
                <a href="{{ route('admin.messages') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <h5 class="mb-0">
                            Message de {{ $message->name }}
                            @if($message->isUnread())
                                <span class="badge bg-warning ms-2">Non lu</span>
                            @elseif($message->isRead())
                                <span class="badge bg-success ms-2">Lu</span>
                            @elseif($message->isReplied())
                                <span class="badge bg-info ms-2">Répondu</span>
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Message Details -->
                    <div class="row mb-4">
                        <div class="col-lg-6 col-md-12 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="mb-0">Informations de l'expéditeur</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Nom :</strong></td>
                                            <td>{{ $message->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong></td>
                                            <td>
                                                <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Téléphone :</strong></td>
                                            <td>
                                                <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h6 class="mb-0">Informations du message</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Date d'envoi :</strong></td>
                                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        @if($message->read_at)
                                        <tr>
                                            <td><strong>Lu le :</strong></td>
                                            <td>{{ $message->read_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><strong>Statut :</strong></td>
                                            <td>
                                                @if($message->isUnread())
                                                    <span class="badge bg-warning">Non lu</span>
                                                @elseif($message->isRead())
                                                    <span class="badge bg-success">Lu</span>
                                                @elseif($message->isReplied())
                                                    <span class="badge bg-info">Répondu</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Property Information -->
                    @if($message->property)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">Propriété concernée</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 mb-3">
                                    <h5>{{ $message->property->title }}</h5>
                                    <p class="text-muted mb-2">
                                        <strong>Référence :</strong> {{ $message->property->ref }}<br>
                                        <strong>Localisation :</strong> {{ $message->property->city->name }}, {{ $message->property->area->name }}<br>
                                        <strong>Prix :</strong> 
                                        @if($message->property->price == 0 || $message->property->price == 1)
                                            Prix sur demande
                                        @else
                                            {{ $message->property->price }} DT
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-12 text-center text-lg-end">
                                    <a href="{{ route('prop_info_by_id', $message->property->id) }}" 
                                       class="btn btn-primary" target="_blank">
                                        <i class="fas fa-external-link-alt"></i> Voir l'annonce
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Message Content -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Message</h6>
                        </div>
                        <div class="card-body">
                            <div class="message-content">
                                {!! nl2br(e($message->message)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Actions rapides section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Actions rapides</strong>
                </div>
                <div class="card-body d-flex flex-wrap gap-3 justify-content-start">
                    <a href="mailto:{{ $message->email }}" class="btn action-btn-action" style="background:#1877ff;color:#fff;min-width:270px;">
                        <i class="fas fa-envelope"></i> Répondre par email
                    </a>
                    <a href="tel:{{ $message->phone }}" class="btn action-btn-action" style="background:#179b62;color:#fff;min-width:240px;">
                        <i class="fas fa-phone"></i> Appeler
                    </a>
                    <button type="button" class="btn action-btn-action delete-message-btn" data-message-id="{{ $message->id }}" style="background:#e53935;color:#fff;min-width:240px;">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let messageIdToDelete = null;
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-message-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            messageIdToDelete = this.getAttribute('data-message-id');
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        });
    });
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (!messageIdToDelete) return;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/admin/messages/' + messageIdToDelete, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                window.location.href = '/admin/messages';
                var deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                deleteModal.hide();
            } else {
                alert('Erreur lors de la suppression du message.');
            }
        });
    });
});
</script>
@endpush 

@push('styles')
<style>
    .action-btn-action {
        height: 44px !important;
        font-size: 1.08rem;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-right: 10px;
        margin-bottom: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        padding: 0 22px;
    }
    .action-btn-action:last-child {
        margin-right: 0;
    }
    @media (max-width: 600px) {
        .action-btn-action {
            min-width: 100%;
            margin-right: 0;
        }
        .card-body.d-flex.flex-wrap.gap-3.justify-content-start {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>
@endpush 