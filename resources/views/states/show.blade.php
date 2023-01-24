@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($states->name) ? $states->name : 'States' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('states.states.destroy', $states->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('states.states.index') }}" class="btn btn-primary" title="Show All States">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('states.states.create') }}" class="btn btn-success" title="Create New States">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('states.states.edit', $states->id ) }}" class="btn btn-primary" title="Edit States">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete States" onclick="return confirm(&quot;Click Ok to delete States.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $states->name }}</dd>
            <dt>Country</dt>
            <dd>{{ optional($states->Country)->name }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($states->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($states->updater)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $states->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $states->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection