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
                <h4 class="mt-5 mb-5">{{ trans('cardetails.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('cardetails.cardetails.create') }}" class="btn btn-success" title="{{ trans('cardetails.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($cardetailsObjects) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('cardetails.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('cardetails.year') }}</th>
                            <th>{{ trans('cardetails.weight') }}</th>
                            <th>{{ trans('cardetails.cylindersNo') }}</th>
                            <th>{{ trans('cardetails.hoursPower') }}</th>
                            <th>{{ trans('cardetails.type') }}</th>
                            <th>{{ trans('cardetails.seats') }}</th>
                            <th>{{ trans('cardetails.radio') }}</th>
                            <th>{{ trans('cardetails.numTires') }}</th>
                            <th>{{ trans('cardetails.airCondition') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cardetailsObjects as $cardetails)
                        <tr>
                            <td>{{ $cardetails->year }}</td>
                            <td>{{ $cardetails->weight }}</td>
                            <td>{{ $cardetails->cylindersNo }}</td>
                            <td>{{ $cardetails->hoursPower }}</td>
                            <td>{{ $cardetails->type }}</td>
                            <td>{{ $cardetails->seats }}</td>
                            <td>{{ $cardetails->radio }}</td>
                            <td>{{ $cardetails->numTires }}</td>
                            <td>{{ $cardetails->airCondition }}</td>

                            <td>

                                <form method="POST" action="{!! route('cardetails.cardetails.destroy', $cardetails->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('cardetails.cardetails.show', $cardetails->id ) }}" class="btn btn-info" title="{{ trans('cardetails.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('cardetails.cardetails.edit', $cardetails->id ) }}" class="btn btn-primary" title="{{ trans('cardetails.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('cardetails.delete') }}" onclick="return confirm(&quot;{{ trans('cardetails.confirm_delete') }}&quot;)">
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
            {!! $cardetailsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection