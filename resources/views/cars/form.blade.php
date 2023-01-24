<div class="row row-sm col-md-9 col-lg-12">

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('veh_id') ? 'has-error' : '' }}">
    <label for="veh_id" class=" control-label">{{ trans('cars.veh_id') }}</label>
    <div class="">
        <select class="form-control" id="veh_id" name="veh_id" required="true">
        	    <option value="" style="display: none;" {{ old('veh_id', optional($cars)->veh_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cars.veh_id__placeholder') }}</option>
        	@foreach ($Vehicles as $key => $Vehicle)
			    <option value="{{ $key }}" {{ old('veh_id', optional($cars)->veh_id) == $key ? 'selected' : '' }}>
			    	{{ $Vehicle }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('veh_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('mark_id') ? 'has-error' : '' }}">
    <label for="mark_id" class=" control-label">{{ trans('cars.mark_id') }}</label>
    <div class="">
        <select class="form-control" id="mark_id" name="mark_id" required="true">
        	    <option value="" style="display: none;" {{ old('mark_id', optional($cars)->mark_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cars.mark_id__placeholder') }}</option>
        	@foreach ($CarMarks as $key => $CarMark)
			    <option value="{{ $key }}" {{ old('mark_id', optional($cars)->mark_id) == $key ? 'selected' : '' }}>
			    	{{ $CarMark }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('mark_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('place_id') ? 'has-error' : '' }}">
    <label for="place_id" class=" control-label">{{ trans('cars.place_id') }}</label>
    <div class="">
        <select class="form-control" id="place_id" name="place_id" required="true">
        	    <option value="" style="display: none;" {{ old('place_id', optional($cars)->place_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cars.place_id__placeholder') }}</option>
        	@foreach ($Countries as $key => $Country)
			    <option value="{{ $key }}" {{ old('place_id', optional($cars)->place_id) == $key ? 'selected' : '' }}>
			    	{{ $Country }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('place_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('plateNo') ? 'has-error' : '' }}">
    <label for="plateNo" class=" control-label">{{ trans('cars.plateNo') }}</label>
    <div class="">
        <input class="form-control" name="plateNo" type="text" id="plateNo" value="{{ old('plateNo', optional($cars)->plateNo) }}" minlength="1" required="true" placeholder="{{ trans('cars.plateNo__placeholder') }}">
        {!! $errors->first('plateNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('valueUsd') ? 'has-error' : '' }}">
    <label for="valueUsd" class=" control-label">{{ trans('cars.valueUsd') }}</label>
    <div class="">
        <input class="form-control" name="valueUsd" type="number" id="valueUsd" value="{{ old('valueUsd', optional($cars)->valueUsd) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cars.valueUsd__placeholder') }}" step="any">
        {!! $errors->first('valueUsd', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('machineNo') ? 'has-error' : '' }}">
    <label for="machineNo" class=" control-label">{{ trans('cars.machineNo') }}</label>
    <div class="">
        <input class="form-control" name="machineNo" type="text" id="machineNo" value="{{ old('machineNo', optional($cars)->machineNo) }}" minlength="1" required="true" placeholder="{{ trans('cars.machineNo__placeholder') }}">
        {!! $errors->first('machineNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('chassisNo') ? 'has-error' : '' }}">
    <label for="chassisNo" class=" control-label">{{ trans('cars.chassisNo') }}</label>
    <div class="">
        <input class="form-control" name="chassisNo" type="text" id="chassisNo" value="{{ old('chassisNo', optional($cars)->chassisNo) }}" minlength="1" required="true" placeholder="{{ trans('cars.chassisNo__placeholder') }}">
        {!! $errors->first('chassisNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group   {{ $errors->has('color') ? 'has-error' : '' }}">
    <label for="color" class=" control-label">{{ trans('cars.color') }}</label>
    <div class="">
        <input class="form-control" name="color" type="text" id="color" value="{{ old('color', optional($cars)->color) }}" minlength="1" maxlength="16" required="true" placeholder="{{ trans('cars.color__placeholder') }}">
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>