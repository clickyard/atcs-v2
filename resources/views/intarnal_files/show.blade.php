@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Intarnal Files' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('intarnal_files.intarnal_files.destroy', $intarnalFiles->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('intarnal_files.intarnal_files.index') }}" class="btn btn-primary" title="{{ trans('intarnal_files.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('intarnal_files.intarnal_files.create') }}" class="btn btn-success" title="{{ trans('intarnal_files.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('intarnal_files.intarnal_files.edit', $intarnalFiles->id ) }}" class="btn btn-primary" title="{{ trans('intarnal_files.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('intarnal_files.delete') }}" onclick="return confirm(&quot;{{ trans('intarnal_files.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('intarnal_files.emp_id') }}</dt>
            <dd>{{ optional($intarnalFiles->emp)->id }}</dd>
            <dt>{{ trans('intarnal_files.serialNo') }}</dt>
            <dd>{{ $intarnalFiles->serialNo }}</dd>
            <dt>{{ trans('intarnal_files.date') }}</dt>
            <dd>{{ $intarnalFiles->date }}</dd>
            <dt>{{ trans('intarnal_files.expiryDuration') }}</dt>
            <dd>{{ $intarnalFiles->expiryDuration }}</dd>
            <dt>{{ trans('intarnal_files.exitDate') }}</dt>
            <dd>{{ $intarnalFiles->exitDate }}</dd>
            <dt>{{ trans('intarnal_files.file_name') }}</dt>
            <dd>{{ $intarnalFiles->file_name }}</dd>
            <dt>{{ trans('intarnal_files.file_path') }}</dt>
            <dd>{{ $intarnalFiles->file_path }}</dd>
            <dt>{{ trans('intarnal_files.created_at') }}</dt>
            <dd>{{ $intarnalFiles->created_at }}</dd>
            <dt>{{ trans('intarnal_files.updated_at') }}</dt>
            <dd>{{ $intarnalFiles->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection