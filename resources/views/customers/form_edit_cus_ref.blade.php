<?php for ($i = 0; $i < 2; $i++) { ?>

<p class="mg-b-20">عنوان اقرب الأقربين {{ $i+1}}</p>

<div class="row row-sm col-md-9 col-lg-12">

            <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cname') ? 'has-error' : '' }}">
            <label for="cname" class="control-label">{{ trans('custrefrances.cname') }}</label>
            <div class="">
                <input class="form-control" name="addMore[{{ $i }}][cname] " type="text" id="cname" value="{{ old('cname', optional($customers->custrefrance[$i])->cname) }}" minlength="1" maxlength="400" required="true" placeholder="{{ trans('custrefrances.cname__placeholder') }}">
                {!! $errors->first('cname', '<p class="help-block">:message</p>') !!}
            </div>
            </div>



        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cstate_id') ? 'has-error' : '' }}">
            <label for="cstate_id" class="control-label">{{ trans('custrefrances.cstate_id') }}</label>
            <div class="">
                <select class="form-control" id="cstate_id" name="addMore[{{ $i }}][cstate_id]" required="true">
                        <option value="" style="display: none;" {{ old('cstate_id', optional($customers->custrefrance[$i])->cstate_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('custrefrances.cstate_id__placeholder') }}</option>
                    @foreach ($sdStates as $key => $State)
                        <option value="{{ $State->id }}" {{ old('cstate_id', optional($customers->custrefrance[$i])->cstate_id) == $State->id  ? 'selected' : '' }}>
                            {{ $State->name }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('cstate_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('ccity') ? 'has-error' : '' }}">
            <label for="ccity" class="control-label">{{ trans('custrefrances.ccity') }}</label>
            <div class="">
                <input class="form-control" name="addMore[{{ $i }}][ccity]" type="text" id="ccity" value="{{ old('ccity', optional($customers->custrefrance[$i])->ccity) }}" minlength="1" maxlength="900" required="true" placeholder="{{ trans('custrefrances.ccity__placeholder') }}">
                {!! $errors->first('ccity', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cblock') ? 'has-error' : '' }}">
            <label for="cblock" class="control-label">{{ trans('custrefrances.cblock') }}</label>
            <div class="">
                <input class="form-control" name="addMore[{{ $i }}][cblock]" type="text" id="cblock" value="{{ old('cblock', optional($customers->custrefrance[$i])->cblock) }}" minlength="1" maxlength="900"  placeholder="{{ trans('custrefrances.cblock__placeholder') }}">
                {!! $errors->first('cblock', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('chouseNo') ? 'has-error' : '' }}">
            <label for="chouseNo" class="control-label">{{ trans('custrefrances.chouseNo') }}</label>
            <div class="">
                <input class="form-control" name="addMore[{{ $i }}][chouseNo]" type="text" id="chouseNo" value="{{ old('chouseNo', optional($customers->custrefrance[$i])->chouseNo) }}" minlength="1" maxlength="100" placeholder="{{ trans('custrefrances.chouseNo__placeholder') }}">
                {!! $errors->first('chouseNo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cstreet') ? 'has-error' : '' }}">
            <label for="cstreet" class="control-label">{{ trans('custrefrances.cstreet') }}</label>
            <div class="">
                <input class="form-control" name="addMore[{{ $i }}][cstreet]" type="text" id="cstreet" value="{{ old('cstreet', optional($customers->custrefrance[$i])->cstreet) }}" minlength="1" maxlength="900"  placeholder="{{ trans('custrefrances.cstreet__placeholder') }}">
                {!! $errors->first('cstreet', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('cwork_address') ? 'has-error' : '' }}">
            <label for="cwork_address" class="control-label">{{ trans('custrefrances.cwork_address') }}</label>
            <div class="">
                <input class="form-control" name="addMore[{{ $i }}][cwork_address]" type="text" id="cwork_address" value="{{ old('cwork_address', optional($customers->custrefrance[$i])->cwork_address) }}" minlength="1" maxlength="900"  placeholder="{{ trans('custrefrances.cwork_address__placeholder') }}">
                 
                
                {!! $errors->first('cwork_address', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-md-5 col-lg-4  form-group   {{ $errors->has('ctel') ? 'has-error' : '' }}">
            <label for="ctel" class="control-label">{{ trans('custrefrances.ctel') }}</label>
            <div class="">
                <input class="form-control text-left " name="addMore[{{ $i }}][ctel]" type="tel" id="ctel{{$i}}" value="{{ old('ctel', optional($customers->custrefrance[$i])->ctel) }}" minlength="1" required="true" placeholder="{{ trans('custrefrances.ctel__placeholder') }}">
                {!! $errors->first('ctel', '<p class="help-block">:message</p>') !!}
            </div>
        </div>






</div>
<hr/>

<?php 

}
?>