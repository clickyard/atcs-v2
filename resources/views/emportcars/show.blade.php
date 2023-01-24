@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Emportcars' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('emportcars.destroy', $emportcars->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('emportcars.index') }}" class="btn btn-primary" title="{{ trans('emportcars.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('emportcars.create') }}" class="btn btn-success" title="{{ trans('emportcars.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('
                        emportcars.edit', $emportcars->id ) }}" class="btn btn-primary" title="{{ trans('emportcars.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('emportcars.delete') }}" onclick="return confirm(&quot;{{ trans('emportcars.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>#</dt>
            <dd><?php //{{ optional($emportcars->Customer->Car)->plateNo }} ?></dd>
            <dt>{{ trans('emportcars.cus_id') }}</dt>
            <dd>{{ optional($emportcars->Customer)->name }}</dd>
            <dt>{{ trans('emportcars.ship_id') }}</dt>
            <dd>{{ optional($emportcars->Ship)->name }}</dd>
            <dt>{{ trans('emportcars.port_id') }}</dt>
            <dd>{{ optional($emportcars->Shippingport)->id }}</dd>
            <dt>{{ trans('emportcars.portAccess_id') }}</dt>
            <dd>{{ optional($emportcars->Shippingport)->id }}</dd>
            <dt>{{ trans('emportcars.carnetNo') }}</dt>
            <dd>{{ $emportcars->carnetNo }}</dd>
            <dt>{{ trans('emportcars.destination') }}</dt>
            <dd>{{ $emportcars->destination }}</dd>
            <dt>{{ trans ('emportcars.shippingAgent') }}</dt>
            <dd>{{ $emportcars->shippingAgent }}</dd>
            <dt>{{ trans('emportcars.deliveryPerNo') }}</dt>
            <dd>{{ $emportcars->deliveryPerNo }}</dd>
            <dt>{{ trans('emportcars.deliveryPerDate') }}</dt>
            <dd>{{ $emportcars->deliveryPerDate }}</dd>
            <dt>{{ trans('emportcars.arrivedDate') }}</dt>
            <dd>{{ $emportcars->arrivedDate }}</dd>
            <dt>{{ trans('emportcars.issueDate') }}</dt>
            <dd>{{ $emportcars->issueDate }}</dd>
            <dt>{{ trans('emportcars.expiryDate') }}</dt>
            <dd>{{ $emportcars->expiryDate }}</dd>
            <dt>{{ trans('emportcars.entryDate') }}</dt>
            <dd>{{ $emportcars->entryDate }}</dd>
            <dt>{{ trans('emportcars.exitDate') }}</dt>
            <dd>{{ $emportcars->exitDate }}</dd>
            <dt>{{ trans('emportcars.increaseDate') }}</dt>
            <dd>{{ $emportcars->increaseDate }}</dd>
            <dt>{{ trans('emportcars.status') }}</dt>
            <dd>{{ $emportcars->status }}</dd>
            <dt>{{ trans('emportcars.comment') }}</dt>
            <dd>{{ $emportcars->comment }}</dd>
            <dt>{{ trans('emportcars.created_by') }}</dt>
            <dd>{{ optional($emportcars->creator)->name }}</dd>
            <dt>{{ trans('emportcars.updated_by') }}</dt>
            <dd>{{ optional($emportcars->updater)->name }}</dd>
            <dt>{{ trans('emportcars.created_at') }}</dt>
            <dd>{{ $emportcars->created_at }}</dd>
            <dt>{{ trans('emportcars.updated_at') }}</dt>
            <dd>{{ $emportcars->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection