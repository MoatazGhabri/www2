<div class="col-6 mt-4">
    <div class="form-check">
        <input class="form-check-input" name="synced" type="checkbox" value="1"
            id="synced" {{  isset($property[0]['synced']) && $property[0]['synced'] == 1 ? 'checked' : (isset($property[0]) ? '' : 'checked') }}>
        <label style="color:#fc3131" class="form-check-label" for="synced">
            Publier sur <a href="{{env('DEUXIEM_SITE_LINK')}}">{{env('DEUXIEM_SITE')}}</a> 
        </label>
    </div>
</div>
<div class="col-6 mt-4">
    <div class="form-check">
        <input class="form-check-input" name="synced_premier" type="checkbox" value="1" id="synced_premier" {{  isset($property[0]['synced_premier']) && $property[0]['synced_premier'] == 1 ? 'checked' : (isset($property[0]) ? '' : 'checked') }}>
        <label style="color:#fc3131" class="form-check-label" for="synced_premier">
            Publier sur <a href="{{env('PREMIER_SITE_LINK')}}">{{env('PREMIER_SITE')}}</a> 
        </label>
    </div>
</div>