@extends('layouts.master')
@section('title')
تقرير الإيرادات
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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة  الإيرادات</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
						      <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
									class="mdi mdi-printer ml-1"></i>طباعة</button>
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
						
						<div class="card-body" id="print">
						<h3 class="card-title mg-b-0">التاريخ: {{date('d-m-Y')}}</h3>

							<div>
								<h3 class="text-center" style=" text-decoration: underline; text-decoration-skip-ink: none "> تقرير الإيرادات</h3>
	                      <br/>
							</div>
							
                            @if(count($revenues) == 0)
								<div class="panel-body text-center">
                                <h4>{{ trans('emportcars.none_available') }}</h4>
								</div>
							@else

								<div class=" mg-b-50">
									<h3>ملخص الإيرادات</h3>
								<table id="example3" class="table key-buttons text-md-nowrap">
								    <thead>
									      
									</thead>
									<tbody>
											<tr>
											   <td>مجموع رسوم الدفاتر</td>
                                                <td>مجموع رسوم سواكن</td>
                                                <td>مجموع رسوم التمديد</td>
												<td>مجموع رسوم التخليص</td>
												<td>مجموع الإيرادات</td>
											</tr>
											 
											<tr>
												<td>{{ number_format($carnets,2)}}</td>
													<td>{{ number_format($portsudans,2) }}</td>
													<td>{{ number_format($increases,2) }}</td>
													<td>{{number_format($takhleeses,2)}}</td>	
													<td>
														<?php
														$a=array($carnets,$portsudans,$increases,$takhleeses);
														echo number_format(array_sum($a),2);
														?>
											</tr>
										</tbody>
									</table>
								</div>

						 <div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
											  <tr>
												<th class="border-bottom-0">#</th>
												<th>{{ trans('emportcars.cus_id') }}</th>
                                               <th>{{ trans('emportcars.carnetNo') }}</th>
											   <th>{{ trans('emportcars.carnet') }}</th>
                                                <th>  {{ trans('emportcars.portsudan') }}</th>
                                                <th>{{ trans('emportcars.increase') }}</th>
												<th>{{ trans('emportcars.takhlees') }}</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                              @foreach($revenues as $x)
                                <?php $i++; ?>
                                <tr>
                            <td>{{ $i }}</td>

							<td>{{ optional($x->Customer)->name }}</td>        
							<td>{{ $x->carnetNo }}</td>
                           <td>{{ $x->carnet}}</td>
                            <td>{{ $x->portsudan }}</td>
							<td>{{ $x->increase }}</td>
							<td>{{ $x->takhlees}}</td>
							   
								
                                   
									
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
<script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>
@endsection