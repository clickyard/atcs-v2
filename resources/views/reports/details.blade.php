@extends('layouts.master')
@section('title')
بيانات صاحب عربة الإفراج المؤقت
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
						      <a href="{{route('carReport', $customers->id) }}" class="btn btn-success "> 
							    <i class=" fas fa-eye"></i>
								بيانات العربة </a>
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
							<!--	<h4> حالة السيارة :  {{ optional($customers->emportcar)->status_value }}   </h4>

								<h3 class="card-title mg-b-0">بيانات صاحب عربة الإفراج المؤقت</h3>
									<h3 class="card-title mg-b-0">شعبة الإفراج المؤقــــــت</h3>-->
								</div>
							</div>
							<div class="card-body" id="print">
							<img src="{{URL::asset('assets/img/onerHeader.png') }} "  width="100%" class="mg-b-30"/>
						<!--	<h3 class="card-title mg-b-0">التاريخ: {{date('d-m-Y')}}</h3>

							<div>
								<h3 class="text-center" style=" text-decoration: underline; text-decoration-skip-ink: none ">بيانات صاحب عربة الإفراج المؤقت </h3>
	                      			<br/>
							</div>-->
								<div class="table-responsive">
									<table class="table table-bordered table-hover mg-b-0 text-md-nowrap">
										<thead>
											
										</thead>
										<tbody>
											<tr>
												<th scope="row" rowspan=4>بيانات مالك السيارة</th>
											    <td>الاسم : {{ optional($customers)->customer->name }}</td>
												<td>تاريخ الدخول : {{ optional($customers)->entryDate }}</td>
												
											</tr>
											<tr>
												<td>الرقم الوطني : {{ optional($customers)->customer->nationalityNo }}</td>
												<td>نهاية تاريخ الخروج والعودة : {{ optional($customers)->exitDate }}</td>
												
											</tr>
											<tr>
												<td >رقم الإقامة : {{ optional($customers->customer)->residenceNo }}</td>	
												<td> تاريخ اصدار الجواز : {{ optional($customers->customer)->passportDate }}</td>
											
											</tr>
											<tr>	
											    <td>رقم الجواز : {{ optional($customers->customer)->passport }}</td>
												<td>تاري خ انتهاء االقامة   : {{ optional($customers->customer)->residenceDate }}</td>
												

											</tr>
											
											<tr>
											    <th scope="row" rowspan=4>بيانات السيارة</th>
											    <td>نوع العربة :   {{ optional($customers->car->vehicle)->name }}</td>
												<td>الموديل : {{ optional($customers->car->CarMark)->name }}</td>
												
											</tr>
											<tr>
											     <td>   اللون : {{ optional($customers->car)->color }}</td>
											     <td>قيمة السيارة : {{ optional($customers->car)->valueUsd }}</td>
																
											</tr>
											<tr>
												<td>رقم الشاسي: {{ optional($customers->car)->chassisNo }}</td>
												<td>رقم الماكنة : {{ optional($customers->car)->machineNo }}</td>	
											
												
											</tr>
											
											<tr>	
											    <td> رقم اللوحة : {{ optional($customers->car)->plateNo }}</td>
												<td>بلد تسجيل السيارة  : {{ optional($customers->car->country)->name }}</td>
											
											</tr>

											<tr>
											    <th scope="row" rowspan=4>دفتر المرور الجمركي(التربيك)</th>
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
											<tr>
											    <th scope="row" rowspan=5> العنوان داخل السعودية</th>
											    <td>اسم الشركة او الكفيل :{{ optional($customers->customer->guarantor)->gname }} </td>
												<td>التلفون : {{ optional($customers->customer->guarantor)->gtel }}</td>	
											</tr>
											<tr>
											    <td>المدينة : {{ $customers->customer->guarantor->myState->name }} </td>
												<td>   الحي  : {{ optional($customers->customer->guarantor)->gcity }} </td>
											</tr>
											<tr>
											    <td>  الشارع: {{ optional($customers->customer->guarantor)->gstreet }}</td>
										    	<td>  المبنى: {{ optional($customers->customer->guarantor)->ghouseNo }}</td>	
											</tr>
											<tr>
												<td colspan=2 > العنوان : {{ optional($customers->customer->guarantor)->gwork_address }}</td>
											</tr>
											<tr>
										        <td>جوال سعودي : {{ optional($customers->customer->guarantor)->gtel2 }} </td>
											     <td>واتساب سعودي   : {{ optional($customers->customer->guarantor)->gwhatsup }}   </td>
											</tr>
											
											<tr>
											    <th scope="row" rowspan=5> العنوان داخل السودان</th>
											    <td>المدينة او المنطقة :{{ optional($customers->customer->State)->name }} </td>
												<td>الحي او القرية : {{ optional($customers->customer)->city }}</td>
											</tr>
											<tr>
											    <td>اسم الشارع : {{ optional($customers->customer)->street }} </td>
												<td>   رقم المربع  : {{ optional($customers->customer)->block }} </td>
											</tr>
											<tr>
											    <td>  رقم المنزل: {{ optional($customers->customer)->houseNo }}</td>
										    	<td>  العنوان: {{ optional($customers->customer)->city }}</td>	
											</tr>
											<tr>
												<td > جوال 1 : {{ optional($customers->customer)->tel }}</td>
												<td > جوال 2 : {{ optional($customers->customer)->tel2 }}</td>
											</tr>
											<tr>
										        <td>واتساب السودان : {{ optional($customers->customer)->whatsup }} </td>
											     <td>الايميل   : {{ optional($customers->customer)->email }}   </td>
											</tr>
											
											<tr>
											    <th scope="row" rowspan=4>   عنوان اقرب الاقربين1</th>
											    <td> الإسم: {{ optional($customers->customer->custrefrance[0])->cname }} </td>
												<td>المدينة او المنطقة :  {{ optional($customers->customer->custrefrance[0]->State)->name }}  </td>						
											</tr>
											<tr>
												<td>الحي او القرية : {{ optional($customers->customer->custrefrance[0])->ccity }} -</td>
											    <td>اسم الشارع : {{ optional($customers->customer->custrefrance[0])->cstreet }}  </td>
											</tr>
											<tr>
											    <td>   رقم المربع  : {{ optional($customers->customer->custrefrance[0])->cblock }}  </td>
											    <td>  رقم المنزل: {{ optional($customers->customer->custrefrance[0])->chouseNo }} </td>											
											</tr>
											<tr>
												<td > الجوال  : {{ optional($customers->customer->custrefrance[0])->ctel }} </td>
												<td >عنوان العمل : {{ optional($customers->customer->custrefrance[0])->cwork_address }} </td>

											</tr>
											<tr>
											</tr>
											<tr>
											    <th scope="row" rowspan=4>   عنوان اقرب الاقربين2</th>
												<td> الإسم: {{ optional($customers->customer->custrefrance[1])->cname }} </td>
												<td>المدينة او المنطقة : {{ optional($customers->customer->custrefrance[1]->State)->name }}  </td>						
											</tr>
											<tr>
												<td>الحي او القرية : {{ optional($customers->customer->custrefrance[1])->ccity }} -</td>
											    <td>اسم الشارع : {{ optional($customers->customer->custrefrance[1])->cstreet }}  </td>
											</tr>
											<tr>
											    <td>   رقم المربع  : {{ optional($customers->customer->custrefrance[1])->cblock }}  </td>
											    <td>  رقم المنزل: {{ optional($customers->customer->custrefrance[1])->chouseNo }} </td>											
											</tr>
											<tr>
												<td > الجوال  : {{ optional($customers->customer->custrefrance[1])->ctel }} </td>
												<td  >عنوان العمل : {{ optional($customers->customer->custrefrance[1])->cwork_address }} </td>

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