<h6 class=" my-4">Emplacement</h6>
<div style="display: flex; gap: 20px; width: 100%;">
    <div style="flex: 1; min-width: 0;">
    <div class="form-group">
        <label>Ville
            @include("includes.required")
        </label>
            <div class="select-wrapper">
                <select class="select modern-input  @error('city_id') is-invalid @enderror" style="display: none;" name="city_id"
            id="citySelect">
            <option value="">Choisir une ville</option>
            @foreach ($cities as $item)
                <option value="{{ $item->id }}"
                    {{ isset($property[0]['city_id']) && $property[0]['city_id'] == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
        </div>
    @include('message_session.error_field_message', [
        'fieldName' => 'city_id',
    ])
</div>
    <div style="flex: 1; min-width: 0;">
    <div class="form-group" id="area_div">
        <label>Région
            @include("includes.required")
        </label>
            <div class="select-wrapper">
                <select class="select modern-input @error('area_id') is-invalid @enderror" style="display: none;" name="area_id"
            id="areaSelect">
            <option value="">Choisir une région</option>
            @if ($areas)
                @foreach ($areas as $item)
                    <option value="{{ $item->id }}"
                        {{ isset($property[0]['area_id']) && $property[0]['area_id'] == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            @endif
        </select>
            </div>
    </div>
    @include('message_session.error_field_message', [
        'fieldName' => 'area_id',
    ])
    </div>
</div>
<div class="col-lg-12 addresss">
    <div class="form-group">
        <label>Adresse</label>
        <input type="text" class="form-control" placeholder="Entrer l'adresse" name="address"
            value="{{ isset($property[0]['address']) ? $property[0]['address'] : '' }}">
    </div>
</div>
{{-- <div class="col-lg-6">
    <div class="form-group">
        <label>Code postal</label>
        <input type="text" class="form-control" placeholder="Entrer le code postal" name="code">
    </div>
</div> --}}
