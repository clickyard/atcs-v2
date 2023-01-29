@extends('layouts.master')
@section('title')
استخراج الخطابات
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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إستخراج الخطابات  </span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
						<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
						<a href="{{route('process')}}" class="btn btn-primary  float-left mt-3 mr-2"  >
							 <i class="mdi mdi-refresh "></i>رجوع</a>
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

				<!-- /row -->   
			
				<!-- star model12 -->


				@if($type==5)
                <div class="modal-body body1 "  >

				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12" id="print" >
					<div class="card  pd-50" >
						 
						<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

							<div class="card-header pb-0 ">
								<div  class="d-flex justify-content-between mg-t-20">
									<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($processes->created_at)) }}</h4>
									<h4 class="left">{{ $processes->serialNo }}</h4>

								</div>
								
								<div>
									<h2 class="text-center mg-t-50 mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
									أورنيك تخليص مركبات دفاتر المرور الجمركي
									</h2>
									<h3 class="mg-b-50" > معنون للسيد / مدير ادارة مكافحة التهريب 
										<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  المحترم</span>
									</h3>
									
								</div>
							</div>
							
							<div class="card-body">
								<table class="table mg-b-50 text-md-nowrap ">
									<tr> <td>أسم صاحب العربة : </td>  <td >{{  $emportcar->customer->name }}</td> </tr>
									<tr> <td>رقم الجواز : </td> <td >{{ $emportcar->customer->passport }}</td> </tr>
									<tr> <td>قادم من  : </td> <td >{{ $emportcar->destination }}</td> </tr>
									<tr> <td>تاريخ دخول المركبة : </td> <td >{{ $emportcar->entryDate }}</td> </tr>
									<tr> <td>ماركة المركبة : </td>  <td >{{ $emportcar->car->CarMark->name }}</td> </tr>
									<tr> <td> موديل المركبة:</td>  <td >{{ $emportcar->car->year }}</td> </tr>
									<tr> <td> رقم الهيكل : </td> <td > {{ $emportcar->car->chassisNo }}</td> </tr>
									<tr> <td> رقم اللوحة:  </td> <td >{{ $emportcar->car->plateNo }}</td></tr>
									<tr> <td> رقم الدفتر: </td> <td > {{ $emportcar->carnetNo }} </td>	</tr>
									<tr> <td>العنوان خارج البلاد : </td> 
									<td >	{{ $emportcar->customer->guarantor->State->name }}- 
											{{ $emportcar->customer->guarantor->city }}
									</td> </tr>
									<tr> <td>العنوان داخل البلاد : </td> <td >{{ $emportcar->customer->State->name }}- {{$emportcar->customer->city}}</td> </tr>
								</table>
								<h5>
								التوصية :-لا مانع لدينا وفق االنظام المعمول به
								</h5>
								<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
								
								<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
								
									<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
								
									<h5 class="left"> التوقيع : {{  $processes->signature }}</h5>
										
								</div>

									
									
									<p> 	 ايصال استلام رسوم الموانئ رقم:  ( {{ $processes->voucher }} )</p>
								
							</div>
						</div>
					</div>
					</div>          
                </div>
	@endif
   <!--- start new model -->
<!-- end model12 -->
@if($type==4)
                <div class="modal-body body2">
				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12" id="print">
						<div class="card  pd-50" >
						<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between">
								   <h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($processes->created_at)) }}</h4>
									<h4 class="left">{{ $processes->serialNo }}</h4>

								</div>
								
								<div>
									<h2 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
									 خطاب بلاغ عن مخالفة عربة  </h2>
									<h3 class="mg-b-30" > معنون للسيد / مدير ادارة مكافحة التهريب 
										<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  المحترم</span>
									</h3>
									
								</div>
							</div>
							
							<div class="card-body">
								<table class="table mg-b-50 text-md-nowrap ">
								    <tr> <td>أسم صاحب العربة : </td>  <td >{{  $emportcar->customer->name }}</td> 
									     <td>رقم الجواز : </td> <td >{{ $emportcar->customer->passport }}</td> </tr>
									<tr> 
										<td>العنوان بالسودان : </td> <td >{{ $emportcar->customer->State->name }}- {{$emportcar->customer->city}}</td> 
										<td>تاريخ دخول المركبة : </td> <td >{{ $emportcar->entryDate }}</td> </tr>
									<tr> 
										<td>ماركة المركبة : </td>  <td >{{ $emportcar->car->CarMark->name }}</td>
									     <td> موديل المركبة:</td>  <td >{{ $emportcar->car->year }}</td> </tr>
									<tr>
										 <td> رقم الهيكل : </td> <td > {{ $emportcar->car->chassisNo }}</td> 
									    <td> رقم اللوحة:  </td> <td >{{ $emportcar->car->plateNo }}</td></tr>
									<tr> <td> رقم الدفتر: </td> <td > {{ $emportcar->carnetNo }} </td>	</tr>
									
								</table>
								<h5>
								عنوان البلاغ : {{  $processes->title }}
								</h5>
								<p>الموضوع: <br/>
									{{  $processes->desc }} </p>
								
								<h5>ملحوظة : اي كشط او تعديل يلغي هذا البلاغ </h5>
								
								<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
								
									<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
								
									<h5 class="left"> التوقيع : {{  $processes->signature }}</h5>
										
								</div>
								
								
									
									
								
							</div>
						</div>
					</div>
					</div>          
                </div>
           
	<!-- end model13 -->
@endif
	<!-- end model12 -->
	@if($type==2)
                <div class="modal-body body2">
				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12" id="print">
						<div class="card  pd-50" >
						<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between">
								   <h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($processes->created_at)) }}</h4>
									<h4 class="left">{{ $processes->serialNo }}</h4>

								</div>
								
								<div>
									<h2 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
									 خطاب تمديد مغادرة  </h2>
									<h3 class="mg-b-50" > معنون للسيد / مدير ادارة مكافحة التهريب 
										<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  المحترم</span>
									</h3>
									
								</div>
							</div>
							
							<div class="card-body">
								<table class="table mg-b-50 text-md-nowrap ">
								    <tr> <td>أسم صاحب العربة : </td>  <td >{{  $emportcar->customer->name }}</td> </tr>
									<tr> <td>رقم الجواز : </td> <td >{{ $emportcar->customer->passport }}</td> </tr>
									<tr> <td>العنوان بالسودان : </td> <td >{{ $emportcar->customer->State->name }}- {{$emportcar->customer->city}}</td> </tr>
									<td>تاريخ دخول المركبة : </td> <td >{{ $emportcar->entryDate }}</td> </tr>
									<tr> <td>ماركة المركبة : </td>  <td >{{ $emportcar->car->CarMark->name }}</td> </tr>
									<tr> <td> موديل المركبة:</td>  <td >{{ $emportcar->car->year }}</td> </tr>
									<tr> <td> رقم الهيكل : </td> <td > {{ $emportcar->car->chassisNo }}</td> </tr>
									<tr> <td> رقم اللوحة:  </td> <td >{{ $emportcar->car->plateNo }}</td></tr>
									<tr> <td> رقم الدفتر: </td> <td > {{ $emportcar->carnetNo }} </td>	</tr>
									
								</table>
								<h5>
									التوصية :- لا مانع لدينا من التجديد لفترة  شهر  واحد حتى تسطيع المركبة مغادرة البلاد وفق النظام المعمول به.
								</h5>
								<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
								
								<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
								
									<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
								
									<h5 class="left"> التوقيع : {{  $processes->signature }}</h5>
										
								</div>
								
								
									
									
									<p> 	 ايصال استلام رسوم  رقم:  ( {{ $processes->voucher }} )</p>
								
							</div>
						</div>
					</div>
					</div>          
                </div>
           
	<!-- end model13 -->
@endif

