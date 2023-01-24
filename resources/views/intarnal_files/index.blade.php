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
                <h4 class="mt-5 mb-5">{{ trans('intarnal_files.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('intarnal_files.create') }}" class="btn btn-success" title="{{ trans('intarnal_files.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($intarnalFilesObjects) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('intarnal_files.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('intarnal_files.emp_id') }}</th>
                            <th>{{ trans('intarnal_files.serialNo') }}</th>
                            <th>{{ trans('intarnal_files.date') }}</th>
                            <th>{{ trans('intarnal_files.expiryDuration') }}</th>
                            <th>{{ trans('intarnal_files.exitDate') }}</th>
                            <th>{{ trans('intarnal_files.file_name') }}</th>
                            <th>{{ trans('intarnal_files.file_path') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($intarnalFilesObjects as $intarnalFiles)
                        <tr>
                            <td>{{ optional($intarnalFiles->emp)->id }}</td>
                            <td>{{ $intarnalFiles->serialNo }}</td>
                            <td>{{ $intarnalFiles->date }}</td>
                            <td>{{ $intarnalFiles->expiryDuration }}</td>
                            <td>{{ $intarnalFiles->exitDate }}</td>
                            <td>{{ $intarnalFiles->file_name }}</td>
                            <td>{{ $intarnalFiles->file_path }}</td>

                            <td>

                                <form method="POST" action="{!! route('intarnal_files.destroy', $intarnalFiles->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('intarnal_files.show', $intarnalFiles->id ) }}" class="btn btn-info" title="{{ trans('intarnal_files.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('intarnal_files.edit', $intarnalFiles->id ) }}" class="btn btn-primary" title="{{ trans('intarnal_files.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('intarnal_files.delete') }}" onclick="return confirm(&quot;{{ trans('intarnal_files.confirm_delete') }}&quot;)">
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
            {!! $intarnalFilesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection