<div class="modern-search-filters">
    <div class="search-container">
        <!-- Search by Name -->
        <div class="search-input-group">
            <i class="fas fa-search search-icon"></i>
            <input type="text" 
                   class="search-input" 
                   placeholder="Rechercher par nom..." 
                   name="user_name"
                   value="{{ request()->user_name }}">
            <div class="input-border"></div>
        </div>

        <!-- Category Filter -->
        <div class="select-group">
            <i class="fas fa-layer-group select-icon"></i>
            <select class="modern-select" name="category_id">
                <option value="">Toutes catégories</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ request()->category_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            <i class="fas fa-chevron-down select-arrow"></i>
        </div>

        <!-- Status Filter -->
        <div class="select-group">
            <i class="fas fa-filter select-icon"></i>
            <select class="modern-select" name="status">
                <option value="">Tous statuts</option>
                <option value="valid" {{ request()->status == 'valid' ? 'selected' : '' }}>Actif</option>
                <option value="waiting" {{ request()->status == 'waiting' ? 'selected' : '' }}>En Attente</option>
            </select>
            <i class="fas fa-chevron-down select-arrow"></i>
        </div>

        <!-- Date Filter -->
        <div class="date-input-group">
            <i class="far fa-calendar-alt date-icon"></i>
            <input type="date" 
                   class="date-input" 
                   name="created_at"
                   value="{{ request()->created_at ?? '' }}">
            <label class="date-label">Filtrer par date</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="search-button">
            <i class="fas fa-search"></i>
            <span>Appliquer</span>
        </button>
    </div>
</div>

<style>
    /* Modern Search Filters Styles */
    .modern-search-filters {
        margin-bottom: 2rem;
    }
    
    .search-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: center;
    }
    
    /* Search Input Group */
    .search-input-group {
        position: relative;
        flex: 1;
        min-width: 200px;
    }
    
    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
        font-size: 0.9rem;
    }
    
    .search-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 40px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        background-color: white;
    }
    
    .input-border {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #3498db;
        transition: width 0.3s ease;
    }
    
    .search-input:focus ~ .input-border {
        width: 100%;
    }
    
    /* Select Group */
    .select-group {
        position: relative;
        min-width: 200px;
    }
    
    .select-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
        font-size: 0.9rem;
        z-index: 1;
    }
    
    .modern-select {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 40px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        appearance: none;
        background-color: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .modern-select:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        background-color: white;
    }
    
    .select-arrow {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
        pointer-events: none;
    }
    
    /* Date Input Group */
    .date-input-group {
        position: relative;
        min-width: 200px;
    }
    
    .date-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
        font-size: 0.9rem;
    }
    
    .date-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 40px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }
    
    .date-input:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        background-color: white;
    }
    
    .date-label {
        position: absolute;
        left: 40px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
        pointer-events: none;
        transition: all 0.2s ease;
        padding: 0 0.25rem;
        background: #f8f9fa;
    }
    
    .date-input:focus + .date-label,
    .date-input:not(:placeholder-shown) + .date-label {
        top: 0;
        transform: translateY(-50%) scale(0.9);
        color: #3498db;
        background: white;
    }
    
    /* Search Button */
    .search-button {
        width: 100%;
        text-align: center;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .search-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .search-container {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-input-group,
        .select-group,
        .date-input-group {
            min-width: 100%;
        }
        
        .search-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add focus class to date input when it has value
        const dateInput = document.querySelector('.date-input');
        if (dateInput && dateInput.value) {
            dateInput.nextElementSibling.classList.add('has-value');
        }
        
        // Update date label when input changes
        if (dateInput) {
            dateInput.addEventListener('input', function() {
                if (this.value) {
                    this.nextElementSibling.classList.add('has-value');
                } else {
                    this.nextElementSibling.classList.remove('has-value');
                }
            });
        }
    });
</script>