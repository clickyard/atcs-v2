@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Guarefrances' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('guarefrances.guarefrances.destroy', $guarefrances->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('guarefrances.guarefrances.index') }}" class="btn btn-primary" title="{{ trans('guarefrances.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('guarefrances.guarefrances.create') }}" class="btn btn-success" title="{{ trans('guarefrances.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('guarefrances.guarefrances.edit', $guarefrances->id ) }}" class="btn btn-primary" title="{{ trans('guarefrances.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('guarefrances.delete') }}" onclick="return confirm(&quot;{{ trans('guarefrances.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('guarefrances.grname') }}</dt>
            <dd>{{ $guarefrances->grname }}</dd>
            <dt>{{ trans('guarefrances.grnationality') }}</dt>
            <dd>{{ $guarefrances->grnationality }}</dd>
            <dt>{{ trans('guarefrances.grnationalityNo') }}</dt>
            <dd>{{ $guarefrances->grnationalityNo }}</dd>
            <dt>{{ trans('guarefrances.grcountry_id') }}</dt>
            <dd>{{ optional($guarefrances->Country)->name }}</dd>
            <dt>{{ trans('guarefrances.grstate_id') }}</dt>
            <dd>{{ optional($guarefrances->State)->name }}</dd>
            <dt>{{ trans('guarefrances.grcity') }}</dt>
            <dd>{{ $guarefrances->grcity }}</dd>
            <dt>{{ trans('guarefrances.grblock') }}</dt>
            <dd>{{ $guarefrances->grblock }}</dd>
            <dt>{{ trans('guarefrances.grhouseNo') }}</dt>
            <dd>{{ $guarefrances->grhouseNo }}</dd>
            <dt>{{ trans('guarefrances.grstreet') }}</dt>
            <dd>{{ $guarefrances->grstreet }}</dd>
            <dt>{{ trans('guarefrances.grwork_address') }}</dt>
            <dd>{{ $guarefrances->grwork_address }}</dd>
            <dt>{{ trans('guarefrances.grtel') }}</dt>
            <dd>{{ $guarefrances->grtel }}</dd>
            <dt>{{ trans('guarefrances.created_by') }}</dt>
            <dd>{{ optional($guarefrances->creator)->name }}</dd>
            <dt>{{ trans('guarefrances.updated_by') }}</dt>
            <dd>{{ optional($guarefrances->updater)->name }}</dd>
            <dt>{{ trans('guarefrances.gua_id') }}</dt>
            <dd>{{ optional($guarefrances->Guarantor)->gname }}</dd>
            <dt>{{ trans('guarefrances.created_at') }}</dt>
            <dd>{{ $guarefrances->created_at }}</dd>
            <dt>{{ trans('guarefrances.updated_at') }}</dt>
            <dd>{{ $guarefrances->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection