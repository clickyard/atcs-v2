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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة السيارات </span>
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
								<h3 class="text-center"> إستخراج الخطابات</h3>
	                      <br/>
							</div>
                            @if(count($intarnalCars) == 0)
								<div class="panel-body text-center">
                                <h4>{{ trans('emportcars.none_available') }}</h4>
								</div>
							@else
						 <div class="table-responsive">
									<table id="example1" class="table  table-hover key-buttons text-md-nowrap">
										<thead>
											<tr>
											  <tr>
												<th class="border-bottom-0">#</th>
												<th>{{ trans('emportcars.cus_id') }}</th>
                                               <th>{{ trans('emportcars.carnetNo') }}</th>
                                                <th>  {{ trans('cars.chassisNo') }}</th>
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
							<td>{{ $emportcars->exitDate }}</td>
							<td>{{ $emportcars->status_value }}</td>

                                   
									<td class="opra">
						<div class="dropdown">
									<button aria-expanded="false" aria-haspopup="true"
										class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
										type="button">العمليات  <i class="fas fa-caret-down ml-1"></i></button>
									<div class="dropdown-menu tx-14">
										@if($emportcars->status ==0 || $emportcars->status ==1) 
												<a class="dropdown-item" data-effect="effect-scale"  
												        data-toggle="modal" href="#exampleModal2"
														data-carnetNo="{{ $emportcars->carnetNo }}" 
														data-destination="{{ $emportcars->destination }}" 	
														data-name="{{ optional($emportcars->Customer)->name}}"
														data-chassisNo="{{ optional($emportcars->Customer->Car)->chassisNo }}"
														data-exitDate="{{ $emportcars->exitDate }}" 
														data-passport="{{ optional($emportcars->Customer)->passport }}"
														data-address="{{optional($emportcars->Customer)->block .' - '.optional($emportcars->Customer)->city.' - '.optional($emportcars->Customer->state)->name}}" 
														data-extAddress="{{optional($emportcars->Customer->guarantor)->gblock .' - '.optional($emportcars->Customer->guarantor)->gcity.' - '}}" 
														data-entryDate="{{ $emportcars->entryDate }}" 
														data-carMark="{{ optional($emportcars->Customer->car->carMark)->name .'- '. optional($emportcars->Customer->car->vehicle)->name}}" 
														data-year="{{ optional($emportcars->Customer->car)->year }} " 
														data-plateNo="{{ optional($emportcars->Customer->car)->plateNo }}"  >
														<i class="text-info fas fa-pen"></i>&nbsp;&nbsp;
													اورنيك تخليص
												</a>
											@endif 

										<?php /*	@if($emportcars->status ==1) 
													<a class="dropdown-item" href="#">
														<i class=" text-success fas fa-sign-in-alt"></i>&nbsp;&nbsp; 
														تصريح مغادرة		
													</a>
												@endif 
												*/ ?>
										@if($emportcars->status ==1 || $emportcars->status ==3) 	
											 @if($emportcars->allow_increase) 
											 <a class="dropdown-item" data-effect="effect-scale"  
												        data-toggle="modal" href="#exampleModal3"
														data-carnetNo="{{ $emportcars->carnetNo }}" 	
														data-name="{{ optional($emportcars->Customer)->name}}"
														data-chassisNo="{{ optional($emportcars->Customer->Car)->chassisNo }}"
														data-exitDate="{{ $emportcars->exitDate }}" 
														data-passport="{{ optional($emportcars->Customer)->passport }}"
														data-address="{{optional($emportcars->Customer)->block .' - '.optional($emportcars->Customer)->city.' - '.optional($emportcars->Customer->state)->name}}" 
														data-entryDate="{{ $emportcars->entryDate }}" 
														data-carMark="{{ optional($emportcars->Customer->car->carMark)->name .'- '. optional($emportcars->Customer->car->vehicle)->name}}" 
														data-year="{{ optional($emportcars->Customer->car)->year }} " 
														data-plateNo="{{ optional($emportcars->Customer->car)->plateNo }}"  >
														<i class="text-primary fas fa-plus"></i>&nbsp;&nbsp;
														خطاب تمديد
													</a>	
											@endif 	
											@endif 	
											@if($emportcars->status ==3) 		
											<a class="dropdown-item" data-effect="effect-scale"  
												        data-toggle="modal" href="#exampleModal4"
														data-entryDate="{{ $emportcars->entryDate }}" 
														data-carnetNo="{{ $emportcars->carnetNo }}" 	
														data-chassisNo="{{ optional($emportcars->Customer->Car)->chassisNo }}"
														data-port="{{ optional($emportcars->Shippingport)->name }}"
														data-guarantor="{{optional($emportcars->Customer->guarantor)->gname }}"
														data-exitDate="{{ $emportcars->exitDate }}"  >
													<i class="text-danger fas fa-truck-loading"></i>  &nbsp;&nbsp; 
													خطاب ترحيل

												</a>
											@endif 
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

				<!-- star model12 -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
					<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
				class="mdi mdi-printer ml-1"></i>طباعة</button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body1 ">
				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card print" id="print" >

							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between">
									<h4 class="right">التاريخ: {{date('d-m-Y')}}</h4>
									<h4 class="left">رقم/ن/س/ر/5/2021</h4>

								</div>
								
								<div>
									<h2 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
									أورنيك تخليص مركبات دفاتر المرور الجمركي
									</h2>
									<h3 class="mg-b-50" > معنون للسيد / مدير ادارة مكافحة التهريب 
										<span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  المحترم</span>
									</h3>
									
								</div>
							</div>
							
							<div class="card-body">
								<table class="table mg-b-50 text-md-nowrap ">
									<tr> <td>أسم صاحب العربة : </td>  <td id="name"></td> </tr>
									<tr> <td>رقم الجواز : </td> <td id="passport"></td> </tr>
									<tr> <td>قادم من  : </td> <td id="destination"></td> </tr>
									<tr> <td>تاريخ دخول المركبة : </td> <td id="entryDate"></td> </tr>
									<tr> <td>ماركة المركبة : </td>  <td id="carMark"></td> </tr>
									<tr> <td> موديل المركبة:</td>  <td id="year"></td> </tr>
									<tr> <td> رقم الهيكل : </td> <td id="chassisNo"> </td> </tr>
									<tr> <td> رقم اللوحة:  </td> <td id="plateNo"></td></tr>
									<tr> <td> رقم الدفتر: </td> <td  id="carnetNo" >  </td>	</tr>
									<tr> <td>العنوان خارج البلاد : </td> <td id="extAddress"></td> </tr>
									<tr> <td>العنوان داخل البلاد : </td> <td id="address"></td> </tr>
								</table>
								<h5>
								التوصية :-لا مانع لدينا وفق االنظام المعمول به
								</h5>
								<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
								
									<table class="table mg-t-50 mg-b-50 ">
										<tr> 
											<td rowspan=4 colspan=3 ><h5>	ختم الشركة </h5> </td>
											<td  rowspan=4 colspan=3> <h5> التوقيع </h5></td>
										</tr>
									</table>
									
									<p> 	ايصال رقم ( &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;)</p>
								<div>
							</div>		
							</div>
						</div>
					</div>
					</div>          
                </div>
                <div class="modal-footer">
				<button class="btn btn-danger " id="print_Button" onclick="printDiv()"> 
				<i	class="mdi mdi-printer ml-1"></i>طباعة</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
	<!-- end model12 -->


