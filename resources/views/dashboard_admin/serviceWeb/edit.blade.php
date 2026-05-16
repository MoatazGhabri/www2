@extends('layouts.dashboard')
@section('pageTitle')
    Modifier un Service Web
@endsection
@section('sectionTitle')
    Modifier un Service Web
@endsection
@section('content')
{{-- {{ dd($slider) }} --}}
    <style>
        .serviceweb-add-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(59,130,246,0.10);
            padding: 36px 32px 28px 32px;
            max-width: 540px;
            margin: 32px auto;
        }
        .serviceweb-add-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
        }
        .serviceweb-form-group {
            margin-bottom: 22px;
        }
        .serviceweb-form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #3b82f6;
        }
        .serviceweb-form-group input,
        .serviceweb-form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.2s, box-shadow 0.2s;
            background: #f8fafc;
            margin-top: 4px;
        }
        .serviceweb-form-group input:focus,
        .serviceweb-form-group textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59,130,246,0.10);
            background: #fff;
        }
        .serviceweb-upload-label {
            display: block;
            font-weight: 600;
            color: #3b82f6;
            margin-bottom: 10px;
        }
        .serviceweb-upload-btn {
            display: inline-block;
            background: linear-gradient(90deg, #667eea 0%, #3b82f6 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: 0.2s;
        }
        .serviceweb-upload-btn:hover {
            background: linear-gradient(90deg, #3b82f6 0%, #667eea 100%);
        }
        .serviceweb-img-preview {
            display: block;
            margin: 0 auto 18px auto;
            max-width: 180px;
            max-height: 180px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(59,130,246,0.10);
            background: #f8fafc;
        }
        .serviceweb-checkbox {
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .serviceweb-submit-btn {
            background: linear-gradient(90deg, #667eea 0%, #3b82f6 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-weight: 700;
            font-size: 17px;
            box-shadow: 0 2px 8px rgba(59,130,246,0.10);
            margin: 24px auto 0 auto;
            display: block;
            transition: 0.2s;
        }
        .serviceweb-submit-btn:hover {
            background: linear-gradient(90deg, #3b82f6 0%, #667eea 100%);
            transform: translateY(-2px) scale(1.03);
        }
        @media (max-width: 600px) {
            .serviceweb-add-card {
                padding: 18px 6px 18px 6px;
            }
        }
    </style>

    {{-- <div class="col-lg-9"> --}}
    <div class="serviceweb-add-card">
        <div class="serviceweb-add-title">Modifier un Service Web</div>
        <form action="{{ route('admin.update_service_web',$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="serviceweb-form-group">
                <label for="title">Titre</label>
                <input type="text" class="@error('title') is-invalid @enderror" placeholder="Entrez le titre" name="title" id="title" value="{{ $slider->title }}" maxlength="34">
            </div>
            <div class="serviceweb-form-group">
                <label for="description">Description</label>
                <textarea class="@error('description') is-invalid @enderror" placeholder="Entrez la description" name="description" id="description">{{ $slider->description }}</textarea>
            </div>
            <div class="serviceweb-form-group">
                <label for="lien">Lien</label>
                <input type="text" placeholder="Entrez le lien" name="lien" id="lien" value="{{ $slider->lien }}">
            </div>
            <div class="serviceweb-form-group">
                <label class="serviceweb-upload-label">Importer une image</label>
                <button type="button" class="serviceweb-upload-btn" onclick="document.getElementById('open_main').click()"><i class="far fa-images"></i> Télécharger une image</button>
                <input type="file" class="d-none" name="photos_main" id="open_main" onchange="previewMainPicture(event)">
                <img id="mainPicturePreviewImg" class="serviceweb-img-preview" src="{{asset('uploads/serviceWeb/'.$slider->imageUrl)}}" alt="Aperçu de l'image">
            </div>
            <div class="serviceweb-checkbox">
                <input class="form-check-input" name="publish_now" type="checkbox" value="1" id="publish_now" {{ $slider->active == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="publish_now">Publier maintenant</label>
            </div>
            <button type="submit" class="serviceweb-submit-btn">Mettre à jour</button>
        </form>
    </div>

    <script>
        function previewMainPicture(event) {
            const input = event.target;
            const preview = document.getElementById('mainPicturePreviewImg');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
