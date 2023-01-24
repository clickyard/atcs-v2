@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Countries</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('countries.countries.create') }}" class="btn btn-success" title="Create New Countries">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($countriesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Countries Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Value Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($countriesObjects as $countries)
                        <tr>
                            <td>{{ $countries->code }}</td>
                            <td>{{ $countries->name }}</td>
                            <td>{{ $countries->status }}</td>
                            <td>{{ $countries->value_status }}</td>

                            <td>

                                <form method="POST" action="{!! route('countries.countries.destroy', $countries->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('countries.countries.show', $countries->id ) }}" class="btn btn-info" title="Show Countries">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('countries.countries.edit', $countries->id ) }}" class="btn btn-primary" title="Edit Countries">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Countries" onclick="return confirm(&quot;Click Ok to delete Countries.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $countriesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection