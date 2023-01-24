
<div class="form-group {{ $errors->has('emp_id') ? 'has-error' : '' }}">
    <label for="emp_id" class="col-md-2 control-label">{{ trans('intarnal_files.emp_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="emp_id" name="emp_id" required="true">
        	    <option value="" style="display: none;" {{ old('emp_id', optional($intarnalFiles)->emp_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('intarnal_files.emp_id__placeholder') }}</option>
        	@foreach ($emps as $key => $emp)
			    <option value="{{ $key }}" {{ old('emp_id', optional($intarnalFiles)->emp_id) == $key ? 'selected' : '' }}>
			    	{{ $emp }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('emp_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('serialNo') ? 'has-error' : '' }}">
    <label for="serialNo" class="col-md-2 control-label">{{ trans('intarnal_files.serialNo') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="serialNo" type="text" id="serialNo" value="{{ old('serialNo', optional($intarnalFiles)->serialNo) }}" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.serialNo__placeholder') }}">
        {!! $errors->first('serialNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">{{ trans('intarnal_files.date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($intarnalFiles)->date) }}" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.date__placeholder') }}">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('expiryDuration') ? 'has-error' : '' }}">
    <label for="expiryDuration" class="col-md-2 control-label">{{ trans('intarnal_files.expiryDuration') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="expiryDuration" type="text" id="expiryDuration" value="{{ old('expiryDuration', optional($intarnalFiles)->expiryDuration) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('intarnal_files.expiryDuration__placeholder') }}">
        {!! $errors->first('expiryDuration', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exitDate') ? 'has-error' : '' }}">
    <label for="exitDate" class="col-md-2 control-label">{{ trans('intarnal_files.exitDate') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="exitDate" type="text" id="exitDate" value="{{ old('exitDate', optional($intarnalFiles)->exitDate) }}" required="true" placeholder="{{ trans('intarnal_files.exitDate__placeholder') }}">
        {!! $errors->first('exitDate', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
    <label for="file_name" class="col-md-2 control-label">{{ trans('intarnal_files.file_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_name" type="text" id="file_name" value="{{ old('file_name', optional($intarnalFiles)->file_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('intarnal_files.file_name__placeholder') }}">
        {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_path') ? 'has-error' : '' }}">
    <label for="file_path" class="col-md-2 control-label">{{ trans('intarnal_files.file_path') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_path" type="text" id="file_path" value="{{ old('file_path', optional($intarnalFiles)->file_path) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('intarnal_files.file_path__placeholder') }}">
        {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
    </div>
</div>

