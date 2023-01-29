@extends('layouts.master')
@section('title')
بيانات كشف عفش
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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير كشق عفش   </span>
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
						<a href="{{route('carReport', $customers->id) }}"class="btn btn-info "> 
								<i class="fas fa-eye"></i> بيانات العربة  </a>
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
						<div class="card-body" id="print" >
						<img src="{{URL::asset('assets/img/luggagHeader.png') }} "  width="100%" />
						<hr></hr>
							<div class="mg-t-50">
						    	<h5>التاريخ: {{date('d-m-Y')}}</h5>

								<h3 class="text-center" style=" text-decoration: underline; text-decoration-skip-ink: none ">
										إقرار جمركي لمحتويات العفش الشخصي	
								</h3>
	                      			<br/>
									<h4>

									* ملحوظة : كتابة اغراضك الشخصية بخط يدك وبدقة يوفر عليك عناء المراجعة اليدوية.

									</h4>
									<br/>
							</div>
								<div class="table-responsive" width="100%">
									<table class=" table  table-bordered table-hover mg-b-50 text-md-nowrap  " width="100%">
										<thead>
											
										</thead>
										<tbody>
											<tr>
											    <td >الاسم : {{ optional($customers->customer)->name }}</td>
												<td colspan=2>نوع العربة :   {{ optional($customers->car->vehicle)->name }}</td>
												
											</tr>
											
											<tr>	
											    <td >رقم الجواز : {{ optional($customers->customer)->passport }}</td>
												<td colspan=2>الموديل : {{ optional($customers->car->CarMark)->name }}</td>
												
											</tr> 
											<tr>
												<td> رقم اللوحة : {{ optional($customers->car)->plateNo }}</td>

												<td>ميناء الشحن : {{ optional($customers->Shippingport)->name }}</td>
											    <td>اسم الباخرة : {{ optional($customers->Ship)->name }}</td>


											</tr>
											

											</tbody>
									</table>
								</div>

								<div>
									<h4>
									أقر بأن محتويات العفش الشخصي حسب التفاصيل الأتية:-

									</h4>
								</div>
								<div>
								<table class="table mybadingtable table-bordered table-hover mg-t-5 text-md-nowrap" width="100%">
									<tbody>			
								        
											<tr>
											    <td>1- </td>
												<td>2- </td>		
											</tr>
											<tr>
											    <td>3- </td>
												<td>4- </td>		
											</tr>
											<tr>
											    <td>5- </td>
												<td>6- </td>		
											</tr>
											<tr>
											    <td>7- </td>
												<td>8- </td>		
											</tr>
											<tr>
											    <td>9- </td>
												<td>10- </td>		
											</tr>
											<tr>
											    <td>11- </td>
												<td>12- </td>		
											</tr>
											<tr>
											    <td>13- </td>
												<td>14- </td>		
											</tr>
											<tr>
											    <td>15- </td>
												<td>16- </td>		
											</tr>
											<tr>
											    <td>17- </td>
												<td>18- </td>		
											</tr>
											<tr>
											    <td>19- </td>
												<td>20- </td>		
											</tr>
										</tbody>
									</table>
							</div>
							<div>
									<h5>
									وهذا بمثابة اقرار مني بذلك وأتحمل المسئولية الكاملة عن وجود اي شيء مخالف لقانون الجمارك والقوانين واللوائح الأخرى.
									<br/> 
									</h5>
									<h4 class="text-left  mg-b-50">التوقيع ...........................................</h4>
								</div>
								<div class="btn btn-dark col-xl-12">
									
									<h4 class="">
											للإستعمال الرسمي فقط
									</h4>
								</div>
							
							
						<div>
							<br/>
							
							
							<table class="table table-bordered  mg-b-50 text-md-nowrap mybadingtable" width="100%">
								
								<tbody>	
										<tr>
											    <td>نتيجة الكشف باالشعة السينية :     مطابق </td>
												<td colspan=2>   غير مطابق : </td>

												
											</tr>		
								
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