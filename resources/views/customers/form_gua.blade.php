<p class="mg-b-20"> بيانات الكفيل الضامن المتضامن او الشركة</p>

<div class="row row-sm col-md-9 col-lg-12">

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gname') ? 'has-error' : '' }}">
    <label for="gname" class=" control-label">{{ trans('guarantors.gname') }}</label>
    <div class="">
        <input class="form-control" name="gname" type="text" id="gname" value="{{ old('gname', optional($customers)->gname) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('guarantors.gname__placeholder') }}">
        {!! $errors->first('gname', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gcountry_id') ? 'has-error' : '' }}">
    <label for="gcountry_id" class=" control-label">{{ trans('guarantors.gcountry_id') }}</label>
    <div class="">
    <select class="form-control" id="gcountry_id" name="gcountry_id" required="true">
        	    <option value="" style="display: none;" {{ old('gcountry_id', optional($customers)->gcountry_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarantors.gcountry_id__placeholder') }}</option>
        	@foreach ($gCountries as $key => $Country)
			    <option value="{{ $Country->id }}" {{ old('gcountry_id', optional($customers)->gcountry_id) == $Country->id ? 'selected' : '' }}>
			    	{{ $Country->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('gcountry_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gstate_id') ? 'has-error' : '' }}">
    <label for="gstate_id" class=" control-label">{{ trans('guarantors.gstate_id') }}</label>
    <div class="">
    <select class="form-control" id="gstate_id" name="gstate_id" required="true">
        	    <option value="" style="display: none;" {{ old('gstate_id', optional($customers)->gstate_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('guarantors.gstate_id__placeholder') }}</option>
        	@foreach ($SaStates as $key => $State)
			    <option value="{{ $State->id }}" {{ old('gstate_id', optional($customers)->gstate_id) == $State->id  ? 'selected' : '' }}>
			    	{{ $State->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('gstate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gcity') ? 'has-error' : '' }}">
    <label for="gcity" class=" control-label">{{ trans('guarantors.gcity') }}</label>
    <div class="">
        <input class="form-control" name="gcity" type="text" id="gcity" value="{{ old('gcity', optional($customers)->gcity) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('guarantors.gcity__placeholder') }}">
        {!! $errors->first('gcity', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('ghouseNo') ? 'has-error' : '' }}">
    <label for="ghouseNo" class=" control-label">{{ trans('guarantors.ghouseNo') }}</label>
    <div class="">
        <input class="form-control" name="ghouseNo" type="text" id="ghouseNo" value="{{ old('ghouseNo', optional($customers)->ghouseNo) }}" minlength="1" maxlength="100" placeholder="{{ trans('guarantors.ghouseNo__placeholder') }}">
        {!! $errors->first('ghouseNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gstreet') ? 'has-error' : '' }}">
    <label for="gstreet" class=" control-label">{{ trans('guarantors.gstreet') }}</label>
    <div class="">
        <input class="form-control" name="gstreet" type="text" id="gstreet" value="{{ old('gstreet', optional($customers)->gstreet) }}" minlength="1" maxlength="900" placeholder="{{ trans('guarantors.gstreet__placeholder') }}">
        {!! $errors->first('gstreet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gwork_address') ? 'has-error' : '' }}">
    <label for="gwork_address" class=" control-label">{{ trans('guarantors.gwork_address') }}</label>
    <div class="">
        <input class="form-control" name="gwork_address" type="text" id="gwork_address" value="{{ old('gwork_address', optional($customers)->gwork_address) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('guarantors.gwork_address__placeholder') }}">
        {!! $errors->first('gwork_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gtel') ? 'has-error' : '' }}">
    <label for="gtel" class=" control-label">{{ trans('guarantors.gtel') }}</label>
    <div class="">
        <input class="form-control" name="gtel" type="tel" id="" value="{{ old('gtel', optional($customers)->gtel) }}" minlength="1" required="true" placeholder="{{ trans('guarantors.gtel__placeholder') }}">
        {!! $errors->first('gtel', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gtel2') ? 'has-error' : '' }}">
    <label for="gtel2" class=" control-label">{{ trans('guarantors.gtel2') }}</label>
    <div class="">
        <input class="form-control" name="gtel2" type="tel" id="" value="{{ old('gtel2', optional($customers)->gtel2) }}" placeholder="{{ trans('guarantors.gtel2__placeholder') }}">
        {!! $errors->first('gtel2', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col-md-5 col-lg-4 form-group  {{ $errors->has('gwhatsup') ? 'has-error' : '' }}">
    <label for="gwhatsup" class=" control-label">{{ trans('guarantors.gwhatsup') }}</label>
    <div class="">
        <input class="form-control" name="gwhatsup" type="text" id="gwhatsup" value="{{ old('gwhatsup', optional($customers)->gwhatsup) }}" placeholder="{{ trans('guarantors.gwhatsup__placeholder') }}">
        {!! $errors->first('gwhatsup', '<p class="help-block">:message</p>') !!}
    </div>
</div>

</div>


