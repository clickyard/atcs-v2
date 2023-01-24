@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($countries->name) ? $countries->name : 'Countries' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('countries.countries.destroy', $countries->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('countries.countries.index') }}" class="btn btn-primary" title="Show All Countries">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('countries.countries.create') }}" class="btn btn-success" title="Create New Countries">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('countries.countries.edit', $countries->id ) }}" class="btn btn-primary" title="Edit Countries">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Countries" onclick="return confirm(&quot;Click Ok to delete Countries.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Code</dt>
            <dd>{{ $countries->code }}</dd>
            <dt>Name</dt>
            <dd>{{ $countries->name }}</dd>
            <dt>Status</dt>
            <dd>{{ $countries->status }}</dd>
            <dt>Value Status</dt>
            <dd>{{ $countries->value_status }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($countries->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($countries->updater)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $countries->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $countries->updated_at }}</dd>
            <dt>Deleted At</dt>
            <dd>{{ $countries->deleted_at }}</dd>

        </dl>

    </div>
</div>

@endsection