@extends('layouts.master')
@section('title')
إضافة عميل - لوحة التحكم

@endsection
@section('css')



<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  اضافة العملاء</span>
						</div>
					</div> 
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($customers->name) ? $customers->name : 'Customers' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('customers.destroy', $customers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary" title="Show All Customers">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show All Customers</span>
                    </a>

                    <a href="{{ route('customers.create') }}" class="btn btn-success" title="Create New Customers">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create New Customers</span>
                    </a>
                    
                    <a href="{{ route('customers.edit', $customers->id ) }}" class="btn btn-primary" title="Edit Customers">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit Customers</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Customers" onclick="return confirm(&quot;Click Ok to delete Customers.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete Customers</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $customers->name }}</dd>
            <dt>Nationality</dt>
            <dd>{{ $customers->nationality }}</dd>
            <dt>Nationality No</dt>
            <dd>{{ $customers->nationalityNo }}</dd>
            <dt>Country</dt>
            <dd>{{ optional($customers->Country)->id }}</dd>
            <dt>State</dt>
            <dd>{{ optional($customers->State)->id }}</dd>
            <dt>City</dt>
            <dd>{{ $customers->city }}</dd>
            <dt>Block</dt>
            <dd>{{ $customers->block }}</dd>
            <dt>House No</dt>
            <dd>{{ $customers->houseNo }}</dd>
            <dt>Street</dt>
            <dd>{{ $customers->street }}</dd>
            <dt>Work Address</dt>
            <dd>{{ $customers->work_address }}</dd>
            <dt>Tel</dt>
            <dd>{{ $customers->tel }}</dd>
            <dt>Tel2</dt>
            <dd>{{ $customers->tel2 }}</dd>
            <dt>Email</dt>
            <dd>{{ $customers->email }}</dd>
            <dt>Whatsup</dt>
            <dd>{{ $customers->whatsup }}</dd>
            <dt>Process Type</dt>
            <dd>{{ $customers->processType }}</dd>
            <dt>Created By</dt>
            <dd>{{ optional($customers->creator)->name }}</dd>
            <dt>Updated By</dt>
            <dd>{{ optional($customers->updater)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $customers->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $customers->updated_at }}</dd>

        </dl>

    </div>
</div>


		<!-- row closed -->
        </div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
@endsection
