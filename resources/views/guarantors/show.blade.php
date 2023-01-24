@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Guarantors' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('guarantors.destroy', $guarantors->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('guarantors.index') }}" class="btn btn-primary" title="{{ trans('guarantors.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('guarantors.create') }}" class="btn btn-success" title="{{ trans('guarantors.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('guarantors.edit', $guarantors->id ) }}" class="btn btn-primary" title="{{ trans('guarantors.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('guarantors.delete') }}" onclick="return confirm(&quot;{{ trans('guarantors.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('guarantors.gname') }}</dt>
            <dd>{{ $guarantors->gname }}</dd>
            <dt>{{ trans('guarantors.gnationality') }}</dt>
            <dd>{{ $guarantors->gnationality }}</dd>
            <dt>{{ trans('guarantors.gnationalityNo') }}</dt>
            <dd>{{ $guarantors->gnationalityNo }}</dd>
            <dt>{{ trans('guarantors.gcountry_id') }}</dt>
            <dd>{{ optional($guarantors->Country)->name }}</dd>
            <dt>{{ trans('guarantors.gstate_id') }}</dt>
            <dd>{{ optional($guarantors->State)->name }}</dd>
            <dt>{{ trans('guarantors.gcity') }}</dt>
            <dd>{{ $guarantors->gcity }}</dd>
            <dt>{{ trans('guarantors.gblock') }}</dt>
            <dd>{{ $guarantors->gblock }}</dd>
            <dt>{{ trans('guarantors.ghouseNo') }}</dt>
            <dd>{{ $guarantors->ghouseNo }}</dd>
            <dt>{{ trans('guarantors.gstreet') }}</dt>
            <dd>{{ $guarantors->gstreet }}</dd>
            <dt>{{ trans('guarantors.gwork_address') }}</dt>
            <dd>{{ $guarantors->gwork_address }}</dd>
            <dt>{{ trans('guarantors.gtel') }}</dt>
            <dd>{{ $guarantors->gtel }}</dd>
            <dt>{{ trans('guarantors.gtel2') }}</dt>
            <dd>{{ $guarantors->gtel2 }}</dd>
            <dt>{{ trans('guarantors.gemail') }}</dt>
            <dd>{{ $guarantors->gemail }}</dd>
            <dt>{{ trans('guarantors.gwhatsup') }}</dt>
            <dd>{{ $guarantors->gwhatsup }}</dd>
            <dt>{{ trans('guarantors.created_by') }}</dt>
            <dd>{{ optional($guarantors->creator)->name }}</dd>
            <dt>{{ trans('guarantors.updated_by') }}</dt>
            <dd>{{ optional($guarantors->updater)->name }}</dd>
            <dt>{{ trans('guarantors.cus_id') }}</dt>
            <dd>{{ optional($guarantors->Customer)->name }}</dd>
            <dt>{{ trans('guarantors.created_at') }}</dt>
            <dd>{{ $guarantors->created_at }}</dd>
            <dt>{{ trans('guarantors.updated_at') }}</dt>
            <dd>{{ $guarantors->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection