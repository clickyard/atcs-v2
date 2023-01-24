@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Cars' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('cars.cars.destroy', $cars->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cars.cars.index') }}" class="btn btn-primary" title="{{ trans('cars.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('cars.cars.create') }}" class="btn btn-success" title="{{ trans('cars.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('cars.cars.edit', $cars->id ) }}" class="btn btn-primary" title="{{ trans('cars.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('cars.delete') }}" onclick="return confirm(&quot;{{ trans('cars.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('cars.veh_id') }}</dt>
            <dd>{{ optional($cars->Vehicle)->name }}</dd>
            <dt>{{ trans('cars.mark_id') }}</dt>
            <dd>{{ optional($cars->CarMark)->name }}</dd>
            <dt>{{ trans('cars.place_id') }}</dt>
            <dd>{{ optional($cars->Country)->name }}</dd>
            <dt>{{ trans('cars.plateNo') }}</dt>
            <dd>{{ $cars->plateNo }}</dd>
            <dt>{{ trans('cars.year') }}</dt>
            <dd>{{ $cars->year }}</dd>
            <dt>{{ trans('cars.weight') }}</dt>
            <dd>{{ $cars->weight }}</dd>
            <dt>{{ trans('cars.valueUsd') }}</dt>
            <dd>{{ $cars->valueUsd }}</dd>
            <dt>{{ trans('cars.machineNo') }}</dt>
            <dd>{{ $cars->machineNo }}</dd>
            <dt>{{ trans('cars.chassisNo') }}</dt>
            <dd>{{ $cars->chassisNo }}</dd>
            <dt>{{ trans('cars.cylindersNo') }}</dt>
            <dd>{{ $cars->cylindersNo }}</dd>
            <dt>{{ trans('cars.hoursPower') }}</dt>
            <dd>{{ $cars->hoursPower }}</dd>
            <dt>{{ trans('cars.type') }}</dt>
            <dd>{{ $cars->type }}</dd>
            <dt>{{ trans('cars.color') }}</dt>
            <dd>{{ $cars->color }}</dd>
            <dt>{{ trans('cars.seats') }}</dt>
            <dd>{{ $cars->seats }}</dd>
            <dt>{{ trans('cars.radio') }}</dt>
            <dd>{{ $cars->radio }}</dd>
            <dt>{{ trans('cars.numTires') }}</dt>
            <dd>{{ $cars->numTires }}</dd>
            <dt>{{ trans('cars.airCondition') }}</dt>
            <dd>{{ $cars->airCondition }}</dd>
            <dt>{{ trans('cars.others') }}</dt>
            <dd>{{ $cars->others }}</dd>
            <dt>{{ trans('cars.created_by') }}</dt>
            <dd>{{ optional($cars->creator)->name }}</dd>
            <dt>{{ trans('cars.updated_by') }}</dt>
            <dd>{{ optional($cars->updater)->name }}</dd>
            <dt>{{ trans('cars.created_at') }}</dt>
            <dd>{{ $cars->created_at }}</dd>
            <dt>{{ trans('cars.updated_at') }}</dt>
            <dd>{{ $cars->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection