@extends('layouts.master')
@section('title')

التمديد- لوحة التحكم

@endsection

@section('css')
<style>
        @media print {
            #print_Button , #save_Button , #title{
                display: none;
            }
        }

    </style>
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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة تمديد السيارات</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

			<!-- row opened -->
			
			<div class="row row-sm">

				<div class="col-xl-12">
					<div class="card" id="print">
					<img src="{{URL::asset('assets/img/atcsheader.jpg')}}" /> 
						<div class="card-header pb-0">

							<div  class="d-flex justify-content-between">
								<h4 class="right">التاريخ: {{date('d-m-Y')}}</h4>
								<h4 class="left">   {{ $serialNo}} </h4>

							</div>
							
							<div>
								<h2 align="center" class="bold"> تمديد دفاتر المرور الجمركي</h2>
								
								<h2 align="right" class="bold"> معنون للسيد / مدير ادارة مكافحة التهريب 
									<span font="bold">  المحترم</span>
							    </h2>
								<br/>
							</div>
						</div>
						
						<div class="card-body">
						<table class="table mg-b-0 text-md-nowrap">
							   <tr>
								   <td>أسم صاحب العربة : </td>
								   <td>{{ $Customer->name }}</td>
								</tr>
								<tr>
								   <td>رقم الجواز : </td>
								   <td>{{ $Customer->passport }}</td>
								</tr>
								<tr>
								   <td>العنوان بالسودان : </td>
								   <td>{{ $Customer->block .' - '.$Customer->city.' - '.optional($Customer->state)->name}}</td>
								</tr>
								<tr>
								   <td>تاريخ دخول المركبة : </td>
								   <td>{{ optional($Customer->emportcar)->entryDate }}</td>
								</tr>
								<tr>
								   <td>ماركة المركبة : </td>
								   <td>{{ optional($Customer->car->carMark)->name .'- '. optional($Customer->car->vehicle)->name}}</td>
								</tr>
								<tr>
								   <td> موديل المركبة:</td>
								   <td>{{ optional($Customer->car)->year }} </td>
								</tr>
								<tr>
								   <td> رقم الهيكل : </td>
								   <td> {{ optional($Customer->car)->machineNo }}</td>
								</tr>
								<tr>
								   <td> رقم اللوحة:  </td>
								   <td>{{ optional($Customer->car)->chassisNo }}</td>
								</tr>
								<tr>
								   <td> رقم الدفتر: </td>
								   <td> {{ optional($Customer->emportcar)->carnetNo }}</td>
								</tr>
								
								</table>
								<hr/>
								<br/><br/>
								<h4>
								التوصية :- لا مانع لدينا من التجديد لفترة ثلاثة شهور أخرى وفق النظام المعمول به.
								</h4>
								<h4>ملحوظة : اي كشط او تعديل يلغي هذا االرونيك </h4>
								<table class="table mg-b-0 text-md-nowrap">
									 <tr>
										 <td rowspan=4 colspan=3 > الختم: 
											<img src="{{URL::asset('assets/img/sigin.png') }} " />
										
										
										</td>
										
										 <td  rowspan=4 colspan=3>التوقيع: {{ Auth::user()->name}}</td>
									</tr>
									<tr>

									   <td></td>
									   <td></td>
									  
									</tr>
									
								</table>
								<br/><br/><br/>
								<p> 	ايصال رقم ( )</p>
								<br/>

								<div>
								<a href="#" class="btn btn-info"  title="حفظ " id="save_Button" >
									<i class="las la-pen"></i>  حفظ</a>
							
									<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>

								
									
									
								</div>		

						</div>
					</div>
				</div>
			</div>     
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