<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #fc7b0b;
            --secondary-color: #013064;
            --border-color: #e2e8f0;
            --hover-color: #f1f5f9;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            padding: 20px;
        }
        
        .search-container {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .form-group-icon {
            position: relative;
        }
        
        .form-group-icon i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
            z-index: 10;
        }
        
        .form-control, .form-select {
            padding-left: 40px !important;
            height: 48px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        
        .form-check-input {
            width: 18px;
            height: 18px;
            margin-top: 0.2em;
        }
        
        .form-check-label {
            margin-left: 8px;
            cursor: pointer;
        }
        
        .form-check {
            padding: 8px 0;
            display: flex;
            align-items: center;
        }
        
        .form-check:hover {
            background-color: var(--hover-color);
            border-radius: 6px;
            padding: 8px 12px;
            margin: 0 -12px;
        }
        
        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            width: 100%;
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
        }
        
        .btn-primary i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="row g-3">
            <h5 class="mb-3 fw-semibold text-dark">Rechercher des annonces</h5>
            
            <!-- Search Field -->
            <div class="col-12">
                <div class="form-group-icon">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Rechercher..." name="reference" value="{{ request()->reference }}">
                </div>
            </div>
            
            <!-- Location Fields -->
            <div class="col-12">
                <div class="form-group-icon">
                    <i class="fas fa-map-marker-alt"></i>
                    <select class="form-select" name="city_id" id="citySelect">
                        <option value="">Ville</option>
                        @foreach ($cities as $item)
                        <option value="{{ $item->slug }}" {{ $item->slug == $city_name ? 'selected' : '' }} data-id="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-12">
                <div class="form-group-icon" id="area_div">
                    <i class="fas fa-map-marker-alt"></i>
                    <select class="form-select" name="area_id" id="areaSelect">
                        <option value="">Région</option>
                        @foreach ($areas as $item)
                        <option value="{{ $item->slug }}" {{ $item->slug == $area_name ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <!-- Category Section -->
            <div class="col-12">
                <h6 class="section-title mt-4">Catégorie</h6>
                <div class="form-group-icon">
                    <i class="fas fa-layer-group"></i>
                    <select class="form-select" name="category_id">
                        <option value="" disabled selected>Choisir une catégorie</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->slug }}" {{ $item->slug == $category_name ? 'selected' : '' }}>
                            {{ ucfirst($item->name) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <small class="text-danger" id="category_error" style="display:none">Veuillez sélectionner une catégorie</small>
            </div>
            
            <!-- Operation Section -->
            <div class="col-12">
                <h6 class="section-title mt-4">Opération</h6>
                @foreach ($operations as $item)
                <div class="form-check">
                    <input class="form-check-input" name="operation_id" type="radio" value="{{ $item->name }}" 
                           id="operation_{{ $item->id }}" {{ $item->name == $operation_name ? 'checked' : '' }} required>
                    <label class="form-check-label" for="operation_{{ $item->id }}">
                        {{ ucfirst($item->name) }}
                    </label>
                </div>
                @endforeach
            </div>
            
            <!-- Price Range -->
            <div class="col-12">
                <h6 class="section-title mt-4">Prix (DT)</h6>
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-group-icon">
                            <i class="fas fa-arrow-down"></i>
                            <input name="min_price" class="form-control" placeholder="Minimum" type="number" value="{{ request()->min_price ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-icon">
                            <i class="fas fa-arrow-up"></i>
                            <input name="max_price" class="form-control" placeholder="Maximum" type="number" value="{{ request()->max_price ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>