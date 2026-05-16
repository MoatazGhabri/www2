@extends('layouts.dashboard')

@section('pageTitle')
    Détails du message
@endsection

@section('sectionTitle')
    Détails du message
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Détails du message</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <h5 class="mb-0">
                            Message de {{ $message->sender_name }}
                            @if($message->isUnread())
                                <span class="badge bg-warning ms-2">Non lu</span>
                            @elseif($message->isRead())
                                <span class="badge bg-success ms-2">Lu</span>
                            @elseif($message->isReplied())
                                <span class="badge bg-info ms-2">Répondu</span>
                            @endif
                        </h5>
                        <div class="btn-group-vertical btn-group-sm d-md-none">
                            @if($message->isUnread())
                                <button type="button" class="btn btn-success btn-sm mark-read-btn" data-message-id="{{ $message->id }}">
                                    <i class="fas fa-check"></i> Marquer comme lu
                                </button>
                            @endif
                            @if($message->isRead() && !$message->isReplied())
                                <button type="button" class="btn btn-info btn-sm mark-replied-btn" data-message-id="{{ $message->id }}">
                                    <i class="fas fa-reply"></i> Marquer comme répondu
                                </button>
                            @endif
                            <a href="{{ route('promoteur.messages.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                        </div>
                        <div class="btn-group d-none d-md-flex">
                            @if($message->isUnread())
                                <button type="button" class="btn btn-success btn-sm mark-read-btn" data-message-id="{{ $message->id }}">
                                    <i class="fas fa-check"></i> Marquer comme lu
                                </button>
                            @endif
                            @if($message->isRead() && !$message->isReplied())
                                <button type="button" class="btn btn-info btn-sm mark-replied-btn" data-message-id="{{ $message->id }}">
                                    <i class="fas fa-reply"></i> Marquer comme répondu
                                </button>
                            @endif
                            <a href="{{ route('promoteur.messages.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                        </div>
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
                                            <td>{{ $message->sender_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong></td>
                                            <td>
                                                <a href="mailto:{{ $message->sender_email }}">{{ $message->sender_email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Téléphone :</strong></td>
                                            <td>
                                                <a href="tel:{{ $message->sender_phone }}">{{ $message->sender_phone }}</a>
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
                                            <td>{{ $message->formatted_created_at }}</td>
                                        </tr>
                                        @if($message->read_at)
                                        <tr>
                                            <td><strong>Lu le :</strong></td>
                                            <td>{{ $message->formatted_read_at }}</td>
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
                                        @if($message->property->price_total == 0 || $message->property->price_total == 1)
                                            Prix sur demande
                                        @else
                                            {{ $message->property->price_total }} DT
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-12 text-center text-lg-end">
                                    <a href="{{ route('prop_info_promoteur', $message->property->slug) }}" 
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

                    <!-- Quick Actions -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h6 class="mb-0">Actions rapides</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                                    <a href="mailto:{{ $message->sender_email }}?subject=Réponse à votre message - {{ $message->property ? $message->property->ref : 'Propriété' }}" 
                                       class="btn btn-primary w-100">
                                        <i class="fas fa-envelope"></i> Répondre par email
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                                    <a href="tel:{{ $message->sender_phone }}" 
                                       class="btn btn-success w-100">
                                        <i class="fas fa-phone"></i> Appeler
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                                    <button type="button" class="btn btn-danger w-100 delete-message-btn" 
                                            data-message-id="{{ $message->id }}">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer ce message ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Supprimer</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Mark as read
    $('.mark-read-btn').click(function() {
        const messageId = $(this).data('message-id');
        const btn = $(this);
        
        $.ajax({
            url: '{{ route("promoteur.messages.mark-read", "") }}/' + messageId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $('.badge').removeClass('bg-warning').addClass('bg-success').text('Lu');
                    btn.remove();
                    // Add mark as replied button
                    $('.btn-group').append(`
                        <button type="button" class="btn btn-info btn-sm mark-replied-btn" data-message-id="${messageId}">
                            <i class="fas fa-reply"></i> Marquer comme répondu
                        </button>
                    `);
                }
            }
        });
    });

    // Mark as replied
    $(document).on('click', '.mark-replied-btn', function() {
        const messageId = $(this).data('message-id');
        const btn = $(this);
        
        $.ajax({
            url: '{{ route("promoteur.messages.mark-replied", "") }}/' + messageId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $('.badge').removeClass('bg-success').addClass('bg-info').text('Répondu');
                    btn.remove();
                }
            }
        });
    });

    // Delete message
    $('.delete-message-btn').click(function() {
        const messageId = $(this).data('message-id');
        $('#confirmDelete').data('message-id', messageId);
        $('#deleteModal').modal('show');
    });

    $('#confirmDelete').click(function() {
        const messageId = $(this).data('message-id');
        
        $.ajax({
            url: '{{ route("promoteur.messages.destroy", "") }}/' + messageId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#deleteModal').modal('hide');
                window.location.href = '{{ route("promoteur.messages.index") }}';
            }
        });
    });
});
</script>
@endpush 