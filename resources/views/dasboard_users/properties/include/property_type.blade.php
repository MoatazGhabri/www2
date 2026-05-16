<div class="form-group" style="width:100%">
        <label>Type de bien
            @include("includes.required")
        </label>
    <div class="select-wrapper">
        <select class="select modern-input @error('category_id') is-invalid @enderror" name="category_id" required>
            <option value="">Choisir Catégorie</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{  isset($property[0]['category_id']) && $property[0]['category_id'] == $item->id ? 'selected' : '' }}>
                    {{ ucfirst($item->name) }}</option>
            @endforeach
        </select>
    </div>
    @include('message_session.error_field_message', [
        'fieldName' => 'category_id',
    ])
</div>
