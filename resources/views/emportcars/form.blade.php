

 <div class="row row-sm col-md-9 col-lg-12">
<?php

    $readagent="";
    $readextarnel="";
if(Auth::user()->hasRole('agent'))
    $readagent="readonly";

elseif(Auth::user()->hasRole('extoffice'))

        $readextarnel="readonly";
        
?>
 <div class="col-md-5 col-lg-4  form-group {{ $errors->has('carnetNo') ? 'has-error' : '' }}">
            <label for="carnetNo" class=" control-label">{{ trans('emportcars.carnetNo') }}</label>
            <div class="">
                <input class="form-control" name="carnetNo" type="text" id="carnetNo" {{$readextarnel}} value="{{ old('carnetNo', optional($emportcars)->carnetNo) }}" minlength="1" required="true" placeholder="{{ trans('emportcars.carnetNo__placeholder') }}">
                {!! $errors->first('carnetNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        
        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('car_id') ? 'has-error' : '' }}">
            <label for="car_id" class=" control-label">{{ trans('emportcars.car_id') }}</label>
            <div class="">
            <input name="car_id" type="hidden" value="{{ optional($emportcars->car->Vehicle)->id }}">

            <input class="form-control" name="car_name" type="text" id="" value="{{ optional($emportcars->car->Vehicle)->name }}" readonly>

            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('cus_id') ? 'has-error' : '' }}">
            <label for="cus_id" class=" control-label">{{ trans('emportcars.cus_id') }}</label>
            <div class="">

            <input class="form-control" name="cus_name" type="text" id="" value="{{ optional($emportcars->Customer)->name }}" readonly>

            </div>
        </div>

       

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('port_id') ? 'has-error' : '' }}">
            <label for="port_id" class=" control-label">{{ trans('emportcars.port_id') }}</label>
            <div class="">
                <select class="form-control" id="port_id" name="port_id" required="true" {{$readextarnel}} >
                        <option value="" style="display: none;" {{ old('port_id', optional($emportcars)->port_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('emportcars.port_id__placeholder') }}</option>
                    @foreach ($Shippingports as $key => $Shippingport)
                        <option value="{{ $Shippingport->id }}" {{ old('port_id', optional($emportcars)->port_id) == $Shippingport->id ? 'selected' : '' }}>
                            {{ $Shippingport->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('port_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
            <label for="destination" class=" control-label">{{ trans('emportcars.destination') }}</label>
            <div class="">
                <input class="form-control" name="destination" type="text" id="destination" {{$readextarnel}}  value="{{ old('destination', optional($emportcars)->destination) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('emportcars.destination__placeholder') }}">
                {!! $errors->first('destination', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('issueDate') ? 'has-error' : '' }}">
            <label for="issueDate" class=" control-label">{{ trans('emportcars.issueDate') }}</label>
            <div class="">
                <input class="form-control" name="issueDate" type="date" id="issueDate" {{$readextarnel}} value="{{ old('issueDate', optional($emportcars)->issueDate) }}" required="true" placeholder="{{ trans('emportcars.issueDate__placeholder') }}">
                {!! $errors->first('issueDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('expiryDate') ? 'has-error' : '' }}">
            <label for="expiryDate" class=" control-label">{{ trans('emportcars.expiryDate') }}</label>
            <div class="">
                <input class="form-control" name="expiryDate" type="date" id="expiryDate" {{$readextarnel}} value="{{ old('expiryDate', optional($emportcars)->expiryDate) }}" required="true" placeholder="{{ trans('emportcars.expiryDate__placeholder') }}">
                {!! $errors->first('expiryDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        @if(Auth::user()->hasRole('extoffice'))

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('ship_id') ? 'has-error' : '' }}">
            <label for="ship_id" class=" control-label">{{ trans('emportcars.ship_id') }}</label>
            <div class="">
                <select class="form-control" id="ship_id" name="ship_id" required="true" {{$readagent}} >
                        <option value="" style="display: none;" {{ old('ship_id', optional($emportcars)->ship_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('emportcars.ship_id__placeholder') }}</option>
                    @foreach ($Ships as $key => $Ship)
                        <option value="{{ $Ship->id }}" {{ old('ship_id', optional($emportcars)->ship_id) ==  $Ship->id ? 'selected' : '' }}>
                            {{ $Ship->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('ship_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('portAccess_id') ? 'has-error' : '' }}">
            <label for="portAccess_id" class=" control-label">{{ trans('emportcars.portAccess_id') }}</label>
            <div class="">
                <select class="form-control" id="portAccess_id" name="portAccess_id" {{$readagent}} required="true">
                        <option value="" style="display: none;" {{ old('portAccess_id', optional($emportcars)->portAccess_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('emportcars.portAccess_id__placeholder') }}</option>
                    @foreach ($Shippingports as $key => $Shippingport)
                        <option value="{{ $Shippingport->id }}" {{ old('portAccess_id', optional($emportcars)->portAccess_id) == $Shippingport->id ? 'selected' : '' }}>
                            {{ $Shippingport->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('portAccess_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

     

        

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('shippingAgent') ? 'has-error' : '' }}">
            <label for="shippingAgent" class=" control-label">{{ trans('emportcars.shippingAgent') }}</label>
            <div class="">
                <input class="form-control" name="shippingAgent" type="text" id="shippingAgent" {{$readagent}} value="{{ old('shippingAgent', optional($emportcars)->shippingAgent) }}" min="1" max="100" required="true" placeholder="{{ trans('emportcars.shippingAgent__placeholder') }}">
                {!! $errors->first('shippingAgent', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('deliveryPerNo') ? 'has-error' : '' }}">
            <label for="deliveryPerNo" class=" control-label">{{ trans('emportcars.deliveryPerNo') }}</label>
            <div class="">
                <input class="form-control" name="deliveryPerNo" type="text" id="deliveryPerNo" {{$readagent}} value="{{ old('deliveryPerNo', optional($emportcars)->deliveryPerNo) }}" minlength="1" required="true" placeholder="{{ trans('emportcars.deliveryPerNo__placeholder') }}">
                {!! $errors->first('deliveryPerNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
<?php /*
        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('deliveryPerDate') ? 'has-error' : '' }}">
            <label for="deliveryPerDate" class=" control-label">{{ trans('emportcars.deliveryPerDate') }}</label>
            <div class="">
                <input class="form-control" name="deliveryPerDate" type="date" id="deliveryPerDate" value="{{ old('deliveryPerDate', optional($emportcars)->deliveryPerDate) }}" required="true" placeholder="{{ trans('emportcars.deliveryPerDate__placeholder') }}">
                {!! $errors->first('deliveryPerDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
     

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('arrivedDate') ? 'has-error' : '' }}">
            <label for="arrivedDate" class=" control-label">{{ trans('emportcars.arrivedDate') }}</label>
            <div class="">
                <input class="form-control" name="arrivedDate" type="date" id="arrivedDate" value="{{ old('arrivedDate', optional($emportcars)->arrivedDate) }}" required="true" placeholder="{{ trans('emportcars.arrivedDate__placeholder') }}">
                {!! $errors->first('arrivedDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
   */ ?>
      

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('entryDate') ? 'has-error' : '' }}">
            <label for="entryDate" class=" control-label">{{ trans('emportcars.entryDate') }}</label>
            <div class="">
                <input class="form-control" name="entryDate" type="date" id="entryDate" {{$readagent}} value="{{ old('entryDate', optional($emportcars)->entryDate) }}" required="true" placeholder="{{ trans('emportcars.entryDate__placeholder') }}">
                {!! $errors->first('entryDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group {{ $errors->has('exitDate') ? 'has-error' : '' }}">
            <label for="exitDate" class=" control-label">{{ trans('emportcars.exitDate') }}</label>
            <div class="">
                <input class="form-control" name="exitDate" type="date" id="exitDate" {{$readagent}} value="{{ old('exitDate', optional($emportcars)->exitDate) }}" required="true" placeholder="{{ trans('emportcars.exitDate__placeholder') }}">
                {!! $errors->first('exitDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
@endif
</div>