<!-- star model13 -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
					<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv2()"> <i
				class="mdi mdi-printer ml-1"></i>طباعة</button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body2">
				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card " id="print2">

							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between">
									<h4 class="right">التاريخ: {{date('d-m-Y')}}</h4>
									<h4 class="left">رقم/ن/س/ر/5/2021</h4>

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
									<tr> <td>أسم صاحب العربة : </td>  <td id="name"></td> </tr>
									<tr> <td>رقم الجواز : </td> <td id="passport"></td> </tr>
									<tr> <td>العنوان بالسودان : </td> <td id="address"></td> </tr>
									<tr> <td>تاريخ دخول المركبة : </td> <td id="entryDate"></td> </tr>
									<tr> <td>ماركة المركبة : </td>  <td id="carMark"></td> </tr>
									<tr> <td> موديل المركبة:</td>  <td id="year"></td> </tr>
									<tr> <td> رقم الهيكل : </td> <td id="chassisNo"> </td> </tr>
									<tr> <td> رقم اللوحة:  </td> <td id="plateNo"></td></tr>
									<tr> <td> رقم الدفتر: </td> <td  id="carnetNo" >  </td>	</tr>
								</table>
								<h5>
									التوصية :- لا مانع لدينا من التجديد لفترة ثلاثة شهور أخرى وفق النظام المعمول به.
								</h5>
								<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
								
									<table class="table mg-t-50 mg-b-50 ">
										<tr> 
											<td rowspan=4 colspan=3 ><h5>	ختم الشركة </h5> </td>
											<td  rowspan=4 colspan=3> <h5> التوقيع </h5></td>
										</tr>
									</table>
									
									<p> 	ايصال رقم ( &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;)</p>
								<div>
							</div>		
							</div>
						</div>
					</div>
					</div>          
                </div>
                <div class="modal-footer">
				<button class="btn btn-danger " id="print_Button" onclick="printDiv2()"> 
				<i	class="mdi mdi-printer ml-1"></i>طباعة</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
	<!-- end model13 -->


