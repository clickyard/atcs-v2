@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($vehicles->name) ? $vehicles->name : 'Vehicles' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('vehicles.vehicles.destroy', $vehicles->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('vehicles.vehicles.index') }}" class="btn btn-primary" title="Show All Vehicles">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('vehicles.vehicles.create') }}" class="btn btn-success" title="Create New Vehicles">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('vehicles.vehicles.edit', $vehicles->id ) }}" class="btn btn-primary" title="Edit Vehicles">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Vehicles" onclick="return confirm(&quot;Click Ok to delete Vehicles.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $vehicles->name }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($vehicles->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($vehicles->updater)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $vehicles->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $vehicles->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection