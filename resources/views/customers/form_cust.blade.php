					
					<p class="mg-b-20">البيانات الاساسية</p>

<div class="row row-sm col-md-9 col-lg-12">
	
  
	<div class="col-md-5 col-lg-4 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label for="name" class=" control-label">{{ trans('customers.name') }}</label>

		<div class="col">

		<input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($customers)->name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('customers.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
			</div>
		</div>

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
			<input class="form-control fc-datepicker" name="residenceDate" type="text" id="residenceDate" value="{{ old('residenceDate', optional($customers)->residenceDate) }}" required="true" placeholder="{{ trans('customers.residenceDate__placeholder') }}">
			{!! $errors->first('residenceDate', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	@if(Auth::user()->hasAnyRole(['superAdmin','admin','employee']))		

		<div class="col-md-5 col-lg-4 form-group {{ $errors->has('entryDate') ? 'has-error' : '' }}">
			<label for="entryDate" class=" control-label">{{ trans('emportcars.entryDate') }}</label>
			<div class="">

			<input class="form-control fc-datepicker" name="entryDate"  id="entryDate" value="{{ old('entryDate', optional($customers)->entryDate) }}"  placeholder="{{ trans('emportcars.entryDate__placeholder') }}">
				
				{!! $errors->first('entryDate', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
		<div class="col-md-5 col-lg-4 form-group {{ $errors->has('exitDate') ? 'has-error' : '' }}">
			<label for="exitDate" class=" control-label">{{ trans('emportcars.exitDate') }}</label>
			<div class="">
				<input class="form-control fc-datepicker" name="exitDate" type="text" id="exitDate" readonly value="{{ old('exitDate', optional($customers)->exitDate) }}"  placeholder="{{ trans('emportcars.exitDate__placeholder') }}">
				{!! $errors->first('exitDate', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
	@endif
</div>


<script>
    
 
      $(document).ready(function() {
		var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
        }).val();

		$('#entryDate').on('change', function() {

                var dateTypeVar = $('#entryDate').datepicker('getDate');
			//	alert(dateTypeVar);

                var entryd= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
                $('#entryDate').val(entryd);

                var newDate = moment(entryd, "YYYY-MM-DD").add(3, 'months').format('YYYY-MM-DD');

                $('#exitDate').val(newDate);

		});

		$('#issueDate').on('change', function() {

                var dateTypeVar = $('#issueDate').datepicker('getDate');
                var isued= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
                $('#issueDate').val(isued);
            
                var newDate = moment(isued, "YYYY-MM-DD").add(12, 'months').format('YYYY-MM-DD');
                $('#expiryDate').val(newDate);

		});
		//////////////////////////////////////////////////
		//$('#addCustomer').validator('validate');

    })
    
    </script>
