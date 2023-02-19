<p class="mg-b-20"> بيانات السيارة</p>

<div class="row row-sm col-md-9 col-lg-12">

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('veh_id') ? 'has-error' : '' }}">
            <label for="veh_id" class="control-label">{{ trans('cars.veh_id') }}</label>
            <div class="">
                <select class="form-control" id="veh_id" name="veh_id" required="true">
                        <option value=" " >{{ trans('cars.veh_id__placeholder') }}</option>
                    @foreach ($vehicles as $key => $veh)
                        <option value="{{ $veh->id }}"  {{ old('veh_id', optional($customers)->veh_id) == $key ? 'selected' : '' }}>
                            {{ $veh->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('veh_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('mark_id') ? 'has-error' : '' }}">
            <label for="mark_id" class="control-label">{{ trans('cars.mark_id') }}</label>
            <div class="">
                <select class="form-control" id="mark_id" name="mark_id" required="true">
                        <option value="" >{{ trans('cars.mark_id__placeholder') }}</option>
                    @foreach ($marks as $key =>  $mark)
                        <option value="{{ $mark->id }}" {{ old('mark_id', optional($customers)->mark_id) == $key ? 'selected' : '' }} >
                            {{ $mark->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('mark_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('year') ? 'has-error' : '' }}">
            <label for="year" class="control-label">{{ trans('cars.year') }}</label>
            <div class="">
                <input class="form-control" name="year" type="text" id="year" value="{{ old('year', optional($customers)->year) }}" min="1" max="100"  placeholder="{{ trans('cars.year__placeholder') }}">
                {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('color') ? 'has-error' : '' }}">
            <label for="color" class="control-label">{{ trans('cars.color') }}</label>
            <div class="">
                <input class="form-control" name="color" type="text" id="color" value="{{ old('color', optional($customers)->color) }}" min="1" max="100" required="true" placeholder="{{ trans('cars.color__placeholder') }}">
                {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
            </div>
        </div>


        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('chassisNo') ? 'has-error' : '' }}">
            <label for="chassisNo" class=" control-label">{{ trans('cars.chassisNo') }}</label>
            <div class="">
                <input class="form-control" name="chassisNo" type="text" id="chassisNo" value="{{ old('chassisNo', optional($customers)->chassisNo) }}" minlength="1" required="true" placeholder="{{ trans('cars.chassisNo__placeholder') }}">
                {!! $errors->first('chassisNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('machineNo') ? 'has-error' : '' }}">
            <label for="machineNo" class=" control-label">{{ trans('cars.machineNo') }}</label>
            <div class="">
                <input class="form-control" name="machineNo" type="text" id="machineNo" value="{{ old('machineNo', optional($customers)->machineNo) }}" minlength="1" required="true" placeholder="{{ trans('cars.machineNo__placeholder') }}">
                {!! $errors->first('machineNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div> 

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('plateNo') ? 'has-error' : '' }}">
            <label for="plateNo" class=" control-label">{{ trans('cars.plateNo') }}</label>
            <div class="">
                <input class="form-control" name="plateNo" type="text" id="plateNo" value="{{ old('plateNo', optional($customers)->plateNo) }}" minlength="1" required="true" placeholder="{{ trans('cars.plateNo__placeholder') }}">
                {!! $errors->first('plateNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div> 

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('valueUsd') ? 'has-error' : '' }}">
            <label for="valueUsd" class="control-label">{{ trans('cars.valueUsd') }}</label>
            <div class="">
                <input class="form-control" name="valueUsd" type="text" id="valueUsd" value="{{ old('valueUsd', optional($customers)->valueUsd) }}" min="1" max="100"  placeholder="{{ trans('cars.valueUsd__placeholder') }}">
                {!! $errors->first('valueUsd', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('place_id') ? 'has-error' : '' }}">
            <label for="place_id" class="control-label">{{ trans('cars.place_id') }}</label>
            <div class="">
                <select class="form-control" id="place_id" name="place_id" required="true">
                        <option value="" >{{ trans('cars.place_id__placeholder') }}</option>
                    @foreach ($Countries as  $country)
                        <option value="{{ $country->id }}" {{ old('place_id', optional($customers)->place_id) == $country->id ? 'selected' : '' }} >
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('place_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        </div>
        <hr/>

        <p class="mg-b-20">دفتر المرورو الجمركي</p>

        <div class="row row-sm col-md-9 col-lg-12">
            

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('carnetNo') ? 'has-error' : '' }}">
            <label for="carnetNo" class=" control-label">{{ trans('emportcars.carnetNo') }}</label>
            <div class="">
                <input class="form-control" name="carnetNo" type="text" id="carnetNo" value="{{ old('carnetNo', optional($customers)->carnetNo) }}" minlength="1" required="true" placeholder="{{ trans('emportcars.carnetNo__placeholder') }}">
                {!! $errors->first('carnetNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('issueDate') ? 'has-error' : '' }}">
            <label for="issueDate" class=" control-label">{{ trans('emportcars.issueDate') }}</label>
            <div class="">
                <input class="form-control fc-datepicker " name="issueDate" type="text" id="issueDate" value="{{ old('issueDate', optional($customers)->issueDate) }}" required="true" placeholder="{{ trans('emportcars.issueDate__placeholder') }}">
                {!! $errors->first('issueDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('port_id') ? 'has-error' : '' }}">
            <label for="port_id" class="control-label">{{ trans('emportcars.port_id') }}</label>
            <div class="col">
                <select class="form-control" id="port_id" name="port_id" required="true">
                        <option value="" >{{ trans('emportcars.port_id__placeholder') }}</option>
                    @foreach ($Shippingports as $Shippingport)
                        <option value="{{ $Shippingport->id }}" {{ old('port_id', optional($customers)->port_id) == $Shippingport->id ? 'selected' : '' }}>
                            {{ $Shippingport->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('port_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
            <label for="destination" class=" control-label">{{ trans('emportcars.destination') }}</label>
            <div class="">
                <input class="form-control" name="destination" type="text" id="destination" value="{{ old('destination', optional($customers)->destination) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('emportcars.destination__placeholder') }}">
                {!! $errors->first('destination', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
      @if(Auth::user()->hasAnyRole(['superAdmin','admin','employee']))		

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('portAccess_id') ? 'has-error' : '' }}">
            <label for="portAccess_id" class="control-label">{{ trans('emportcars.portAccess_id') }}</label>
            <div class="col">
                <select class="form-control" id="portAccess_id" name="portAccess_id" required="true">
                        <option value="" >{{ trans('emportcars.portAccess_id__placeholder') }}</option>
                    @foreach ($Shippingports as $key =>  $Shippingport)
                        <option value="{{ $Shippingport->id }}" {{ old('portAccess_id', optional($customers)->portAccess_id) == $Shippingport->id ? 'selected' : '' }}>
                            {{ $Shippingport->name  }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('portAccess_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
       
        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('ship_id') ? 'has-error' : '' }}">
            <label for="ship_id" class="control-label">{{ trans('emportcars.ship_id') }}</label>
            <div class="">
                <select class="form-control" id="ship_id" name="ship_id" required="true">
                        <option value="" >{{ trans('emportcars.ship_id__placeholder') }}</option>
                    @foreach ($Ships as $key => $Ship)
                        <option value="{{ $Ship->id }}"  {{ old('ship_id', optional($customers)->ship_id) ==  $Ship->id ? 'selected' : '' }} >
                            {{ $Ship->name  }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('ship_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('shippingAgent') ? 'has-error' : '' }}">
            <label for="shippingAgent" class="control-label">{{ trans('emportcars.shippingAgent') }}</label>
            <div class="">
                <input class="form-control" name="shippingAgent" type="text" id="shippingAgent" value="{{ old('shippingAgent', optional($customers)->shippingAgent) }}" min="1" max="100"  placeholder="{{ trans('emportcars.shippingAgent__placeholder') }}">
                {!! $errors->first('shippingAgent', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('deliveryPerNo') ? 'has-error' : '' }}">
            <label for="deliveryPerNo" class=" control-label">{{ trans('emportcars.deliveryPerNo') }}</label>
            <div class="">
                <input class="form-control" name="deliveryPerNo" type="text" id="deliveryPerNo" value="{{ old('deliveryPerNo', optional($customers)->deliveryPerNo) }}" minlength="1"  placeholder="{{ trans('emportcars.deliveryPerNo__placeholder') }}">
                {!! $errors->first('deliveryPerNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
@endif
       

        <div class="col-md-5 col-lg-4 form-group {{ $errors->has('expiryDate') ? 'has-error' : '' }}">
            <label for="expiryDate" class=" control-label">{{ trans('emportcars.expiryDate') }}</label>
            <div class="">
                <input class="form-control fc-datepicker" name="expiryDate" type="text" id="expiryDate" readonly value="{{ old('expiryDate', optional($customers)->expiryDate) }}"  placeholder="{{ trans('emportcars.expiryDate__placeholder') }}">
                {!! $errors->first('expiryDate', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
      



</div>


