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
                <h4 class="mt-5 mb-5">{{ trans('custrefrances.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('custrefrances.custrefrances.create') }}" class="btn btn-success" title="{{ trans('custrefrances.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($custrefrancesObjects) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('custrefrances.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($custrefrancesObjects as $custrefrances)
                        <tr>

                            <td>

                                <form method="POST" action="{!! route('custrefrances.custrefrances.destroy', $custrefrances->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('custrefrances.custrefrances.show', $custrefrances->id ) }}" class="btn btn-info" title="{{ trans('custrefrances.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('custrefrances.custrefrances.edit', $custrefrances->id ) }}" class="btn btn-primary" title="{{ trans('custrefrances.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('custrefrances.delete') }}" onclick="return confirm(&quot;{{ trans('custrefrances.confirm_delete') }}&quot;)">
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
            {!! $custrefrancesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection