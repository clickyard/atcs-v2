@extends('layouts.master')
@section('title')
 تعديل سجل 
@endsection
@section('css')

<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal Sumoselect css-->
    <!--Internal  TelephoneInput css--
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.css') }}">-->
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  تعديل بيانات العملاء</span>
						</div>
					</div>
                    <div class="d-flex my-xl-auto right-content">
                    
                    <a class="btn  btn-success"  href="{{ route('customers.index') }}"><i class="mdi mdi-eye"></i>  عرض جميع العملاء</a>
                   
                    <a class="btn btn-primary"  href="{{ route('customers.create') }}"><i class="mdi mdi-plus"></i>  إضاقة عميل جديد</a>

                    </div>
				</div>
				<!-- breadcrumb -->
                
@endsection
@section('content')

@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        {!! session('success_message') !!}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif

				<!-- row -->
				<div class="row">


				
				
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<!--- stat button            -->
							<div class="col-sm-4 col-md-4">
								
										<div class="card-body">
										
                                        <h4 class="mt-5 mb-5">{{ !empty($customers->name) ? 'تعديل بيانات العميل : '.$customers->name : 'Customers' }}</h4>
										</div>
								
							</div>

                            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('customers.update', $customers->id) }}" id="edit_customers_form" name="edit_customers_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div id="wizard1">

            
				    <h3>بيانات مالك السيارة </h3>
					<section>
                        @include ('customers.form_edit_cust', [
                                    'customers' => $customers,
                                    ])
				    </section>
                    <h3>العنوان </h3>
				   <section>
                    @include ('customers.form_edit_address', [
                                'customers' => $customers,
                            ])
                                                                        
				    </section>
 				    <h3>عنوان اقرب الاقربين</h3>
				   <section>
                    @include ('customers.form_edit_cus_ref', [
                                'customers' => $customers,
                            ])
                                                                        
				    </section>

         

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="تحديث">
                    </div>
                </div>
            </form>
					
                        </div>
                    </div>    
							
				

				
				</div>
				<!-- /row -->   
				
     
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ asset('js/steps.js') }}" defer></script>

<!--Internal  Select2 js --
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js --
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js --
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>-->
@endsection
