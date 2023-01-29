@extends('layouts.master')
@section('title')
بيانات كشف عربة الإفراج المؤقت
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
						      <button class="btn btn-danger " id="print_Button" onclick="printDiv()"> <i
									class="mdi mdi-printer ml-1"></i>طباعة</button>
					    </div>
						<div class="pr-1 mb-3 mb-xl-0">
						      <a href="{{ route('reports.show', $customers->id) }}" class="btn btn-success "> 
							    <i class=" fas fa-eye"></i>
								بيانات صاحب العربة </a>
					    </div>
						<div class="pr-1 mb-3 mb-xl-0">
						<a href="{{ route('luggagesReport', $customers->id) }}"class="btn btn-info "> 
								<i class="fas fa-eye"></i>كشف عفش</a>
					    </div>
						<div class="pr-1 mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">الرجوع الى</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="{{ url('/' . $page='customerReports') }}">تفرير العملاء</a>
									<a class="dropdown-item" href="{{ url('/' . $page='intarnalCarsReport') }}"> بالداخل</a>
									<a class="dropdown-item" href="{{ url('/' . $page='leavingCarsReport') }}">غادرت</a>
									<a class="dropdown-item" href="{{ url('/' . $page='traheelReport') }}">الترحيل</a>
									<a class="dropdown-item" href="{{ url('/' . $page='alerts') }}">البلاغات</a>
								</div>
							</div>
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
			<div class="row row-sm">
				<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
							<?php /*	<h4> حالة السيارة :  {{ optional($customers->emportcar)->status_value }}   </h4>
*/ ?>
						<!--	<h3 class="card-title mg-b-0">بيانات صاحب عربة الإفراج المؤقت</h3>
									<h3 class="card-title mg-b-0">شعبة الإفراج المؤقــــــت</h3>-->
								</div>
							</div>
						<div class="card-body" id="print" >
						<img src="{{URL::asset('assets/img/carheader.png') }} "  width="100%" class="mg-b-30"/>

							<!--<div >
						    	<h5>التاريخ: {{date('d-m-Y')}}</h5>

								<h3 class="text-center" style=" text-decoration: underline; text-decoration-skip-ink: none ">بيانات كشف عربة الإفراج المؤقت </h3>
	                      			<br/>
							</div>-->
								<div class="table-responsive">
									<table class="table table-bordered table-hover mg-b-50 text-md-nowrap">
										<thead>
											
										</thead>
										<tbody>
											<tr>
											    <td>الاسم : {{ optional($customers)->customer->name }}</td>
												<td>تاريخ الدخول : {{ optional($customers)->entryDate }}</td>
												
											</tr>
											<tr>
												<td>الرقم الوطني : {{ optional($customers)->customer->nationalityNo }}</td>
												<td>نهاية تاريخ الخروج والعودة : {{ optional($customers)->exitDate }}</td>
												
											</tr>
											<tr>
												<td >رقم الإقامة : {{ optional($customers)->customer->residenceNo }}</td>	
												<td> تاريخ اصدار الجواز : {{ optional($customers)->customer->passportDate }}</td>
											
											</tr>
											<tr>	
											    <td>رقم الجواز : {{ optional($customers)->customer->passport }}</td>
												<td>تاري خ انتهاء االقامة   : {{ optional($customers)->customer->residenceDate }}</td>
												

											</tr>
											<tr>
												<td>العنوان بالسودان :{{ optional($customers)->customer->block }}/{{ optional($customers)->customer->street }} /{{ optional($customers)->customer->city }}/{{ optional($customers->customer->State)->name }} </td>
												<td>  التلفون : {{ optional($customers)->customer->tel }}</td>

											</tr>
											<tr>
												<td>العنوان بالخارج : {{ optional($customers->customer->guarantor)->ghouseNo }}/{{ optional($customers->guarantor)->gstreet }} / {{ optional($customers->guarantor)->gcity }}/{{ optional($customers->customer->guarantor->myState)->name }} </td>
												<td>التلفون : {{ optional($customers->customer->guarantor)->gtel }}</td>

											</tr>

											</tbody>
									</table>
									<table class="table table-bordered  mg-b-50 text-md-nowrap">
									<tbody>
											<tr>
											    <td>رقم الدفتر :   {{ optional($customers)->carnetNo }} </td>
												<td>تاريخ إصدار الدفتر : {{ optional($customers)->issueDate }} </td>
											
											</tr>
											<tr>
												<td>ميناء الشحن : {{ optional($customers->Shippingport)->name }}</td>
												<td>   جهة القدوم : {{ optional($customers)->destination }}</td>
											</tr>
											
											<tr>	
										    	<td> ميناء الوصول : {{ optional($customers->Shippingport)->name }} </td>
											    <td>اسم الباخرة : {{ optional($customers->Ship)->name }}</td>
											</tr>
											<tr>
											    <td>الوكيل الملاحي : {{ optional($customers)->shippingAgent }}</td>
												<td>رقم إذن التسليم : {{ optional($customers)->deliveryPerNo }}   </td>
											</tr>
										</tbody>
									</table>
									<table class="table table-bordered  mg-b-50 text-md-nowrap">
									<tbody>		
											<tr>
											    <td>نوع العربة :   {{ optional($customers->car->vehicle)->name }}</td>
												<td>الموديل : {{ optional($customers->car->CarMark)->name }}</td>
												
											</tr>
											<tr>
											     <td>   اللون : {{ optional($customers->car)->color }}</td>
												 <td> رقم اللوحة : {{ optional($customers->car)->plateNo }}</td>
																
											</tr>
											<tr>
												<td>رقم الشاسي: {{ optional($customers->car)->chassisNo }}</td>
												<td>رقم الماكنة : {{ optional($customers->car)->machineNo }}</td>	
											
											</tr>
										</tbody>
									</table>
								</div>

								<div>
									<br/>
									<h4>
									أنا (التوقيع):..................................... أقر بأن البيانات الموضحـــة أعلاه صحيحة ومطابقة.

									</h4>
									<br/>


								</div>
								<div class="btn btn-dark col-xl-12">
									
									<h4 class="">
									للإستعمال الرسمي: كشف عربات الإفراج المؤقت و السياحي

									</h4>
								</div>
							<div>
								<table class="table table-bordered table-hover mg-t-5 text-md-nowrap">
									<tbody>			
								
											<tr>
											    <td>نوع العربة :  </td>
												<td>الموديل : </td>
												<td>   اللون : </td>

												
											</tr>
											<tr>
												<td colspan=3 >رقم الشاسي: </td>
				
											</tr>
											<tr>
											   <td > رقم اللوحة : </td>
												<td colspan=2>رقم الماكنة :</td>	
											
											</tr>
										</tbody>
									</table>
							</div>
							
						<div>
							<br/>
							<table class="table table-bordered  mg-b-50 text-md-nowrap">
									<tbody>			
								
											<tr>
											    <td>اسم الضابط :  </td>
												<td>الرتبة : </td>
												<td>   التوقيع : </td>

												
											</tr>
										</tbody>
								</table>
						</div>
						</div>
						</div>
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