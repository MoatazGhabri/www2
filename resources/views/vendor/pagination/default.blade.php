@if ($paginator->hasPages())
    <div class="pagination-container">
        <nav aria-label="Pagination Navigation" class="pagination-nav">
            <ul class="pagination-list">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="pagination-link pagination-arrow" aria-hidden="true">
                            <svg class="pagination-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="pagination-text">Previous</span>
                        </span>
                    </li>
                @else
                    <li class="pagination-item">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" 
                           class="pagination-link pagination-arrow hover-effect" 
                           aria-label="@lang('pagination.previous')">
                            <svg class="pagination-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="pagination-text">Previous</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="pagination-item disabled" aria-disabled="true">
                            <span class="pagination-link pagination-ellipsis">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="pagination-item active" aria-current="page">
                                    <span class="pagination-link pagination-number current-page">{{ $page }}</span>
                                </li>
                            @elseif ($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() - 1 || $page == 1 || $page == $paginator->lastPage())
                                <li class="pagination-item">
                                    <a href="{{ $url }}" class="pagination-link pagination-number hover-effect">{{ $page }}</a>
                                </li>
                            @elseif (($page == $paginator->currentPage() + 2 && $page < $paginator->lastPage() - 1) || ($page == $paginator->currentPage() - 2 && $page > 2))
                                <li class="pagination-item disabled">
                                    <span class="pagination-link pagination-ellipsis">...</span>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="pagination-item">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" 
                           class="pagination-link pagination-arrow hover-effect" 
                           aria-label="@lang('pagination.next')">
                            <span class="pagination-text">Next</span>
                            <svg class="pagination-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="pagination-link pagination-arrow" aria-hidden="true">
                            <span class="pagination-text">Next</span>
                            <svg class="pagination-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

    <style>
        .pagination-container {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            font-family: 'Inter', sans-serif;
        }
        
        .pagination-nav {
            display: inline-block;
            background: white;
            border-radius: 12px;
            padding: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .pagination-list {
            display: flex;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 0.5rem;
        }
        
        .pagination-item {
            margin: 0;
        }
        
        .pagination-link {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            min-width: 42px;
            padding: 0 0.75rem;
            border-radius: 8px;
            font-size: 0.9375rem;
            font-weight: 500;
            color: #4B5563;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .pagination-number {
            background: transparent;
        }
        
        .pagination-arrow {
            gap: 0.5rem;
            padding: 0 1rem;
        }
        
        .pagination-text {
            display: inline-block;
        }
        
        .pagination-icon {
            width: 1.25rem;
            height: 1.25rem;
        }
        
        .pagination-ellipsis {
            background: transparent;
            pointer-events: none;
        }
        
        .current-page {
            background: #3B82F6;
            color: white;
            font-weight: 600;
        }
        
        .hover-effect:hover {
            background: #F3F4F6;
            color: #1F2937;
        }
        
        .disabled .pagination-link {
            color: #9CA3AF;
            pointer-events: none;
        }
        
        @media (max-width: 640px) {
            .pagination-text {
                display: none;
            }
            
            .pagination-arrow {
                padding: 0 0.75rem;
            }
        }
    </style>
@endif