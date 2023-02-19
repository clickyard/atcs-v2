@extends('layouts.master')
@section('title')
إضافة سجل جديد

@endsection
@section('css')

<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!--  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.css') }}">
-->

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


				<!-- row -->
	<div class="row">
				@if ($errors->any())
									<ul class="alert alert-danger">
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								@endif
		<div class="col-lg-12 col-md-12">
			 <div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									إضافة سجلات العملاء
								</div>
								<p class="mg-b-20">من فضلك قم بملئ جميع البيانات في الفورم التالي </p>

                            <form action="{{ route('customers.store') }}" method="post" name="addCustomer" id="addCustomer" autocomplete="off" data-toggle="validator"> 
                                                        {{ csrf_field() }}

							
                                <div id="wizard1">
                                        @include ('customers.form', [
                                                                        'customers' => null,
                                                                    ])

                                                <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <input class="btn btn-success" type="submit" value=" أضف الدفتر" >
                                                    </div>
                                                 </div>
                                </div><!-- end wizard2 -->
                            </form> <!-- end form -->
				         
                                        
                    </div><!-- end card body -->
				</div> <!-- end card -->
           </div>  <!-- end div col-lg-12 col-md-12-->      
				
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
<script>
$(function() {

	//$('#addCustomer').validator('validate');

  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  /*
  $("form[name='addCustomer']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      name: "required",
      nationalityNo: "required",
     
    },
    // Specify validation error messages
    messages: {
      name: "Please enter your name",
    /*  password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"*/
  /*  },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  }); */
});
</script>
<?PHP /*
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
                                        
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>

<!-- Internal Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>

    <!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
*/?>






 @endsection