<!-- star model13 -->
@if($type==3)
                <div class="modal-body body2">
				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12" id="print">
						<div class="card  pd-50" >
						<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between">
								   <h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($processes->created_at)) }}</h4>
									<h4 class="left">{{ $processes->serialNo }}</h4>

								</div>
								
								<div>
									<h2 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
									 تمديد دفاتر المرور الجمركي</h2>
									<h3 class="mg-b-50" > معنون للسيد / مدير ادارة مكافحة التهريب 
										<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  المحترم</span>
									</h3>
									
								</div>
							</div>
							
							<div class="card-body">
								<table class="table mg-b-50 text-md-nowrap ">
								    <tr> <td>أسم صاحب العربة : </td>  <td >{{  $emportcar->customer->name }}</td> </tr>
									<tr> <td>رقم الجواز : </td> <td >{{ $emportcar->customer->passport }}</td> </tr>
									<tr> <td>العنوان بالسودان : </td> <td >{{ $emportcar->customer->State->name }}- {{$emportcar->customer->city}}</td> </tr>
									<td>تاريخ دخول المركبة : </td> <td >{{ $emportcar->entryDate }}</td> </tr>
									<tr> <td>ماركة المركبة : </td>  <td >{{ $emportcar->car->CarMark->name }}</td> </tr>
									<tr> <td> موديل المركبة:</td>  <td >{{ $emportcar->car->year }}</td> </tr>
									<tr> <td> رقم الهيكل : </td> <td > {{ $emportcar->car->chassisNo }}</td> </tr>
									<tr> <td> رقم اللوحة:  </td> <td >{{ $emportcar->car->plateNo }}</td></tr>
									<tr> <td> رقم الدفتر: </td> <td > {{ $emportcar->carnetNo }} </td>	</tr>
									
								</table>
								<h5>
									التوصية :- لا مانع لدينا من التجديد لفترة ثلاثة شهور أخرى وفق النظام المعمول به.
								</h5>
								<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
								
								<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
								
									<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
								
									<h5 class="left"> التوقيع : {{  $processes->signature }}</h5>
										
								</div>
								
								
									
									
									<p> 	 ايصال استلام رسوم  رقم:  ( {{ $processes->voucher }} )</p>
								
							</div>
						</div>
					</div>
					</div>          
                </div>
           
	<!-- end model13 -->
@endif

<!-- star model14 -->
@if($type==6)
                <div class="modal-body body3">
				  <div class="row row-sm">
				  <div class="col-lg-12 col-md-12" id="print">
						<div class="card  pd-50" >
							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between mg-b-50 ">
								    <h4 class="right">التاريخ:{{ date('Y-m-d',strtotime($processes->created_at)) }}</h4>
									<h4 class="left">{{ $processes->serialNo }}</h4>
								</div>
								
								<div>
								<h3 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
								الموضوع : خطاب ترحيل عربة
								</h3>

									<p class="mg-b-20 tx-20" style="">	
								
									شاسيه رقم :  <span id="chassisNo"></span>
									<br/>
									دخلت البلاد عن طريق جمرك: <span id="port"></span>
									<br/>
									بتاريخ :  <span id="entryDate"></span> 
									
									<br/>
									بدفتر المرور الدولي رقم : <span id="carnetNo"></span>
									<br/>
									صادر من نادي :
									باسم /  <span id="guarantor"></span>
									<br/>
									انتهت مدة صلاحية الدفتر :  <span id="exitDate"></span>
								</p>	
								
									
									
								</div>
							</div>
							
							<div class="card-body">
							<h3 class="mg-b-50 " > السيد الأستاذ / مدير عام اتحاد السيارات السعــودي 
										<br/>
										<span class="mg-r-50 mg-t-50 tb" >   تحية طيبة وبعد ،</span>
									</h3>
							<p class="tx-18">

							نتـشرف بالإحاطة بان السيــارة الموضح بياناتها أعلاه دخــلت الأراضي السودانـيــة وانتـهت
صالحية الدفتر الدولية دون ان يثبت اعادة تصديرها او سداد الضرائب والرسوم الجمركية عنــها.
 لذا نرجو التكرم بموافاتنا بما يفيد خـروج السيـارة من االراضـي السـودانية او انـهاء اجراءاتهــا
بالجمارك السودانية او شهادة من السلطات المختصة تفيد وجود السيارة خارج السودان في تاريــخ
لاحق لتاريخ دخولها والسلطات الجمركية السودانية تطالبنا بسداد قيمة الرسوم الجمركية المطلوبة
عنها بمبلغ ...................................جنيها .(.................................................................).
 رجاء التنبيه باتخــاذ اللازم نحو تسوية وضع السيارة من الناحية الجمـركية او ارسال المبلــغ
المطلوب لسداده للسلطـات الجمركية الســودانية حتى يمكن انهاء الوضع وتسديــد القيودات طبقــــا
لالتــفاقية الدوليــة.

							</p>
				
								<h4 class="text-center mg-b-50  ">
								وتفضلو بقبول فائق الإحترام
								</h4>
								<h5>المتابعة </h5>
								
									<table class="table mg-t-50 mg-b-50 ">
										<tr> 
											<td rowspan=4 colspan=3 ><h5>	وكيل الإدارة الجمركية </h5> </td>
											<td  rowspan=4 colspan=3> <h5> نائب المدير العام  </h5></td>
										</tr>
									</table>
									
								<div>
							</div>		
							</div>
						</div>
					</div>
					</div>          
                </div>
 @endif           
	<!-- end model13 -->

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