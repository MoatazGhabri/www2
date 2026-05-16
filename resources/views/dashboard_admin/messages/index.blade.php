@extends('layouts.dashboard')

@section('pageTitle')
    Messages
@endsection

@section('sectionTitle')
    Messages
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
                <h4 class="mb-0">Messages</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Header with stats -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0">{{ $messages->total() }}</h4>
                                            <p class="mb-0 small">Total Messages</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-envelope fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                            <div class="card bg-warning text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0">{{ $unreadCount }}</h4>
                                            <p class="mb-0 small">Non lus</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-envelope-open fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0">{{ $messages->where('status', 'read')->count() }}</h4>
                                            <p class="mb-0 small">Lus</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-check-circle fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
                            <div class="card bg-info text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0">{{ $messages->where('status', 'replied')->count() }}</h4>
                                            <p class="mb-0 small">Répondu</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-reply fa-lg"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                                <div class="d-flex flex-column flex-sm-row gap-2 w-100">
                                    <select class="form-select" id="status-filter" style="min-width: 150px;">
                                        <option value="">Tous les statuts</option>
                                        <option value="unread">Non lus</option>
                                        <option value="read">Lus</option>
                                        <option value="replied">Répondu</option>
                                    </select>
                                    <button class="btn btn-outline-secondary" onclick="refreshMessages()">
                                        <i class="fas fa-sync-alt"></i> <span class="d-none d-sm-inline">Actualiser</span>
                                    </button>
                                </div>
                                <div class="text-center text-md-end">
                                    <span class="text-muted small">Affichage {{ $messages->firstItem() ?? 0 }} - {{ $messages->lastItem() ?? 0 }} sur {{ $messages->total() }} messages</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messages List -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="d-none d-md-table-cell">
                                        <input type="checkbox" id="select-all" class="form-check-input">
                                    </th>
                                    <th>Statut</th>
                                    <th class="d-none d-lg-table-cell">Expéditeur</th>
                                    <th class="d-none d-md-table-cell">Propriété</th>
                                    <th>Message</th>
                                    <th class="d-none d-lg-table-cell">Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                <tr class="{{ $message->isUnread() ? 'table-warning' : '' }}" data-message-id="{{ $message->id }}">
                                    <td class="d-none d-md-table-cell">
                                        <input type="checkbox" class="form-check-input message-checkbox" value="{{ $message->id }}">
                                    </td>
                                    <td>
                                        @if($message->isUnread())
                                            <span class="badge bg-warning">Non lu</span>
                                        @elseif($message->isRead())
                                            <span class="badge bg-success">Lu</span>
                                        @elseif($message->isReplied())
                                            <span class="badge bg-info">Répondu</span>
                                        @endif
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        <div>
                                            <strong>{{ $message->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $message->email }}</small>
                                            <br>
                                            <small class="text-muted">{{ $message->phone }}</small>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        @if($message->property)
                                            <div>
                                                <strong>{{ $message->property->ref }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $message->property->title }}</small>
                                                <br>
                                                <small class="text-muted">{{ $message->property->city->name }}, {{ $message->property->area->name }}</small>
                                            </div>
                                        @else
                                            <span class="text-muted">Propriété supprimée</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="message-preview">
                                            <div class="d-lg-none mb-2">
                                                <strong>{{ $message->name }}</strong><br>
                                                <small class="text-muted">{{ $message->email }}</small>
                                            </div>
                                            <div class="d-md-none mb-2">
                                                @if($message->property)
                                                    <small class="text-muted">{{ $message->property->ref }}</small>
                                                @endif
                                            </div>
                                            <div class="d-lg-none mb-2">
                                                <small class="text-muted">{{ $message->created_at->format('d/m/Y H:i') }}</small>
                                            </div>
                                            {{ Str::limit($message->message, 100) }}
                                        </div>
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        <div>
                                            <strong>{{ $message->created_at->format('d/m/Y H:i') }}</strong>
                                            @if($message->read_at)
                                                <br>
                                                <small class="text-muted">Lu le {{ $message->read_at->format('d/m/Y H:i') }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm d-md-none" role="group">
                                            <a href="{{ route('admin.messages.show', $message->id) }}" 
                                               class="btn btn-outline-primary btn-sm" 
                                               title="Voir le message">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($message->isUnread())
                                                <button type="button" class="btn btn-outline-success btn-sm mark-read-btn" data-message-id="{{ $message->id }}" title="Marquer comme lu">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            @if($message->isRead() || $message->isReplied())
                                                <button type="button" class="btn btn-outline-info btn-sm mark-replied-btn" data-message-id="{{ $message->id }}" title="Marquer comme répondu">
                                                    <i class="fas fa-reply"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-outline-danger btn-sm delete-message-btn" data-message-id="{{ $message->id }}" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group btn-group-sm d-none d-md-flex" role="group">
                                            <a href="{{ route('admin.messages.show', $message->id) }}" 
                                               class="btn btn-outline-primary btn-sm" 
                                               title="Voir le message">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($message->isUnread())
                                                <button type="button" class="btn btn-outline-success btn-sm mark-read-btn" data-message-id="{{ $message->id }}" title="Marquer comme lu">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            @if($message->isRead() || $message->isReplied())
                                                <button type="button" class="btn btn-outline-info btn-sm mark-replied-btn" data-message-id="{{ $message->id }}" title="Marquer comme répondu">
                                                    <i class="fas fa-reply"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-outline-danger btn-sm delete-message-btn" data-message-id="{{ $message->id }}" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Aucun message trouvé.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function refreshMessages() {
        location.reload();
    }

    let messageIdToDelete = null;
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.mark-read-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var messageId = this.getAttribute('data-message-id');
                var row = this.closest('tr');
                var btnGroup = this.parentElement;
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/admin/messages/' + messageId + '/mark-read', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update badge
                        var badge = row.querySelector('td:nth-child(2) .badge');
                        if (badge) {
                            badge.classList.remove('bg-warning');
                            badge.classList.add('bg-success');
                            badge.textContent = 'Lu';
                        }
                        // Remove the mark as read button
                        this.remove();
                        // Show reply button if not present
                        if (!btnGroup.querySelector('.mark-replied-btn')) {
                            var replyBtn = document.createElement('button');
                            replyBtn.type = 'button';
                            replyBtn.className = 'btn btn-outline-info btn-sm mark-replied-btn';
                            replyBtn.setAttribute('data-message-id', messageId);
                            replyBtn.title = 'Marquer comme répondu';
                            replyBtn.innerHTML = '<i class="fas fa-reply"></i>';
                            btnGroup.insertBefore(replyBtn, btnGroup.querySelector('.btn-outline-danger'));
                            replyBtn.addEventListener('click', markRepliedHandler);
                        }
                        // Remove highlight from row
                        row.classList.remove('table-warning');
                    }
                });
            });
        });
        function markRepliedHandler() {
            var messageId = this.getAttribute('data-message-id');
            var row = this.closest('tr');
            var btnGroup = this.parentElement;
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/admin/messages/' + messageId + '/mark-replied', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update badge
                    var badge = row.querySelector('td:nth-child(2) .badge');
                    if (badge) {
                        badge.classList.remove('bg-success');
                        badge.classList.add('bg-info');
                        badge.textContent = 'Répondu';
                    }
                    // Remove the reply button
                    this.remove();
                }
            });
        }
        document.querySelectorAll('.mark-replied-btn').forEach(function(btn) {
            btn.addEventListener('click', markRepliedHandler);
        });
        // Add delete logic
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
                    var row = document.querySelector('tr[data-message-id="' + messageIdToDelete + '"]');
                    if (row) {
                        row.remove();
                    } else {
                        window.location.href = '/admin/messages';
                    }
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