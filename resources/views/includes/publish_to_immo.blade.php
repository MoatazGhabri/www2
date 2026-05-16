@if (auth()->guard('classified_user')->check() || auth()->guard('service_user')->check())
<div class="publication-checkbox">
    <input class="form-check-input" name="synced" type="checkbox" value="1" id="synced" checked>
    <label class="form-check-label" for="synced">
        Publier sur <a  href="{{env('DEUXIEM_SITE_LINK')}}">{{env('DEUXIEM_SITE')}}</a> 
        </label>
</div>
<div class="publication-checkbox">
        <input class="form-check-input" name="synced_premier" type="checkbox" value="1" id="synced_premier" checked>
    <label class="form-check-label" for="synced_premier">
        Publier sur <a  href="{{env('PREMIER_SITE_LINK')}}">{{env('PREMIER_SITE')}}</a> 
        </label>
</div>
@elseif(auth()->user()->access_to_publish == 1)
<div class="publication-checkbox">
    <input class="form-check-input" name="synced" type="checkbox" value="1" id="synced" checked>
    <label class="form-check-label" for="synced">
        Publier sur <a  href="{{env('DEUXIEM_SITE_LINK')}}">{{env('DEUXIEM_SITE')}}</a> 
        </label>
</div>
<div class="publication-checkbox">
        <input class="form-check-input" name="synced_premier" type="checkbox" value="1" id="synced_premier" checked>
    <label class="form-check-label" for="synced_premier">
        Publier sur <a  href="{{env('PREMIER_SITE_LINK')}}">{{env('PREMIER_SITE')}}</a> 
        </label>
</div>
@endif