<!-- star model14 -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
					<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv3()"> <i
				class="mdi mdi-printer ml-1"></i>طباعة</button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body3">
				  <div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card " id="print3">

							<div class="card-header pb-0">
								<div  class="d-flex justify-content-between mg-b-50 ">
									<h6 class="right">التاريخ: {{date('d-m-Y')}}</h6>
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
                <div class="modal-footer">
				<button class="btn btn-danger " id="print_Button" onclick="printDiv3()"> 
				<i	class="mdi mdi-printer ml-1"></i>طباعة</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
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
		function printDiv2() {
            var printContents = document.getElementById('print2').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
		function printDiv3() {
            var printContents = document.getElementById('print3').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
		function printDiv4() {
            var printContents = document.getElementById('print4').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

<script>

		$('#exampleModal2').on('show.bs.modal', function(event) {
					
				$(".body1 #name").html($(event.relatedTarget).attr('data-name'));
				$(".body1 #carnetNo").html($(event.relatedTarget).attr('data-carnetNo'));
				$(".body1 #chassisNo").html($(event.relatedTarget).attr('data-chassisNo'));
				$(".body1 #exitDate").html($(event.relatedTarget).attr('data-exitDate'));
				$(".body1 #passport").html($(event.relatedTarget).attr('data-passport'));
				$(".body1 #address").html($(event.relatedTarget).attr('data-address'));
				$(".body1 #entryDate").html($(event.relatedTarget).attr('data-entryDate'));
				$(".body1 #carMark").html($(event.relatedTarget).attr('data-carMark'));
				$(".body1 #year").html($(event.relatedTarget).attr('data-year'));
				$(".body1 #plateNo").html($(event.relatedTarget).attr('data-plateNo'));
				$(".body1 #extAddress").html($(event.relatedTarget).attr('data-extAddress'));
				$(".body1 #destination").html($(event.relatedTarget).attr('data-destination'));
		});


      $('#exampleModal3').on('show.bs.modal', function(event) {

			$(".body2 #name").html($(event.relatedTarget).attr('data-name'));
			$(".body2 #carnetNo").html($(event.relatedTarget).attr('data-carnetNo'));
			$(".body2 #chassisNo").html($(event.relatedTarget).attr('data-chassisNo'));
			$(".body2 #exitDate").html($(event.relatedTarget).attr('data-exitDate'));
			$(".body2 #passport").html($(event.relatedTarget).attr('data-passport'));
			$(".body2 #address").html($(event.relatedTarget).attr('data-address'));
			$(".body2 #entryDate").html($(event.relatedTarget).attr('data-entryDate'));
			$(".body2 #carMark").html($(event.relatedTarget).attr('data-carMark'));
			$(".body2 #year").html($(event.relatedTarget).attr('data-year'));
			$(".body2 #plateNo").html($(event.relatedTarget).attr('data-plateNo'));
		
      		//var button = $(event.relatedTarget)
       		// var carnetNo = $(event.relatedTarget).attr('data-carnetNo');
    		//	var name = button.attr('data-name');
     		//var modal = $(this)
            // modal.find('.modal-body #name').val(name);
		   //$('.modal-body #carnetNo').html(carnetNo);
    });
	$('#exampleModal4').on('show.bs.modal', function(event) {
					
					$(".body3 #carnetNo").html($(event.relatedTarget).attr('data-carnetNo'));
					$(".body3 #chassisNo").html($(event.relatedTarget).attr('data-chassisNo'));
					$(".body3 #exitDate").html($(event.relatedTarget).attr('data-exitDate'));
					$(".body3 #entryDate").html($(event.relatedTarget).attr('data-entryDate'));
					$(".body3 #port").html($(event.relatedTarget).attr('data-port'));
					$(".body3 #guarantor").html($(event.relatedTarget).attr('data-guarantor'));

					
			});
</script>
@endsection