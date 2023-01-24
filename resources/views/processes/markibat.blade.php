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


				
				
					<div class="col-xl-12">

					<form action="{{ route('markibat')}} " method="POST" role="search" autocomplete="off">
                    {{ csrf_field() }}

					<label for="inputName" class="control-label"> اختر نوع المركبة</label>
                    <div class="row  mg-b-30">
					

						<div class="col-lg-2">
							<label class="rdiobox"><input class="type" name="type" onchange="this.form.submit()" value="1" type="radio" {{ $type==1  ? 'checked':""; }} > <span> المركبات الواصلة</span></label>
						</div>
						
						<div class="col-lg-2 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input class="type" name="type" onchange="this.form.submit()"  value="2" type="radio"  {{ $type ==2  ? 'checked':""; }} > <span> مركبات بالداخل </span></label>
						</div>
						<div class="col-lg-4 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input  value="3"  name="type" onchange="this.form.submit()" type="radio"  {{ $type ==3  ? 'checked':""; }} > <span>بالداخل ومتبقي المدة اقل من 15يوم</span></label>
						</div>
						<div class="col-lg-4 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input  name="type" value="4" onchange="this.form.submit()" type="radio"  {{ $type ==4  ? 'checked':""; }} > <span>مركبات متخلفة عن المغادرة</span></label>
						</div>
					
						
					</div>

                    
                </form>
						<div class="card mg-b-20">
			
						
					
			<div class="card-body" id ="mytable" >
				    
							<div>
									<h3 class="text-center" id="title">  {{ $title}} </h3>
								</div>
                          @if(count($processes) == 0)
								<div class="panel-body text-center">
                                <h4>{{ trans('emportcars.none_available') }}</h4>
								</div>
							@else
						 <div class="table-responsive" >
									<table id="example1" class="table key-buttons text-md-nowrap"   >				
									<thead>
										<tr>
											  <tr>
												<th class="border-bottom-0">#</th>
												<th>{{ trans('emportcars.cus_id') }}</th>
                                               <th>{{ trans('emportcars.carnetNo') }}</th>
                                                <th>  {{ trans('cars.chassisNo') }}</th>
												<th>{{ trans('emportcars.entryDate') }}</th>
												<th>{{ trans('emportcars.exitDate') }}</th>
												<th>{{ trans('emportcars.status_value') }}</th>
                                                <th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody >
										<?php $i = 0; ?>
                              @foreach($processes as $emportcars)
                                <?php $i++; ?>
                                <tr>
                            <td>{{ $i }}</td>
							<td>
							<a href="{{ route('emportcars.show', $emportcars->car->customer_id ) }}">	
									{{ optional($emportcars->customer)->name }}
									</a>

							<td>{{ $emportcars->carnetNo }}</td>
                           <td>{{ optional($emportcars->car)->chassisNo }}</td>
						   <td>{{ $emportcars->entryDate }}</td>
                           <td>{{ $emportcars->exitDate }}</td>
							<td>{{ $emportcars->status_value }}</td>
                                    
									<td>
									<a class="btn btn-info" data-effect="effect-scale"   title=" ترحيل السيارة"
												        data-toggle="modal" href="#modaldemo6"
														data-emp_id="{{ $emportcars->id }}" 
														data-carnetNo="{{ $emportcars->carnetNo }}" 
														data-destination="{{ $emportcars->destination }}" 	
														data-name="{{ optional($emportcars->customer)->name}}"
														data-chassisNo="{{ optional($emportcars->car)->chassisNo }}"
														><i class="fas fa-truck-loading"></i>&nbsp;&nbsp;
														ترحيل 			
										</a>
										<?php  if($emportcars->allow_increase){ 
											
											
											$exDate= $emportcars->exitDate;
											$end_date = date('Y-m-d', strtotime("+3 months", strtotime($exDate)));
											$allow=true;
											$status=0;
											$status_value="";
											$dura=  $emportcars->duration + 3;
											if($dura == 3 ){
												$status=1;
												$status_value=" اولى";
												$allow=true;
											}else if($dura == 6 ){
												$status=2;
												$status_value=" ثانية";
												$allow=true;
											}else if($dura == 9 ){
												$status=3;
												$status_value=" ثالثة";
												$allow=false;
											}
											
											?>
										<a class="btn btn-success" data-effect="effect-scale"  title="تمديد المدة"
												        data-toggle="modal" href="#modaldemo7"
														data-emp_id="{{ $emportcars->id }}" 
														data-carnetNo="{{ $emportcars->carnetNo }}" 													
														data-name="{{ optional($emportcars->customer)->name}}"
														data-chassisNo="{{ optional($emportcars->car)->chassisNo }}"
														data-start_date="{{ $emportcars->exitDate }}" 	
														data-end_date="{{ $end_date }}" 
														data-status="{{ $status }}" 
														data-status_value="{{ $status_value }}"
														data-allow="{{ $allow }}" 
														data-dura="{{ $dura }}"  
														><i class="fas fa-plus"></i>&nbsp;&nbsp;
														تمديد			
										</a>
                             	       <?php } ?>
                                    </td>
                                </tr>
                            @endforeach
							</tbody>	
															
										
									</table>
								</div>
							</div>
						</div>
                     @endif
										 
					</div>
					<!--/div-->

				

				
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
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
   /* $(document).ready(function() {
        $('input[type="radio"]').on('change', function() {
           
            var type = $(this).val();
			//alert(SectionId);
            if (type) {
                $.ajax({
                    url: "{{ URL::to('Search_process') }}/" + type,
                    type: "get",
                    //dataType: "json",
                    success: function(data) {
					
						//alert(data) ;
                        $('#example1').html(data);
                       
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });
///////////////////////////////////////////////////////////////////////////////

    });*/

</script>

<script>
$('#modaldemo6').on('show.bs.modal', function(event) {
	        var emp_id = $(event.relatedTarget).attr('data-emp_id');
	        var modal = $(this)
		    	//modal.find('.body1 #emp_id').val(emp_id);
			 
				
				$(".body1 #emp_id").val($(event.relatedTarget).attr('data-emp_id'));

			
				$(".body1 #name").html($(event.relatedTarget).attr('data-name'));
				$(".body1 #carnetNo").html($(event.relatedTarget).attr('data-carnetNo'));
				$(".body1 #chassisNo").html($(event.relatedTarget).attr('data-chassisNo'));
	});
</script>
<script>
$('#modaldemo7').on('show.bs.modal', function(event) {
	        var emp_id = $(event.relatedTarget).attr('data-emp_id');
	        var modal = $(this)
		    	//modal.find('.body1 #emp_id').val(emp_id);
			 
				
				$(".body2 #emp_id").val($(event.relatedTarget).attr('data-emp_id'));
				$(".body2 #dura").val($(event.relatedTarget).attr('data-dura'));
				$(".body2 #allow").val($(event.relatedTarget).attr('data-allow'));
				$(".body2 #status").val($(event.relatedTarget).attr('data-status'));
				$(".body2 #status_value").val($(event.relatedTarget).attr('data-status_value'));
				$(".body2 #start_date").val($(event.relatedTarget).attr('data-start_date'));
				$(".body2 #end_date").val($(event.relatedTarget).attr('data-end_date'));

			
				$(".body2 #name").html($(event.relatedTarget).attr('data-name'));
				$(".body2 #carnetNo").html($(event.relatedTarget).attr('data-carnetNo'));
				$(".body2 #chassisNo").html($(event.relatedTarget).attr('data-chassisNo'));
				$(".body2 #destination").html($(event.relatedTarget).attr('data-destination'));
	});
</script>
@endsection