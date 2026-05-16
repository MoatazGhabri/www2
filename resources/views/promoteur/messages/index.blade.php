@extends('layouts.dashboard')

@section('pageTitle')
    Messages
@endsection

@section('sectionTitle')
    Messages
@endsection

@section('content')
<div class="container-fluid">
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
                                            <strong>{{ $message->sender_name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $message->sender_email }}</small>
                                            <br>
                                            <small class="text-muted">{{ $message->sender_phone }}</small>
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
                                                <strong>{{ $message->sender_name }}</strong><br>
                                                <small class="text-muted">{{ $message->sender_email }}</small>
                                            </div>
                                            <div class="d-md-none mb-2">
                                                @if($message->property)
                                                    <small class="text-muted">{{ $message->property->ref }}</small>
                                                @endif
                                            </div>
                                            <div class="d-lg-none mb-2">
                                                <small class="text-muted">{{ $message->formatted_created_at }}</small>
                                            </div>
                                            {{ Str::limit($message->message, 100) }}
                                        </div>
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        <div>
                                            <strong>{{ $message->formatted_created_at }}</strong>
                                            @if($message->read_at)
                                                <br>
                                                <small class="text-muted">Lu le {{ $message->formatted_read_at }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group-vertical btn-group-sm d-md-none" role="group">
                                            <a href="{{ route('promoteur.messages.show', $message->id) }}" 
                                               class="btn btn-outline-primary btn-sm" 
                                               title="Voir le message">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($message->isUnread())
                                                <button type="button" 
                                                        class="btn btn-outline-success btn-sm mark-read-btn" 
                                                        data-message-id="{{ $message->id }}"
                                                        title="Marquer comme lu">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            @if($message->isRead() && !$message->isReplied())
                                                <button type="button" 
                                                        class="btn btn-outline-info btn-sm mark-replied-btn" 
                                                        data-message-id="{{ $message->id }}"
                                                        title="Marquer comme répondu">
                                                    <i class="fas fa-reply"></i>
                                                </button>
                                            @endif
                                            <button type="button" 
                                                    class="btn btn-outline-danger btn-sm delete-message-btn" 
                                                    data-message-id="{{ $message->id }}"
                                                    title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group d-none d-md-flex" role="group">
                                            <a href="{{ route('promoteur.messages.show', $message->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Voir le message">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($message->isUnread())
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-success mark-read-btn" 
                                                        data-message-id="{{ $message->id }}"
                                                        title="Marquer comme lu">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                            @if($message->isRead() && !$message->isReplied())
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-info mark-replied-btn" 
                                                        data-message-id="{{ $message->id }}"
                                                        title="Marquer comme répondu">
                                                    <i class="fas fa-reply"></i>
                                                </button>
                                            @endif
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger delete-message-btn" 
                                                    data-message-id="{{ $message->id }}"
                                                    title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-inbox fa-3x mb-3"></i>
                                            <h5>Aucun message trouvé</h5>
                                            <p>Vous n'avez pas encore reçu de messages.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($messages->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $messages->links() }}
                        </div>
                    @endif

                    <!-- Bulk Actions -->
                    <div class="row mt-3" id="bulk-actions" style="display: none;">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Actions groupées</h6>
                                    <div class="d-flex flex-column flex-sm-row gap-2">
                                        <button type="button" class="btn btn-success btn-sm" onclick="bulkMarkAsRead()">
                                            <i class="fas fa-check"></i> Marquer comme lu
                                        </button>
                                        <button type="button" class="btn btn-info btn-sm" onclick="bulkMarkAsReplied()">
                                            <i class="fas fa-reply"></i> Marquer comme répondu
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="bulkDelete()">
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
                <p>Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible.</p>
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
    // Select all functionality
    $('#select-all').change(function() {
        $('.message-checkbox').prop('checked', $(this).is(':checked'));
        toggleBulkActions();
    });

    $('.message-checkbox').change(function() {
        toggleBulkActions();
        updateSelectAll();
    });

    function toggleBulkActions() {
        const checkedCount = $('.message-checkbox:checked').length;
        $('#bulk-actions').toggle(checkedCount > 0);
    }

    function updateSelectAll() {
        const totalCheckboxes = $('.message-checkbox').length;
        const checkedCheckboxes = $('.message-checkbox:checked').length;
        $('#select-all').prop('checked', totalCheckboxes === checkedCheckboxes);
    }

    // Status filter
    $('#status-filter').change(function() {
        const status = $(this).val();
        window.location.href = '{{ route("promoteur.messages.index") }}' + (status ? '?status=' + status : '');
    });

    // Mark as read
    $('.mark-read-btn').click(function() {
        const messageId = $(this).data('message-id');
        const row = $(this).closest('tr');
        const btn = $(this);
        
        console.log('Marking message as read:', messageId);
        
        $.ajax({
            url: '{{ route("promoteur.messages.mark-read", "ID_PLACEHOLDER") }}'.replace('ID_PLACEHOLDER', messageId),
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Mark as read response:', response);
                if (response.success) {
                    row.removeClass('table-warning');
                    row.find('.badge').removeClass('bg-warning').addClass('bg-success').text('Lu');
                    btn.remove();
                    updateUnreadCount();
                }
            },
            error: function(xhr, status, error) {
                console.error('Mark as read error:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    });

    // Mark as replied
    $('.mark-replied-btn').click(function() {
        const messageId = $(this).data('message-id');
        const row = $(this).closest('tr');
        const btn = $(this);
        
        console.log('Marking message as replied:', messageId);
        
        $.ajax({
            url: '{{ route("promoteur.messages.mark-replied", "ID_PLACEHOLDER") }}'.replace('ID_PLACEHOLDER', messageId),
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Mark as replied response:', response);
                if (response.success) {
                    row.find('.badge').removeClass('bg-success').addClass('bg-info').text('Répondu');
                    btn.remove();
                }
            },
            error: function(xhr, status, error) {
                console.error('Mark as replied error:', error);
                console.error('Response:', xhr.responseText);
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
            url: '{{ route("promoteur.messages.destroy", "ID_PLACEHOLDER") }}'.replace('ID_PLACEHOLDER', messageId),
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#deleteModal').modal('hide');
                $(`tr[data-message-id="${messageId}"]`).fadeOut();
                updateUnreadCount();
            }
        });
    });

    // Bulk actions
    window.bulkMarkAsRead = function() {
        const selectedIds = $('.message-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (selectedIds.length === 0) return;

        $.ajax({
            url: '{{ route("promoteur.messages.mark-read", "bulk") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                message_ids: selectedIds
            },
            success: function(response) {
                location.reload();
            }
        });
    };

    window.bulkMarkAsReplied = function() {
        const selectedIds = $('.message-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (selectedIds.length === 0) return;

        $.ajax({
            url: '{{ route("promoteur.messages.mark-replied", "bulk") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                message_ids: selectedIds
            },
            success: function(response) {
                location.reload();
            }
        });
    };

    window.bulkDelete = function() {
        const selectedIds = $('.message-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (selectedIds.length === 0) return;

        if (confirm('Êtes-vous sûr de vouloir supprimer ' + selectedIds.length + ' message(s) ?')) {
            $.ajax({
                url: '{{ route("promoteur.messages.destroy", "bulk") }}',
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    message_ids: selectedIds
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    };

    function updateUnreadCount() {
        $.get('{{ route("promoteur.messages.unread-count") }}', function(data) {
            // Update the unread count display if needed
        });
    }

    window.refreshMessages = function() {
        location.reload();
    };
});
</script>
@endpush 