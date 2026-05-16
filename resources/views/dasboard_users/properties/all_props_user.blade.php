@extends('layouts.dashboard')
@section('pageTitle')
    Tous les Annonces
@endsection
@section('sectionTitle')
    Tous les Annonces
@endsection
@section('content')
    <div class="container-fluid">
        @if ($errors->has('propertyError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('propertyError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                <h5 class="card-title mb-0 fw-bold">Mes annonces</h5>
                <form @can('isAgent') action="{{ route('all_user_property') }}" @else action="{{ route('all_promoteur_property') }}" @endcan method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control border-end-0" placeholder="Rechercher..." name="keywords"
                            value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-body">
                @if (count($props) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Informations sur les annonces</th>
                                    <th>Catégorie</th>
                                    <th>Publié</th>
                                    <th>Prix</th>
                                    <th>Vues</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($props as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @can('isAgent')
                                                    <img src="{{ asset($item->main_picture ? 'uploads/main_picture/images/properties/' . $item->main_picture->alt : 'assets/img/product/01.jpg') }}"
                                                        class="rounded me-3" width="60" height="60" alt="Property Image">
                                                @else
                                                    <img src="{{ asset($item->getFirstImageOrDefault() ? 'uploads/promoteur_property/' . $item->getFirstImageOrDefault() : 'assets/img/product/01.jpg') }}"
                                                        class="rounded me-3" width="60" height="60" alt="Property Image">
                                                @endcan
                                                <div>
                                                    <h6 class="mb-1">{{ ucfirst(substr($item->title, 0, 20)) }}</h6>
                                                    <small class="text-muted">Réf: {{ $item->ref }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-light text-dark">{{ ucfirst($item->category->name) }}</span></td>
                                        <td><small class="text-muted">{{ $item->created_at }}</small></td>
                                        <td class="fw-bold">
                                            @can('isAgent')
                                                {{ $item->price }}
                                            @else
                                                {{ $item->price_total }}
                                            @endcan
                                            DT
                                        </td>
                                        <td>{{ $item->count_views }}</td>
                                        <td>
                                            @can('isAgent')
                                                @if ($item->state == 'valid')
                                                    <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                                @elseif ($item->state == 'waiting')
                                                    <span class="badge bg-warning bg-opacity-10 text-warning">En attente</span>
                                                @else
                                                    <span class="badge bg-danger bg-opacity-10 text-danger">Inactive</span>
                                                @endif
                                            @else
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                                @else
                                                    <span class="badge bg-warning bg-opacity-10 text-warning">En attente</span>
                                                @endif
                                            @endcan
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('annonces.remonter', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Remonter">
                                                        <i class="fas fa-arrow-up"></i>
                                                    </button>
                                                    @can('isAgent')
                                                        <input type="hidden" name="type" value="property">
                                                    @else
                                                        <input type="hidden" name="type" value="promoteur_property">
                                                    @endcan
                                                </form>

                                                <a @can('isAgent') href="{{ route('EditProperty', $item->slug) }}" @else href="{{ route('EditPropertyPromoteur', $item->slug) }}" @endcan
                                                    class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                @can('isAgent')
                                                    <form id="delete-property-form-{{ $item->id }}" action="{{ route('properties.destroy', $item) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Supprimer"
                                                            onclick="confirmDelete('delete-property-form-{{ $item->id }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form id="delete-property-promoteur-form-{{ $item->id }}" action="{{ route('property.promotuer.destroy', $item) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Supprimer"
                                                            onclick="confirmDelete('delete-property-promoteur-form-{{ $item->id }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {!! $props->appends(request()->query())->links('vendor.pagination.bootstrap-5') !!}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Pas d'annonces</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function confirmDelete(formId) {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette annonce?')) {
                    document.getElementById(formId).submit();
                }
            }
        </script>
    @endpush
@endsection