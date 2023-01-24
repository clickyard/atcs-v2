
<div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
    <label for="year" class="col-md-2 control-label">{{ trans('cardetails.year') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="year" type="text" id="year" value="{{ old('year', optional($cardetails)->year) }}" minlength="1" required="true" placeholder="{{ trans('cardetails.year__placeholder') }}">
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
    <label for="weight" class="col-md-2 control-label">{{ trans('cardetails.weight') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="weight" type="text" id="weight" value="{{ old('weight', optional($cardetails)->weight) }}" minlength="1" required="true" placeholder="{{ trans('cardetails.weight__placeholder') }}">
        {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cylindersNo') ? 'has-error' : '' }}">
    <label for="cylindersNo" class="col-md-2 control-label">{{ trans('cardetails.cylindersNo') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="cylindersNo" type="text" id="cylindersNo" value="{{ old('cylindersNo', optional($cardetails)->cylindersNo) }}" minlength="1" required="true" placeholder="{{ trans('cardetails.cylindersNo__placeholder') }}">
        {!! $errors->first('cylindersNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hoursPower') ? 'has-error' : '' }}">
    <label for="hoursPower" class="col-md-2 control-label">{{ trans('cardetails.hoursPower') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="hoursPower" type="text" id="hoursPower" value="{{ old('hoursPower', optional($cardetails)->hoursPower) }}" minlength="1" maxlength="10" required="true" placeholder="{{ trans('cardetails.hoursPower__placeholder') }}">
        {!! $errors->first('hoursPower', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">{{ trans('cardetails.type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($cardetails)->type) }}" minlength="1" maxlength="16" required="true" placeholder="{{ trans('cardetails.type__placeholder') }}">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('seats') ? 'has-error' : '' }}">
    <label for="seats" class="col-md-2 control-label">{{ trans('cardetails.seats') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="seats" type="number" id="seats" value="{{ old('seats', optional($cardetails)->seats) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('cardetails.seats__placeholder') }}">
        {!! $errors->first('seats', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('radio') ? 'has-error' : '' }}">
    <label for="radio" class="col-md-2 control-label">{{ trans('cardetails.radio') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="radio" type="number" id="radio" value="{{ old('radio', optional($cardetails)->radio) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('cardetails.radio__placeholder') }}">
        {!! $errors->first('radio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numTires') ? 'has-error' : '' }}">
    <label for="numTires" class="col-md-2 control-label">{{ trans('cardetails.numTires') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="numTires" type="number" id="numTires" value="{{ old('numTires', optional($cardetails)->numTires) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('cardetails.numTires__placeholder') }}">
        {!! $errors->first('numTires', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('airCondition') ? 'has-error' : '' }}">
    <label for="airCondition" class="col-md-2 control-label">{{ trans('cardetails.airCondition') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="airCondition" type="text" id="airCondition" value="{{ old('airCondition', optional($cardetails)->airCondition) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('cardetails.airCondition__placeholder') }}">
        {!! $errors->first('airCondition', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('others') ? 'has-error' : '' }}">
    <label for="others" class="col-md-2 control-label">{{ trans('cardetails.others') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="others" type="text" id="others" value="{{ old('others', optional($cardetails)->others) }}" maxlength="4294967295" placeholder="{{ trans('cardetails.others__placeholder') }}">
        {!! $errors->first('others', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('car_id') ? 'has-error' : '' }}">
    <label for="car_id" class="col-md-2 control-label">{{ trans('cardetails.car_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="car_id" name="car_id" required="true">
        	    <option value="" style="display: none;" {{ old('car_id', optional($cardetails)->car_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cardetails.car_id__placeholder') }}</option>
        	@foreach ($Cars as $key => $Car)
			    <option value="{{ $key }}" {{ old('car_id', optional($cardetails)->car_id) == $key ? 'selected' : '' }}>
			    	{{ $Car }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('car_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('cardetails.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($cardetails)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cardetails.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($cardetails)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_by') ? 'has-error' : '' }}">
    <label for="updated_by" class="col-md-2 control-label">{{ trans('cardetails.updated_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="updated_by" name="updated_by">
        	    <option value="" style="display: none;" {{ old('updated_by', optional($cardetails)->updated_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cardetails.updated_by__placeholder') }}</option>
        	@foreach ($updaters as $key => $updater)
			    <option value="{{ $key }}" {{ old('updated_by', optional($cardetails)->updated_by) == $key ? 'selected' : '' }}>
			    	{{ $updater }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

