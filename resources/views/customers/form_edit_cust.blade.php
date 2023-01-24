					
					<p class="mg-b-20">البيانات الاساسية</p>

<div class="row row-sm col-md-9 col-lg-12">
	
  
	<div class="col-md-5 col-lg-4 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label for="name" class=" control-label">{{ trans('customers.name') }}</label>

		<div class="col">

		<input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($customers)->name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('customers.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
<?php /*
		<div class="col-md-5 col-lg-4  form-group {{ $errors->has('nationality') ? 'has-error' : '' }}">
		<label for="nationality" class="col control-label">{{ trans('customers.nationality') }}</label>

		<div class="col">

				<input class="form-control" name="nationality" type="text" id="nationality" value="{{ old('nationality', optional($customers)->nationality) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('customers.nationality__placeholder') }}">
				{!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
		*/ ?>

		<div class="col-md-5 col-lg-4 form-group {{ $errors->has('nationalityNo') ? 'has-error' : '' }}">
			<div class=" col">
					<label for="nationalityNo" class=" control-label">{{ trans('customers.nationalityNo') }} </label>

				<input class="form-control" name="nationalityNo" type="text" id="nationalityNo" value="{{ old('nationalityNo', optional($customers)->nationalityNo) }}" minlength="1" required="true" placeholder="Enter nationality no here...">
				{!! $errors->first('nationalityNo', '<p class="help-block">:message</p>') !!}
			</div>
		</div>

		<div class="col-md-5 col-lg-4 form-group {{ $errors->has('passport') ? 'has-error' : '' }}">
    <label for="passport" class=" control-label">{{ trans('customers.passport') }}</label>
    <div class="">
        <input class="form-control" name="passport" type="text" id="passport" value="{{ old('passport', optional($customers)->passport) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('customers.passport__placeholder') }}">
        {!! $errors->first('passport', '<p class="help-block">:message</p>') !!}
    </div>
	</div>

	<div class="col-md-5 col-lg-4  form-group {{ $errors->has('passportDate') ? 'has-error' : '' }}">
		<label for="passportDate" class=" control-label">{{ trans('customers.passportDate') }}</label>
		<div class="">
			<input class="form-control"   name="passportDate" type="date"   id="passportDate" value="{{ old('passportDate', optional($customers)->passportDate) }}" required="true" placeholder="{{ trans('customers.passportDate__placeholder') }}">
			{!! $errors->first('passportDate', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-md-5 col-lg-4 form-group {{ $errors->has('residenceNo') ? 'has-error' : '' }}">
		<label for="residenceNo" class=" control-label">{{ trans('customers.residenceNo') }}</label>
		<div class="">
			<input class="form-control" name="residenceNo" type="text" id="residenceNo" value="{{ old('residenceNo', optional($customers)->residenceNo) }}" minlength="1" required="true" placeholder="{{ trans('customers.residenceNo__placeholder') }}">
			{!! $errors->first('residenceNo', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="col-md-5 col-lg-4 form-group {{ $errors->has('residenceDate') ? 'has-error' : '' }}">
		<label for="residenceDate" class=" control-label">{{ trans('customers.residenceDate') }}</label>
		<div class="">
			<input class="form-control" name="residenceDate" type="date" id="residenceDate" value="{{ old('residenceDate', optional($customers)->residenceDate) }}" required="true" placeholder="{{ trans('customers.residenceDate__placeholder') }}">
			{!! $errors->first('residenceDate', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<?php /*
		<div class="col-md-5 col-lg-4 form-group {{ $errors->has('entryDate') ? 'has-error' : '' }}">
			<label for="entryDate" class=" control-label">{{ trans('emportcars.entryDate') }}</label>
			<div class="">
				<input class="form-control " name="entryDate" type="date" id="entryDate" value="{{ old('entryDate', optional($customers->car)->entryDate) }}" required="true" placeholder="{{ trans('emportcars.entryDate__placeholder') }}">
				{!! $errors->first('entryDate', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
		<div class="col-md-5 col-lg-4 form-group {{ $errors->has('exitDate') ? 'has-error' : '' }}">
			<label for="exitDate" class=" control-label">{{ trans('emportcars.exitDate') }}</label>
			<div class="">
				<input class="form-control" name="exitDate" type="date" id="exitDate" value="{{ old('exitDate', optional($customers->car)->exitDate) }}" required="true" placeholder="{{ trans('emportcars.exitDate__placeholder') }}">
				{!! $errors->first('exitDate', '<p class="help-block">:message</p>') !!}
			</div>
				</div> */?>
</div>




