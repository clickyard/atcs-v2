@extends('layouts.master')
@section('title')

الإجراءات
@endsection

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  اجراءات الافراج المؤقت </span>
						</div>
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
				


			
			
					<div class="col-lg-2 mg-t-10">
										<label for="inputName" class=""> البحث برقم الدفتر</label>
			   </div>
			<div class="col-lg-5 ">
					<form action="{{ route('Search_process') }}" class="col-lg-10 " method="POST" role="search" autocomplete="off">
                    {{ csrf_field() }}
									<?php /*--	<select name="carnet" onchange="this.form.submit()" class="form-control select2"  >
												<option value=""  > اختر رقم الدفتر</option>
												@foreach ($customerlist as $emp)
													<option value="{{ $emp->id }}" >
														{{ $emp->carnetNo}}
													</option>
												@endforeach

										</select>-->*/?>
										<input name="carnet" onchange="this.form.submit()" value="{{ optional($customers)->carnetNo }}" class="form-control" />
						</form>
				</div>	

<?php
/*
$uniques = array();
foreach ($customerlist as $emp) {
    $uniques=array(	
		         'id'=> $emp->id,
				'name'=>$emp->customer->name
				); // Get unique country by code.
}
?>
				                    <div class="col-lg-4 mg-t-20 ">
										<label for="inputName" class="control-label"> البحث بالاسم</label>
										<select name="cus_id" id="cus_id"  class="form-control select2"  >
												<option value=""  > اختر الاسم من القائمة</option>
												@foreach (array_unique($uniques) as $key =>$emp)
													<option value="{{ $key }}" >
														{{ $emp}}
													</option>
												@endforeach
												
										  </select>
									</div>
							
									<div class="col-lg-4 mg-t-20">
										<label for="inputName" class="control-label"> البحث  برقم اللوحة</label>
										<select name="plateNo"  class="form-control select2"  >
												<option value=""   > اختر رقم اللوحة</option>
												@foreach ($customerlist as $emp)
													<option value="{{ $emp->id }}" >
														{{ $emp->mycars->plateNo }}
													</option>
												@endforeach
										</select>
									</div>
				*/?>
				
					
            </div>
				<div class="card mg-b-20 mg-t-20">
			
						
					
			    <div class="card-body" id ="mytable" >
					@if($customers!=null)
			      		@include('processes.datatable')	
				    @else 
					 لا توجد بيانات 
					
					@endif
				</div>
				<!-- /row -->   
				
     
				<!-- row closed -->



		</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<!--<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>-->
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js --
<script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>-->
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
<script>
    $(document).ready(function() {
		$('#entryDate').on('change', function() {

		var dateTypeVar = $('#entryDate').datepicker('getDate');
        var entryd= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
		$('#entryDate').val(entryd);

		var newDate = moment(entryd, "YYYY-MM-DD").add(3, 'months').format('YYYY-MM-DD');

		$('#exitDate').val(newDate);

	//	alert(newDate);
		});

		$('#exitDate').on('change', function() {
			var dateTypeVar = $('#exitDate').datepicker('getDate');
			var exitd= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
			$('#exitDate').val(exitd);
		});
//////////////////////////////////////////////////////////////////////////

	/*
	 $('#entryDate').on('change', function() {
		
		var entaydate = $(this).val();
		//alert(entaydate);
		var exitDate= date('yy-mm-dd', strtotime("+3 months", strtotime(entaydate))); 
		//$("#exitDate11").attr('value','11-2-2022');
		//alert(exitDate);
	 });*/
	 ////////////////////////////////////////////////////////////////////////
	//	$("#form1").hide();
		
		$('input[type="radio"]').on('change', function() {
				var type= $(this).val();
				if(type ==1)$("#form1").show(); else $("#form1").hide();
				if(type ==2)$("#form2").show(); else $("#form2").hide();
				if(type ==3)$("#form3").show(); else $("#form3").hide();
				if(type ==4)$("#form4").show(); else $("#form4").hide();
				if(type ==5)$("#form5").show(); else $("#form5").hide();
				if(type ==6)$("#form6").show(); else $("#form6").hide();

			});  

		//var type = $('input[type="radio"]').val();

	/*
		$('select[name="cus_id"]').on('change', function() {
           
            var emp_id = $(this).val();
			//var dataString='emp_id'+emp_id;
			var type=1;
			//alert(emp_id);
            if (emp_id) {
                $.ajax({
                    url: "{{ URL::to('Search_process') }}/" + emp_id,
                    type: "get",
					//data:dataString,
                    //dataType: "json",
                    success: function(data) {
						//alert(data);
                        $('#mytable').html(data);
						ajaxCall2();
				
                    },
                });


            } else {
				//alert(emp_id);
               console.log('AJAX load did not work');
            }
});
*/
/////////////////////////////////////////////////////////////////////////////////
function ajaxCall2(){
			//$.ajax({
				//success: function(){
					$('input[type="radio"]').on('change', function() {
					var type= $(this).val();
					if(type ==1)$("#form1").show(); else $("#form1").hide();
					if(type ==2)$("#form2").show(); else $("#form2").hide();
					if(type ==3)$("#form3").show(); else $("#form3").hide();
					if(type ==4)$("#form4").show(); else $("#form4").hide();
					if(type ==5)$("#form5").show(); else $("#form5").hide();
					if(type ==6)$("#form6").show(); else $("#form6").hide();

		            });  
				//}
			//});
		} 
////////////////////////////////////////////////////////////////////////////////
$('select[name="carnet"]').on('change', function() {
           
		   var emp_id = $(this).val();
		   //var dataString='emp_id'+emp_id;
		   var type=1;
		   //alert(emp_id);
		   if (emp_id) {
			   $.ajax({
				   url: "{{ URL::to('Search_process') }}/" + emp_id,
				   type: "get",
				 //  data:dataString,
				 //  dataType: "json",
				   success: function(data) {
					   alert(data);
					   $('#mytable').html(data);

					   ajaxCall2();
					  
				   },
			   });

		   } else {
			   //alert(emp_id);
			  console.log('AJAX load did not work');
		   }
	   });
////////////////////////////////////////////////////////////////////////////////
/*
$('select[name="plateNo"]').on('change', function() {
           
	$('select[name="carnet"]').empty();
		   var emp_id = $(this).val();
		   //var dataString='emp_id'+emp_id;
		   var type=1;

		   //alert(emp_id);
		   if (emp_id) {
			   $.ajax({
				   url: "{{ URL::to('Search_process') }}/" + emp_id,
				   type: "get",
				   //data:dataString,
				   //dataType: "json",
				   success: function(data) {
					   //alert(data);
					   $('#mytable').html(data);
					   ajaxCall2();
					  
				   },
			   });

		   } else {
			   //alert(emp_id);
			  console.log('AJAX load did not work');
		   }
	   });	
	   */		
///////////////////////////////////////////////////////////////////////////////

    });

</script>

@endsection