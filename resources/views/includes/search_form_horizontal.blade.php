<style>
    .horizontal-search-container {
        padding: 20px 0;
        margin-top: 250px;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    
    .horizontal-search-form {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    
    .search-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        align-items: end;
    }
    
    .search-field {
        position: relative;
    }
    
    .search-field i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        z-index: 10;
    }
    
    .search-field input,
    .search-field select {
        width: 100%;
        padding: 12px 12px 12px 40px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
        height: 45px;
        box-sizing: border-box;
    }
    
    .search-field input:focus,
    .search-field select:focus {
        outline: none;
        border-color: var(--color-main);
        box-shadow: 0 0 0 3px rgba(43, 166, 232, 0.1);
    }
    
    .price-range-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    
    .price-input {
        position: relative;
    }
    
    .price-input input {
        padding-left: 35px;
    }
    
    .price-input i {
        left: 10px;
    }
    
    .operation-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        height: 45px;
        align-items: center;
    }
    
    .operation-btn {
        padding: 8px 16px;
        border: 2px solid #e5e7eb;
        background: white;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        font-weight: 500;
        color: #6b7280;
        white-space: nowrap;
    }
    
    .operation-btn:hover {
        border-color: var(--color-main);
        color: var(--color-main);
    }
    
    .operation-btn.active {
        background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
        border-color: #2BA6E8;
        color: white;
    }
    
    .search-submit {
        background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
        color: white;
        border: none;
        padding: 0 28px 0 20px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        white-space: nowrap;
        height: 45px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 2px 8px rgba(43, 166, 232, 0.08);
        margin-top: 0;
        margin-bottom: 0;
        justify-content: center;
    }
    .search-submit i {
        margin-right: 0;
        margin-left: 8px;
        font-size: 16px;
    }
    .search-submit:hover {
        background: linear-gradient(90deg, var(--color-main) 0%, var(--color-main) 100%);
        box-shadow: 0 4px 16px rgba(43, 166, 232, 0.15);
        transform: translateY(-2px) scale(1.03);
    }
    
    .search-title {
        color: white;
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: 700;
    }
    
    @media (max-width: 768px) {
        .search-row {
            grid-template-columns: 1fr;
            gap: 10px;
        }
        
        .price-range-container {
            grid-template-columns: 1fr;
        }
        
        .operation-buttons {
            justify-content: center;
            height: auto;
            min-height: 45px;
        }
        
        .search-submit {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="horizontal-search-container">
    <div class="container">
        <h2 class="search-title">Trouvez votre bien immobilier</h2>
        <form action="{{ route('all_properties') }}" method="GET" class="horizontal-search-form">
            <div class="search-row">
                <!-- Search Field -->
                <div class="search-field">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Référence ou mot-clé..." name="reference" value="{{ request()->reference }}">
                </div>
                
                <!-- City -->
                <div class="search-field">
                    <i class="fas fa-map-marker-alt"></i>
                    <select name="city_id" id="citySelect">
                        <option value="">Toutes les villes</option>
                        @foreach ($cities as $item)
                        <option value="{{ $item->id }}" {{ $item->id == request()->city_id ? 'selected' : '' }} data-id="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Area -->
                <div class="search-field" id="area_div">
                    <i class="fas fa-map-pin"></i>
                    <select name="area_id" id="areaSelect">
                        <option value="">Toutes les régions</option>
                        @foreach ($areas as $item)
                        <option value="{{ $item->id }}" {{ $item->id == request()->area_id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Category -->
                <div class="search-field">
                    <i class="fas fa-layer-group"></i>
                    <select name="category_id">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $item->id == request()->category_id ? 'selected' : '' }}>
                            {{ ucfirst($item->name) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Price Range -->
                <div class="search-field">
                    <div class="price-range-container">
                        <div class="price-input">
                            <i class="fas fa-arrow-down"></i>
                            <input name="min_price" placeholder="Prix min" type="number" value="{{ request()->min_price ?? '' }}">
                        </div>
                        <div class="price-input">
                            <i class="fas fa-arrow-up"></i>
                            <input name="max_price" placeholder="Prix max" type="number" value="{{ request()->max_price ?? '' }}">
                        </div>
                    </div>
                </div>
                
                <!-- Operation Buttons -->
                <div class="search-field">
                    <div class="operation-buttons">
                        @foreach ($operations as $item)
                        <label class="operation-btn {{ $item->id == request()->operation_id ? 'active' : '' }}">
                            <input type="radio" name="operation_id" value="{{ $item->id }}" 
                                   {{ $item->id == request()->operation_id ? 'checked' : '' }} style="display: none;">
                            {{ ucfirst($item->title) }}
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="search-field">
                    <button type="submit" class="search-submit">
                        Rechercher
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Operation button functionality
    const operationBtns = document.querySelectorAll('.operation-btn');
    operationBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Remove active class from all buttons
            operationBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            // Check the radio button
            const radio = this.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
            }
        });
    });
    
    // City-Area dependency
    const citySelect = document.getElementById('citySelect');
    const areaSelect = document.getElementById('areaSelect');
    
    if (citySelect && areaSelect) {
        citySelect.addEventListener('change', function() {
            const cityId = this.value;
            
            // Clear current areas
            areaSelect.innerHTML = '<option value="">Toutes les régions</option>';
            
            if (cityId) {
                // Fetch areas for selected city
                fetch(`/get-areas/${cityId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data && data.length > 0) {
                            data.forEach(area => {
                                const option = document.createElement('option');
                                option.value = area.id;
                                option.textContent = area.name;
                                areaSelect.appendChild(option);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching areas:', error);
                    });
            }
        });
    }
    
    // Form submission debug (remove in production if not needed)
    const searchForm = document.querySelector('.horizontal-search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            // Log form data for debugging
            const formData = new FormData(this);
            console.log('Form submission data:');
            for (let [key, value] of formData.entries()) {
                if (value) {
                    console.log(`${key}: ${value}`);
                }
            }
        });
    }
});
</script> 