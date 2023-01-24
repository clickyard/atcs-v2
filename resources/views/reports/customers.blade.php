@extends('layouts.master')
@section('title')
تقرير بقائمة العملاء
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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير العملاء   </span>
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
								<h3 class="text-center" style=" text-decoration: underline; text-decoration-skip-ink: none "> تقرير بقائمة عربات الإفراج المؤقت</h3>
	                      <br/>
							</div>

                            @if(count($report) == 0)
								<div class="panel-body text-center">
                                <h4>{{ trans('emportcars.none_available') }}</h4>
								</div>
							@else
						 <div class="table-responsive">
									<table id="example1" class="table table-hover  text-md-nowrap">
										<thead>
										<tr>
											  <tr>
												<th class="border-bottom-0">#</th>
												<th>{{ trans('emportcars.cus_id') }}</th>
												<th>{{ trans('customers.nationalityNo') }}</th>
                                              <th>{{ trans('emportcars.carnetNo') }}</th>
											  <th>{{ trans('guarantors.gname') }}</th>
                                               <th>  {{ trans('cars.chassisNo') }}</th>
												<th>{{ trans('emportcars.entryDate') }}</th>
												<th>{{ trans('emportcars.exitDate') }}</th>
													<th class="opra">العمليات</th>

											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                              @foreach($report as $key)
                                <?php $i++; ?>
                                <tr>


                            <td>{{ $i }}</td>
							<td>
							 {{ $key->name }}
						</td>    
							<td>{{ $key->nationalityNo }}</td>  
							<td>{{ optional($key->emportcar)->carnetNo }}</td>
							<td>{{ optional($key->guarantor)->gname }}</td>     
                            <td> {{ optional($key->Car)->chassisNo }}</td>	
							<td>{{ optional($key->emportcar)->entryDate }}</td>
                           <td>{{ optional($key->emportcar)->exitDate }}</td>  
						   
							  
							  <td class="opra">
									     <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات  <i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-14">
                                   
                                                        <a class="dropdown-item" href="{{ route('reports.show',$key->id) }}" >
														 <i class="text-primary fas fa-eye"></i>&nbsp;&nbsp;
																بيانات صاحب العربة
														</a>

                                                        <a class="dropdown-item" href="{{route('carReport', $key->id) }}">
															<i class=" text-success fas fa-eye"></i>&nbsp;&nbsp; 
																بيانات العربة 
                                                            </a>

                                                        <a class="dropdown-item" href="{{ route('luggagesReport', $key->id) }}" >
															<i class="text-warning fas fa-eye"></i>&nbsp;&nbsp;
                                                            كشف عفش
														</a>

                                                       
													</div>
													
										</div>
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