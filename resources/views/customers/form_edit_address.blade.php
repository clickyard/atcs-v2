					
					<p class="mg-b-20">العنوان </p>

<div class="row row-sm col-md-9 col-lg-12">
		


<div class="col-md-5 col-lg-4  form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
    <label for="state_id" class=" control-label">{{ trans('customers.state_id') }}</label>
    <div class="">
        <select class="form-control" id="state_id" name="state_id" required="true">
        	    <option value=""   disabled >{{ trans('customers.state_id__placeholder') }}</option>
        	@foreach ($sdStates as   $State)
			    <option value="{{ $State->id }}" {{ old('state_id', optional($customers)->state_id) == $State->id ? 'selected' : '' }}>
			    	{{ $State->name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class=" control-label">{{ trans('customers.city') }}</label>
    <div class="">
        <input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($customers)->city) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('customers.city__placeholder') }}">
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group {{ $errors->has('block') ? 'has-error' : '' }}">
    <label for="block" class=" control-label">{{ trans('customers.block') }}</label>
    <div class="">
        <input class="form-control" name="block" type="text" id="block" value="{{ old('block', optional($customers)->block) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('customers.block__placeholder') }}">
        {!! $errors->first('block', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group {{ $errors->has('houseNo') ? 'has-error' : '' }}">
    <label for="houseNo" class=" control-label">{{ trans('customers.houseNo') }}</label>
    <div class="">
        <input class="form-control" name="houseNo" type="text" id="houseNo" value="{{ old('houseNo', optional($customers)->houseNo) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('customers.houseNo__placeholder') }}">
        {!! $errors->first('houseNo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group {{ $errors->has('street') ? 'has-error' : '' }}">
    <label for="street" class=" control-label">{{ trans('customers.street') }}</label>
    <div class="">
        <input class="form-control" name="street" type="text" id="street" value="{{ old('street', optional($customers)->street) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('customers.street__placeholder') }}">
        {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-5 col-lg-4  form-group {{ $errors->has('work_address') ? 'has-error' : '' }}">
    <label for="work_address" class=" control-label">{{ trans('customers.work_address') }}</label>
    <div class="">
        <input class="form-control" name="work_address" type="text" id="work_address" value="{{ old('work_address', optional($customers)->work_address) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('customers.work_address__placeholder') }}">
        {!! $errors->first('work_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col-md-5 col-lg-4  form-group {{ $errors->has('tel') ? 'has-error' : '' }}" >
    <label for="tel" class=" control-label">{{ trans('customers.tel') }}</label>
    <div class="" >
        <input class="form-control text-left "  name="tel" type="tel" id=""      value="{{ old('tel', optional($customers)->tel) }}" minlength="1" required="true" placeholder="{{ trans('customers.tel__placeholder') }}">
        {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col-md-5 col-lg-4  form-group {{ $errors->has('tel') ? 'has-error' : '' }}" >

    <label for="tel2" class=" control-label">{{ trans('customers.tel2') }}</label>
    <div class="" >
        <input class="form-control text-left" name="tel2" type="tel" id="" value="{{ old('tel2', optional($customers)->tel2) }}" placeholder="{{ trans('customers.tel2__placeholder') }}">
        {!! $errors->first('tel2', '<p class="help-block">:message</p>') !!}
 
        </div>
</div>


<div class=" col-md-5 col-lg-4  form-group {{ $errors->has('whatsup') ? 'has-error' : '' }}">
    <label for="whatsup" class=" control-label">{{ trans('customers.whatsup') }}</label>
    <div class="">
        <input class="form-control text-left "  name="whatsup" type="tel" id="whatsup" value="{{ old('whatsup', optional($customers)->whatsup) }}" placeholder="{{ trans('customers.whatsup__placeholder') }}">
        {!! $errors->first('whatsup', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-5 col-lg-4  form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class=" control-label">{{ trans('customers.email') }}</label>
    <div class="">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($customers)->email) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('customers.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
