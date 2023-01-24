
<div class="form-group {{ $errors->has('grname') ? 'has-error' : '' }}">
    <label for="grname" class="col-md-2 control-label">{{ trans('guarefrances.grname') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grname" type="text" id="grname" value="{{ old('grname', optional($guarefrances)->grname) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('guarefrances.grname__placeholder') }}">
        {!! $errors->first('grname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grnationality') ? 'has-error' : '' }}">
    <label for="grnationality" class="col-md-2 control-label">{{ trans('guarefrances.grnationality') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grnationality" type="text" id="grnationality" value="{{ old('grnationality', optional($guarefrances)->grnationality) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('guarefrances.grnationality__placeholder') }}">
        {!! $errors->first('grnationality', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grnationalityNo') ? 'has-error' : '' }}">
    <label for="grnationalityNo" class="col-md-2 control-label">{{ trans('guarefrances.grnationalityNo') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grnationalityNo" type="text" id="grnationalityNo" value="{{ old('grnationalityNo', optional($guarefrances)->grnationalityNo) }}" minlength="1" required="true" placeholder="{{ trans('guarefrances.grnationalityNo__placeholder') }}">
        {!! $errors->first('grnationalityNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grcountry_id') ? 'has-error' : '' }}">
    <label for="grcountry_id" class="col-md-2 control-label">{{ trans('guarefrances.grcountry_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="grcountry_id" name="grcountry_id" required="true">
        	    <option value="" style="display: none;" {{ old('grcountry_id', optional($guarefrances)->grcountry_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarefrances.grcountry_id__placeholder') }}</option>
        	@foreach ($Countries as $key => $Country)
			    <option value="{{ $key }}" {{ old('grcountry_id', optional($guarefrances)->grcountry_id) == $key ? 'selected' : '' }}>
			    	{{ $Country }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('grcountry_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grstate_id') ? 'has-error' : '' }}">
    <label for="grstate_id" class="col-md-2 control-label">{{ trans('guarefrances.grstate_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="grstate_id" name="grstate_id" required="true">
        	    <option value="" style="display: none;" {{ old('grstate_id', optional($guarefrances)->grstate_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarefrances.grstate_id__placeholder') }}</option>
        	@foreach ($States as $key => $State)
			    <option value="{{ $key }}" {{ old('grstate_id', optional($guarefrances)->grstate_id) == $key ? 'selected' : '' }}>
			    	{{ $State }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('grstate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grcity') ? 'has-error' : '' }}">
    <label for="grcity" class="col-md-2 control-label">{{ trans('guarefrances.grcity') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grcity" type="text" id="grcity" value="{{ old('grcity', optional($guarefrances)->grcity) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('guarefrances.grcity__placeholder') }}">
        {!! $errors->first('grcity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grblock') ? 'has-error' : '' }}">
    <label for="grblock" class="col-md-2 control-label">{{ trans('guarefrances.grblock') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grblock" type="text" id="grblock" value="{{ old('grblock', optional($guarefrances)->grblock) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('guarefrances.grblock__placeholder') }}">
        {!! $errors->first('grblock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grhouseNo') ? 'has-error' : '' }}">
    <label for="grhouseNo" class="col-md-2 control-label">{{ trans('guarefrances.grhouseNo') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grhouseNo" type="text" id="grhouseNo" value="{{ old('grhouseNo', optional($guarefrances)->grhouseNo) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('guarefrances.grhouseNo__placeholder') }}">
        {!! $errors->first('grhouseNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grstreet') ? 'has-error' : '' }}">
    <label for="grstreet" class="col-md-2 control-label">{{ trans('guarefrances.grstreet') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grstreet" type="text" id="grstreet" value="{{ old('grstreet', optional($guarefrances)->grstreet) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('guarefrances.grstreet__placeholder') }}">
        {!! $errors->first('grstreet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grwork_address') ? 'has-error' : '' }}">
    <label for="grwork_address" class="col-md-2 control-label">{{ trans('guarefrances.grwork_address') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grwork_address" type="text" id="grwork_address" value="{{ old('grwork_address', optional($guarefrances)->grwork_address) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('guarefrances.grwork_address__placeholder') }}">
        {!! $errors->first('grwork_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grtel') ? 'has-error' : '' }}">
    <label for="grtel" class="col-md-2 control-label">{{ trans('guarefrances.grtel') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grtel" type="text" id="grtel" value="{{ old('grtel', optional($guarefrances)->grtel) }}" minlength="1" required="true" placeholder="{{ trans('guarefrances.grtel__placeholder') }}">
        {!! $errors->first('grtel', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('guarefrances.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($guarefrances)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarefrances.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($guarefrances)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_by') ? 'has-error' : '' }}">
    <label for="updated_by" class="col-md-2 control-label">{{ trans('guarefrances.updated_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="updated_by" name="updated_by">
        	    <option value="" style="display: none;" {{ old('updated_by', optional($guarefrances)->updated_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarefrances.updated_by__placeholder') }}</option>
        	@foreach ($updaters as $key => $updater)
			    <option value="{{ $key }}" {{ old('updated_by', optional($guarefrances)->updated_by) == $key ? 'selected' : '' }}>
			    	{{ $updater }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gua_id') ? 'has-error' : '' }}">
    <label for="gua_id" class="col-md-2 control-label">{{ trans('guarefrances.gua_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="gua_id" name="gua_id" required="true">
        	    <option value="" style="display: none;" {{ old('gua_id', optional($guarefrances)->gua_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarefrances.gua_id__placeholder') }}</option>
        	@foreach ($Guarantors as $key => $Guarantor)
			    <option value="{{ $key }}" {{ old('gua_id', optional($guarefrances)->gua_id) == $key ? 'selected' : '' }}>
			    	{{ $Guarantor }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('gua_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

