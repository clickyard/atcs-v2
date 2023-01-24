@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Custrefrances' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('custrefrances.custrefrances.destroy', $custrefrances->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('custrefrances.custrefrances.index') }}" class="btn btn-primary" title="{{ trans('custrefrances.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('custrefrances.custrefrances.create') }}" class="btn btn-success" title="{{ trans('custrefrances.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('custrefrances.custrefrances.edit', $custrefrances->id ) }}" class="btn btn-primary" title="{{ trans('custrefrances.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('custrefrances.delete') }}" onclick="return confirm(&quot;{{ trans('custrefrances.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('custrefrances.cname') }}</dt>
            <dd>{{ $custrefrances->cname }}</dd>
            <dt>{{ trans('custrefrances.cnationality') }}</dt>
            <dd>{{ $custrefrances->cnationality }}</dd>
            <dt>{{ trans('custrefrances.cnationalityNo') }}</dt>
            <dd>{{ $custrefrances->cnationalityNo }}</dd>
            <dt>{{ trans('custrefrances.ccountry_id') }}</dt>
            <dd>{{ optional($custrefrances->Country)->name }}</dd>
            <dt>{{ trans('custrefrances.cstate_id') }}</dt>
            <dd>{{ optional($custrefrances->State)->name }}</dd>
            <dt>{{ trans('custrefrances.ccity') }}</dt>
            <dd>{{ $custrefrances->ccity }}</dd>
            <dt>{{ trans('custrefrances.cblock') }}</dt>
            <dd>{{ $custrefrances->cblock }}</dd>
            <dt>{{ trans('custrefrances.chouseNo') }}</dt>
            <dd>{{ $custrefrances->chouseNo }}</dd>
            <dt>{{ trans('custrefrances.cstreet') }}</dt>
            <dd>{{ $custrefrances->cstreet }}</dd>
            <dt>{{ trans('custrefrances.cwork_address') }}</dt>
            <dd>{{ $custrefrances->cwork_address }}</dd>
            <dt>{{ trans('custrefrances.ctel') }}</dt>
            <dd>{{ $custrefrances->ctel }}</dd>
            <dt>{{ trans('custrefrances.ccreated_by') }}</dt>
            <dd>{{ optional($custrefrances->ccreatedBy)->id }}</dd>
            <dt>{{ trans('custrefrances.cupdated_by') }}</dt>
            <dd>{{ optional($custrefrances->cupdatedBy)->id }}</dd>
            <dt>{{ trans('custrefrances.cus_id') }}</dt>
            <dd>{{ optional($custrefrances->Customer)->name }}</dd>
            <dt>{{ trans('custrefrances.created_at') }}</dt>
            <dd>{{ $custrefrances->created_at }}</dd>
            <dt>{{ trans('custrefrances.updated_at') }}</dt>
            <dd>{{ $custrefrances->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection