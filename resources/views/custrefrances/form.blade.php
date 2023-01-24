
<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cname') ? 'has-error' : '' }}">
    <label for="cname" class="control-label">{{ trans('custrefrances.cname') }}</label>
    <div class="">
        <input class="form-control" name="cname" type="text" id="cname" value="{{ old('cname', optional($custrefrances)->cname) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('custrefrances.cname__placeholder') }}">
        {!! $errors->first('cname', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('ccountry_id') ? 'has-error' : '' }}">
    <label for="ccountry_id" class="control-label">{{ trans('custrefrances.ccountry_id') }}</label>
    <div class="">
        <select class="form-control" id="ccountry_id" name="ccountry_id" required="true">
        	    <option value="" style="display: none;" {{ old('ccountry_id', optional($custrefrances)->ccountry_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('custrefrances.ccountry_id__placeholder') }}</option>
        	@foreach ($Countries as $key => $Country)
			    <option value="{{ $key }}" {{ old('ccountry_id', optional($custrefrances)->ccountry_id) == $key ? 'selected' : '' }}>
			    	{{ $Country }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('ccountry_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cstate_id') ? 'has-error' : '' }}">
    <label for="cstate_id" class="control-label">{{ trans('custrefrances.cstate_id') }}</label>
    <div class="">
        <select class="form-control" id="cstate_id" name="cstate_id" required="true">
        	    <option value="" style="display: none;" {{ old('cstate_id', optional($custrefrances)->cstate_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('custrefrances.cstate_id__placeholder') }}</option>
        	@foreach ($States as $key => $State)
			    <option value="{{ $key }}" {{ old('cstate_id', optional($custrefrances)->cstate_id) == $key ? 'selected' : '' }}>
			    	{{ $State }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('cstate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('ccity') ? 'has-error' : '' }}">
    <label for="ccity" class="control-label">{{ trans('custrefrances.ccity') }}</label>
    <div class="">
        <input class="form-control" name="ccity" type="text" id="ccity" value="{{ old('ccity', optional($custrefrances)->ccity) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('custrefrances.ccity__placeholder') }}">
        {!! $errors->first('ccity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cblock') ? 'has-error' : '' }}">
    <label for="cblock" class="control-label">{{ trans('custrefrances.cblock') }}</label>
    <div class="">
        <input class="form-control" name="cblock" type="text" id="cblock" value="{{ old('cblock', optional($custrefrances)->cblock) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('custrefrances.cblock__placeholder') }}">
        {!! $errors->first('cblock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('chouseNo') ? 'has-error' : '' }}">
    <label for="chouseNo" class="control-label">{{ trans('custrefrances.chouseNo') }}</label>
    <div class="">
        <input class="form-control" name="chouseNo" type="text" id="chouseNo" value="{{ old('chouseNo', optional($custrefrances)->chouseNo) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('custrefrances.chouseNo__placeholder') }}">
        {!! $errors->first('chouseNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cstreet') ? 'has-error' : '' }}">
    <label for="cstreet" class="control-label">{{ trans('custrefrances.cstreet') }}</label>
    <div class="">
        <input class="form-control" name="cstreet" type="text" id="cstreet" value="{{ old('cstreet', optional($custrefrances)->cstreet) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('custrefrances.cstreet__placeholder') }}">
        {!! $errors->first('cstreet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cwork_address') ? 'has-error' : '' }}">
    <label for="cwork_address" class="control-label">{{ trans('custrefrances.cwork_address') }}</label>
    <div class="">
        <input class="form-control" name="cwork_address" type="text" id="cwork_address" value="{{ old('cwork_address', optional($custrefrances)->cwork_address) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('custrefrances.cwork_address__placeholder') }}">
        {!! $errors->first('cwork_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('ctel') ? 'has-error' : '' }}">
    <label for="ctel" class="control-label">{{ trans('custrefrances.ctel') }}</label>
    <div class="">
        <input class="form-control" name="ctel" type="text" id="ctel" value="{{ old('ctel', optional($custrefrances)->ctel) }}" minlength="1" required="true" placeholder="{{ trans('custrefrances.ctel__placeholder') }}">
        {!! $errors->first('ctel', '<p class="help-block">:message</p>') !!}
    </div>
</div>





