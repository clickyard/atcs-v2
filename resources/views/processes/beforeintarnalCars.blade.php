@extends('layouts.master')
@section('title')
السيارات بالداخل - لوحة التحكم

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
                                                <th>  {{ trans('cars.chassisNo') }}</th>
                                                <th>{{ trans('emportcars.entryDate') }}</th>
												<th>{{ trans('emportcars.exitDate') }}</th>
												<th>{{ trans('emportcars.status_value') }}</th>
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
							<a href="{{ route('emportcars.show', $emportcars->cus_id ) }}">	
									{{ optional($emportcars->Customer)->name }}
								</a>
							</td>        
							<td>{{ $emportcars->carnetNo }}</td>
                           <td>{{ optional($emportcars->Customer->Car)->chassisNo }}</td>
                            <td>{{ $emportcars->entryDate }}</td>
							<td>{{ $emportcars->exitDate }}</td>
							<td>{{ $emportcars->status_value }}</td>
                                    <td>
									<a class="btn btn-info" data-effect="effect-scale"  
												        data-toggle="modal" href="#modaldemo6"
														data-emp_id="{{ $emportcars->id }}" 
														data-carnetNo="{{ $emportcars->carnetNo }}" 
														data-destination="{{ $emportcars->destination }}" 	
														data-name="{{ optional($emportcars->Customer)->name}}"
														data-chassisNo="{{ optional($emportcars->Customer->Car)->chassisNo }}"
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
											<input class="form-control" name="serialNo" type="text" id="serialNo" value="<?php /*{{ old('serialNo', optional($intarnalFiles)->serialNo) }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.serialNo__placeholder') }}">
											{!! $errors->first('serialNo', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
							<div class="col-md-6">

									<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
										<label for="date" class=" control-label">{{ trans('intarnal_files.date') }}</label>
										<div class="">
											<input class="form-control" name="date" type="date" id="date" value="<?php /*{{ /*old('date', optional($intarnalFiles)->date)  }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.date__placeholder') }}">
											{!! $errors->first('date', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
						</div>

						<div class="row">
							<div class="col-md-6">
									<div class="form-group {{ $errors->has('expiryDuration') ? 'has-error' : '' }}">
										<label for="expiryDuration" class="control-label">{{ trans('intarnal_files.expiryDuration') }}</label>
										<div class="">
											<input class="form-control" name="expiryDuration" type="text" id="expiryDuration" value="<?php /*{{ old('expiryDuration', optional($intarnalFiles)->expiryDuration) }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.expiryDuration__placeholder') }}">
											{!! $errors->first('expiryDuration', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
							<div class="col-md-6">

									<div class="form-group {{ $errors->has('exitDate') ? 'has-error' : '' }}">
										<label for="exitDate" class=" control-label">{{ trans('intarnal_files.exitDate') }}</label>
										<div class="">
											<input class="form-control" name="exitDate" type="date" id="date" value="<?php /*{{ /*old('exitDate', optional($intarnalFiles)->exitDate)  }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.exitDate__placeholder') }}">
											{!! $errors->first('exitDate', '<p class="help-block">:message</p>') !!}
										</div>
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
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
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