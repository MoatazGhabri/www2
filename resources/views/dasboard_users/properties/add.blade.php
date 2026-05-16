<meta charset="utf-8">
@extends('layouts.dashboard')
@section('pageTitle')
    Ajouter Une Annonce
@endsection
@section('sectionTitle')
    Ajouter Une Annonce
@endsection
@section('content')
    <style>
        /* Modern Form Styles */
        .modern-form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-section {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
        }

        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f8f9fa;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 18px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #fafbfc;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control.is-invalid {
            border-color: #e53e3e;
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
        }

        .required-indicator {
            color: #e53e3e;
            font-weight: bold;
        }

        /* Modern Checkbox Styles */
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            background: #f8f9fa;
            border-radius: 10px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .checkbox-item:hover {
            background: #e9ecef;
            border-color: #667eea;
        }

        .checkbox-item input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .checkbox-item input[type="checkbox"]:checked + label {
            color: #667eea;
            font-weight: 600;
        }

        /* Image Upload Styles */
        .image-upload-container {
            border: 2px dashed #cbd5e0;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            background: #fafbfc;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-upload-container:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }

        .upload-icon {
            font-size: 48px;
            color: #a0aec0;
            margin-bottom: 15px;
        }

        .upload-text {
            color: #4a5568;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .upload-hint {
            color: #718096;
            font-size: 14px;
        }

        .image-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .image-preview-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .image-preview-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .delete-button {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(229, 62, 62, 0.9);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .delete-button:hover {
            background: #e53e3e;
            transform: scale(1.1);
        }

        /* Submit Button */
        .submit-section {
            background: none !important;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            margin-top: 30px;
            box-shadow: none;
        }

        .theme-btn {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 15px 40px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .theme-btn:hover {
            background: #1746a2;
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.15);
        }

        /* Progress Bar */
        .progress-container {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .progress-text {
            text-align: center;
            margin-top: 10px;
            color: #4a5568;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modern-form-container {
                padding: 10px;
            }
            
            .form-section {
                padding: 20px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .checkbox-group {
                grid-template-columns: 1fr;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-section {
            animation: fadeInUp 0.6s ease;
        }

        .modern-input,
        .form-control {
            border-radius: 14px;
            background: #fff;
            border: 1.5px solid #e2e8f0;
            padding: 14px 18px;
            font-size: 16px;
            color: #222;
            transition: border-color 0.25s, box-shadow 0.25s, background 0.25s;
            box-shadow: none;
            outline: none;
        }
        .modern-input::placeholder,
        .form-control::placeholder {
            color: #b0b7c3;
            opacity: 1;
            font-size: 15px;
        }
        .modern-input:focus,
        .form-control:focus {
            border-color: #2563eb;
            background: #f7faff;
            box-shadow: 0 2px 12px rgba(37,99,235,0.08);
            outline: none;
        }
        /* Modernisation des selects */
        .modern-input,
        .modern-input select,
        select.modern-input {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #f9fafb;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 40px 12px 16px;
            font-size: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
            height: 48px;
            min-height: 48px;
            line-height: 1.4;
            position: relative;
        }
        select.modern-input:focus {
            border-color: #667eea;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.08);
            outline: none;
        }
        .select-wrapper {
            position: relative;
            display: block;
        }
        .select-wrapper:after {
            display: none !important;
        }
        .select-wrapper,
        .modern-input,
        select.modern-input {
            width: 100%;
            min-width: 0;
            box-sizing: border-box;
        }
        .carac-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        @media (max-width: 768px) {
            .carac-grid-2 {
                grid-template-columns: 1fr;
            }
        }
        .publication-options-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin: 18px 0 10px 0;
        }
        .publication-checkbox {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 10px;
            padding: 0;
            border: none;
            box-shadow: none;
            min-height: 44px;
            transition: background 0.2s;
            flex: 1 1 220px;
            min-width: 180px;
            max-width: 100%;
        }
        .publication-checkbox input[type="checkbox"] {
            accent-color: #2563eb;
            width: 22px;
            height: 22px;
            margin-right: 14px;
            border-radius: 6px;
            flex-shrink: 0;
            margin-top: 0;
            display: block;
        }
        .publication-checkbox label {
            margin: 0;
            font-size: 16px;
            color: #222;
            font-weight: 500;
            cursor: pointer;
            line-height: 22px;
            display: block;
        }
        .publication-checkbox a {
            color: #2563eb !important;
            text-decoration: underline;
            font-weight: 600;
        }
        .publication-checkbox:hover {
            background: #f7faff;
        }
        .publication-options-row {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            margin: 18px 0 10px 0;
        }
    </style>

    <div class="modern-form-container">
      

        <form action="{{ route('strore_property') }}" method="POST" enctype="multipart/form-data" id="propertyForm">
                        @csrf
            
            <!-- Informations de base -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="section-title">Informations de base</h3>
                </div>
                
                <div class="form-row">
                                <div class="form-group">
                        <label class="form-label">
                            Titre <span class="required-indicator">*</span>
                                    </label>
                        <input type="text" class="form-control modern-input @error('title') is-invalid @enderror"
                            placeholder="Ex: Appartement moderne au centre-ville" name="title" value="{{ old('title') }}"
                                        maxlength="50">
                        @include('message_session.error_field_message', ['fieldName' => 'title'])
                    </div>
                                </div>

                <div class="form-row">
                            @include('dasboard_users.properties.include.operation')
                            @include('dasboard_users.properties.include.property_type')
                </div>

                <div class="form-row">
                                <div class="form-group">
                        <label class="form-label">
                            Situation <span class="required-indicator">*</span>
                                    </label>
                        <select class="form-control modern-input @error('situation_id') is-invalid @enderror" name="situation_id">
                                        <option value="">Choisir situation</option>
                                        @foreach ($situations as $item)
                                            <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                        @endforeach
                                    </select>
                        @include('message_session.error_field_message', ['fieldName' => 'situation_id'])
                            </div>

                                <div class="form-group">
                        <label class="form-label">
                            Prix (TND) <span class="required-indicator">*</span>
                                    </label>
                        <input type="number" min="0" class="form-control modern-input @error('prixtotaol') is-invalid @enderror"
                            placeholder="Ex: 150000" name="prixtotaol">
                        @include('message_session.error_field_message', ['fieldName' => 'prixtotaol'])
                                </div>
                            </div>

                <div class="form-row">
                    <div class="form-group">
                        <div class="checkbox-item">
                            <input class="form-check-input" name="show_price" type="checkbox" value="1" id="show_price">
                                    <label class="form-check-label" for="show_price">
                                Afficher le prix publiquement
                                    </label>
                                </div>
                            </div>
                </div>
            </div>

            <!-- Images -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3 class="section-title">Photos de la propriété</h3>
                </div>
                @include('dasboard_users.properties.include.upload_image')
                <div class="image-preview" id="imagePreview"></div>
            </div>

            <!-- Video Upload -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3 class="section-title">Vidéo de la propriété</h3>
                </div>
                @include('dasboard_users.properties.include.upload-vedio')
            </div>

            <!-- Localisation -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="section-title">Localisation</h3>
                </div>
                @include('dasboard_users.properties.include.location')
                <div class="form-group mt-3">
                    <label>Lien Google Maps</label>
                    <input type="url" class="form-control @error('map_embed_url') is-invalid @enderror"
                        placeholder="Collez ici le lien d'intégration Google Maps" name="map_embed_url" value="{{ old('map_embed_url') }}">
                    <small class="form-text text-muted">
                        Pour obtenir le lien d'intégration :
                        <ol style="margin-top: 5px; padding-left: 20px;">
                            <li>Allez sur Google Maps</li>
                            <li>Trouvez votre propriété</li>
                            <li>Cliquez sur "Partager"</li>
                            <li>Sélectionnez "Intégrer une carte"</li>
                            <li>Copiez l'URL dans src="..." (Ne copiez que le contenu du src)</li>
                        </ol>
                    </small>
                    @include('message_session.error_field_message', ['fieldName' => 'map_embed_url'])
                </div>
            </div>

            <!-- Description -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-align-left"></i>
                                </div>
                    <h3 class="section-title">Description détaillée</h3>
                            </div>

                                <div class="form-group">
                    <label class="form-label">
                        Description <span class="required-indicator">*</span>
                                    </label>
                    <textarea class="form-control modern-input @error('description') is-invalid @enderror" 
                        placeholder="Décrivez votre propriété en détail..." cols="30" rows="6" name="description"></textarea>
                    @include('message_session.error_field_message', ['fieldName' => 'description'])
                                </div>
                            </div>

            <!-- Caractéristiques -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-ruler-combined"></i>
                                </div>
                    <h3 class="section-title">Caractéristiques</h3>
                            </div>

                <div class="carac-grid-2">
                                <div class="form-group">
                        <label class="form-label">Superficie Total (m²) <span class="required-indicator">*</span></label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="floor_area" placeholder="Ex: 120">
                            </div>
                                <div class="form-group">
                        <label class="form-label">Superficie Couverte (m²) <span class="required-indicator">*</span></label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="plot_area" placeholder="Ex: 100">
                                </div>
                            </div>

                <div class="carac-grid-2">
                                <div class="form-group">
                        <label class="form-label">Nombre de Chambres</label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="room_number" placeholder="Ex: 3">
                            </div>
                                <div class="form-group">
                        <label class="form-label">Nombre de Salons</label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="living_room_number" placeholder="Ex: 1">
                                </div>
                            </div>

                <div class="carac-grid-2">
                                <div class="form-group">
                        <label class="form-label">Nombre de Salles de bain</label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="bath_room_number" placeholder="Ex: 2">
                            </div>
                                <div class="form-group">
                        <label class="form-label">Nombre de Cuisines</label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="kitchen_number" placeholder="Ex: 1">
                                </div>
                            </div>

                <div class="carac-grid-2">
                    <div class="form-group">
                        <label class="form-label">Nombre de Terrasses</label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="teras_number" placeholder="Ex: 1">
                                </div>
                    <div class="form-group">
                        <label class="form-label">Numéro d'étage</label>
                        <input type="number" min="0" class="form-control modern-input" value="0" name="etage" placeholder="Ex: 3">
                                </div>
                                </div>
                            </div>

            <!-- Équipements -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-tools"></i>
                                </div>
                    <h3 class="section-title">Équipements disponibles</h3>
                            </div>

                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input class="form-check-input" name="balcon" type="checkbox" value="1" id="balcon">
                        <label class="form-check-label" for="balcon">Balcon</label>
                    </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="garden" type="checkbox" value="1" id="garden">
                        <label class="form-check-label" for="garden">Jardin</label>
                                </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="garage" type="checkbox" value="1" id="garage">
                        <label class="form-check-label" for="garage">Garage</label>
                            </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="parking" type="checkbox" value="1" id="parking">
                        <label class="form-check-label" for="parking">Parking</label>
                                </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="elevator" type="checkbox" value="1" id="elevator">
                        <label class="form-check-label" for="elevator">Ascenseur</label>
                            </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="heating" type="checkbox" value="1" id="heating">
                        <label class="form-check-label" for="heating">Chauffage</label>
                                </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="air_conditioner" type="checkbox" value="1" id="air_conditioner">
                        <label class="form-check-label" for="air_conditioner">Climatisation</label>
                            </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="alarm_system" type="checkbox" value="1" id="alarm_system">
                        <label class="form-check-label" for="alarm_system">Système d'alarme</label>
                                </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="wifi" type="checkbox" value="1" id="wifi">
                        <label class="form-check-label" for="wifi">WiFi</label>
                            </div>
                    <div class="checkbox-item">
                        <input class="form-check-input" name="swimming_pool" type="checkbox" value="1" id="swimming_pool">
                        <label class="form-check-label" for="swimming_pool">Piscine</label>
                    </div>
                                </div>
                            </div>

            <!-- Options de publication -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-share-alt"></i>
                                </div>
                    <h3 class="section-title">Options de publication</h3>
                            </div>
                <div class="publication-options-row">
                    <div class="publication-checkbox">
                        <input class="form-check-input" name="publish_now" type="checkbox" value="1" id="publish_now">
                                    <label class="form-check-label" for="publish_now">
                            Publier immédiatement
                                    </label>
                            </div>
                            @include('includes.publish_to_immo')
                </div>
                @include('includes.champ_obligatoir')
            </div>

            <!-- Submit Section -->
            <div class="submit-section">
                <button type="submit" class="theme-btn">
                    <i class="fas fa-paper-plane"></i> Publier l'annonce
                </button>
        </div>
        </form>
    </div>

    <script>
        // Progress bar functionality
        function updateProgress() {
            const form = document.getElementById('propertyForm');
            const inputs = form.querySelectorAll('input, select, textarea');
            const filledInputs = Array.from(inputs).filter(input => {
                if (input.type === 'checkbox') return input.checked;
                return input.value.trim() !== '';
            });
            
            const progress = (filledInputs.length / inputs.length) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
            document.getElementById('progressText').textContent = 
                `Étape ${Math.ceil(progress / 25)} sur 4 - ${Math.round(progress)}% complété`;
        }

        // Add event listeners to all form inputs
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('propertyForm');
            const inputs = form.querySelectorAll('input, select, textarea');
            
            inputs.forEach(input => {
                input.addEventListener('input', updateProgress);
                input.addEventListener('change', updateProgress);
            });
            
            updateProgress();
        });

        // Image preview functionality (existing code)
        function handleImageUpload(input) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';
            
            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'image-preview-item';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button type="button" class="delete-button" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    preview.appendChild(div);
                };
                
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
