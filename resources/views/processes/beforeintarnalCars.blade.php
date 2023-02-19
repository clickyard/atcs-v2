@extends('layouts.master')
@section('title')
السيارات الواصلة - لوحة التحكم

@endsection

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة السيارات بالداخل</span>
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
						<div class="card mg-b-20">
						
					
							<div class="card-body">
							<div>
									<h3 class="text-center">  عربات داخلة تحتاج الى إذن دخول </h3>
									<br/>
								</div>
                            @if(count($intarnalCars) == 0)
								<div class="panel-body text-center">
                                <h4>{{ trans('emportcars.none_available') }}</h4>
								</div>
							@else
						 <div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											  <tr>
												<th class="border-bottom-0">#</th>
												<th>{{ trans('emportcars.cus_id') }}</th>
                                               <th>{{ trans('emportcars.carnetNo') }}</th>
											   <th >تاريخ اصدار الدفتر</th>
                                                <th>  {{ trans('cars.chassisNo') }}</th>
												<th class="border-bottom-0">عرض البيانات</th>
												<th class="border-bottom-0">التعديل</th>

                                                <th class="border-bottom-0">العمليات</th>

											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                              @foreach($intarnalCars as $emportcars)
                                <?php $i++; ?>
                                <tr>
                            <td>{{ $i }}</td>
							<td>
							<a href="{{ route('emportcars.show', $emportcars->id ) }}">	
									{{ optional($emportcars->customer)->name }}
								</a>
							</td>        
							<td>{{ $emportcars->carnetNo }}</td>
							<td>{{ $emportcars->issueDate }} </td>
                           <td>{{ optional($emportcars->car)->chassisNo }}</td>
						   
								<td>
							   <div class="dropdown">
									<button aria-expanded="false" aria-haspopup="true"
										class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
										type="button">عرض البيانات  <i class="fas fa-caret-down ml-1"></i></button>
									<div class="dropdown-menu tx-14">
									<a class="dropdown-item" href="{{ route('customers.show',$emportcars->id) }}" >
												<i class="text-primary fas fa-eye"></i>&nbsp;&nbsp;
												جميع التفاصيل
											</a>
											
											<a class="dropdown-item" href="{{ route('reports.show',$emportcars->id) }}" >
												<i class="text-info fas fa-eye"></i>&nbsp;&nbsp;
													بيانات صاحب العربة
											</a>		

											<a class="dropdown-item" href="{{route('carReport', $emportcars->id) }}">
												<i class=" text-success fas fa-eye"></i>&nbsp;&nbsp; 
													بيانات العربة 
												</a>

											<a class="dropdown-item" href="{{ route('luggagesReport', $emportcars->id) }}" >
												<i class="text-warning fas fa-eye"></i>&nbsp;&nbsp;
												كشف عفش
											</a>
							   </div>
							</div>
							</td> 
                                  
									<td>
									
									<div class="dropdown" style="overflow: visible;">
									<button aria-expanded="false" aria-haspopup="true"
										class="btn ripple btn-success btn-sm" data-toggle="dropdown"
										type="button">تعديل البيانات  <i class="fas fa-caret-down ml-1"></i></button>
									<div class="dropdown-menu tx-14" style="overflow: visible;">
											
											<a class="dropdown-item" href="{{ route('customers.edit',$emportcars->car->customer_id) }}" >
												<i class="text-info fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات العميل
											</a>
											<a class="dropdown-item" href="{{ route('emportcars.edit',$emportcars->id) }}" >
												<i class="text-primary fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات الدفتر
											</a>
											<a class="dropdown-item" href="{{ route('cars.edit',$emportcars->car->id) }}" >
												<i class="text-warning fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات العربة
											</a>
											<a class="dropdown-item" href="{{ route('guarantors.edit',$emportcars->car->customer_id) }}" >
												<i class="text-success fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات الكفيل
											</a>
												
								</div> </td>
								<td>
									<a class="btn btn-info" data-effect="effect-scale"  
												        data-toggle="modal" href="#modaldemo6"
														data-emp_id="{{ $emportcars->id }}" 
														data-carnetNo="{{ $emportcars->carnetNo }}" 
														data-destination="{{ $emportcars->destination }}" 	
														data-name="{{ optional($emportcars->customer)->name}}"
														data-chassisNo="{{ optional($emportcars->car)->chassisNo }}"
														><i class="fas fa-pen"></i>&nbsp;&nbsp;
														أذن دخول												</a>
                             	  
                                   
									
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


		<!-- Grid modal -->
		<form method="POST" action="{{ route('intarnal_files.store') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
		<div class="modal" id="modaldemo6">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">دخال بيانات اذن دخول افراج جمركي </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
			     

						  
					<div class="modal-body body1">
						<div class="row mg-b-50">
							<div class="col-md-5">

									<p>أسم صاحب العربة :  <span id="name"></span>	</p>
							</div>
							<div class="col-md-3">
									<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
							</div>
							<div class="col-md-4">
							<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
							</div>

							<input type="hidden" name="emp_id" id="emp_id" value="" />
						</div>
						<div class="row">
							<div class="col-md-6">
									<div class="form-group {{ $errors->has('serialNo') ? 'has-error' : '' }}">
										<label for="serialNo" class="control-label">{{ trans('intarnal_files.serialNo') }}</label>
										<div class="">
											<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="10" required  placeholder="{{ trans('intarnal_files.serialNo__placeholder') }}">
											{!! $errors->first('serialNo', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
							<div class="col-md-6">

									<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
										<label for="date" class=" control-label">{{ trans('intarnal_files.date') }}</label>
										<div class="">
											<input class="form-control" name="entryDate" type="date" id="date" value="" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.date__placeholder') }}">
											{!! $errors->first('date', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
						</div>

						<div class="row">
							<div class="col-md-6">

									<label for="portAccess_id" class="control-label">{{ trans('emportcars.portAccess_id') }}</label>
									<div class="col">
										<select class="form-control" id="portAccess_id" name="portAccess_id" required="true">
												<option value="" >{{ trans('emportcars.portAccess_id__placeholder') }}</option>
											@foreach ($Shippingports as $key =>  $Shippingport)
												<option value="{{ $Shippingport->id }}" >
													{{ $Shippingport->name  }}
												</option>
											@endforeach
										</select>
										
										{!! $errors->first('portAccess_id', '<p class="help-block">:message</p>') !!}
									</div>
						     </div>
				
							    <div class="col-md-6">

									<label for="ship_id" class="control-label">{{ trans('emportcars.ship_id') }}</label>
									<div class="">
										<select class="form-control" id="ship_id" name="ship_id" required="true">
												<option value="" >{{ trans('emportcars.ship_id__placeholder') }}</option>
											@foreach ($Ships as $key => $Ship)
												<option value="{{ $Ship->id }}"  >
													{{ $Ship->name  }}
												</option>
											@endforeach
										</select>
										
										{!! $errors->first('ship_id', '<p class="help-block">:message</p>') !!}
									</div>
							    </div>
								<div class="col-md-6">

										<label for="shippingAgent" class="control-label">{{ trans('emportcars.shippingAgent') }}</label>
										<div class="">
											<input class="form-control" name="shippingAgent" type="text" id="shippingAgent" value="" min="1" max="100"  placeholder="{{ trans('emportcars.shippingAgent__placeholder') }}">
											{!! $errors->first('shippingAgent', '<p class="help-block">:message</p>') !!}
										</div>
								 </div>
								 <div class="col-md-6">

										 <label for="deliveryPerNo" class=" control-label">{{ trans('emportcars.deliveryPerNo') }}</label>
										<div class="">
											<input class="form-control" name="deliveryPerNo" type="text" id="deliveryPerNo" value="" minlength="1"  placeholder="{{ trans('emportcars.deliveryPerNo__placeholder') }}">
											{!! $errors->first('deliveryPerNo', '<p class="help-block">:message</p>') !!}
										</div>
								 </div>
						</div>
					

							<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="card">
											<div class="card-body">
											<div class="mg-b-50">
													<h6 class="card-title mb-1">المرفقات: إذن دخول</h6>
													<p class="text-muted card-sub-title">
								من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
										</p>
												</div>
								<div class="row mb-4">
								
									<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
										<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
									</div>
								
								</div>
								
							</div>
						</div>
					</div>
				
			    	</div>




					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		<!--End Grid modal -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>

<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<!--<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>-->
<script>
$('#modaldemo6').on('show.bs.modal', function(event) {
	        var emp_id = $(event.relatedTarget).attr('data-emp_id');
	        var modal = $(this)
		    	//modal.find('.body1 #emp_id').val(emp_id);
			 
				
				$(".body1 #emp_id").val($(event.relatedTarget).attr('data-emp_id'));

			
				$(".body1 #name").html($(event.relatedTarget).attr('data-name'));
				$(".body1 #carnetNo").html($(event.relatedTarget).attr('data-carnetNo'));
				$(".body1 #chassisNo").html($(event.relatedTarget).attr('data-chassisNo'));
				$(".body1 #destination").html($(event.relatedTarget).attr('data-destination'));
	});
</script>
@endsection