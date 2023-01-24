@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Cardetails' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('cardetails.cardetails.destroy', $cardetails->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cardetails.cardetails.index') }}" class="btn btn-primary" title="{{ trans('cardetails.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('cardetails.cardetails.create') }}" class="btn btn-success" title="{{ trans('cardetails.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('cardetails.cardetails.edit', $cardetails->id ) }}" class="btn btn-primary" title="{{ trans('cardetails.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('cardetails.delete') }}" onclick="return confirm(&quot;{{ trans('cardetails.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('cardetails.year') }}</dt>
            <dd>{{ $cardetails->year }}</dd>
            <dt>{{ trans('cardetails.weight') }}</dt>
            <dd>{{ $cardetails->weight }}</dd>
            <dt>{{ trans('cardetails.cylindersNo') }}</dt>
            <dd>{{ $cardetails->cylindersNo }}</dd>
            <dt>{{ trans('cardetails.hoursPower') }}</dt>
            <dd>{{ $cardetails->hoursPower }}</dd>
            <dt>{{ trans('cardetails.type') }}</dt>
            <dd>{{ $cardetails->type }}</dd>
            <dt>{{ trans('cardetails.seats') }}</dt>
            <dd>{{ $cardetails->seats }}</dd>
            <dt>{{ trans('cardetails.radio') }}</dt>
            <dd>{{ $cardetails->radio }}</dd>
            <dt>{{ trans('cardetails.numTires') }}</dt>
            <dd>{{ $cardetails->numTires }}</dd>
            <dt>{{ trans('cardetails.airCondition') }}</dt>
            <dd>{{ $cardetails->airCondition }}</dd>
            <dt>{{ trans('cardetails.others') }}</dt>
            <dd>{{ $cardetails->others }}</dd>
            <dt>{{ trans('cardetails.car_id') }}</dt>
            <dd>{{ optional($cardetails->Car)->plateNo }}</dd>
            <dt>{{ trans('cardetails.created_by') }}</dt>
            <dd>{{ optional($cardetails->creator)->name }}</dd>
            <dt>{{ trans('cardetails.updated_by') }}</dt>
            <dd>{{ optional($cardetails->updater)->name }}</dd>
            <dt>{{ trans('cardetails.created_at') }}</dt>
            <dd>{{ $cardetails->created_at }}</dd>
            <dt>{{ trans('cardetails.updated_at') }}</dt>
            <dd>{{ $cardetails->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection