@extends('layouts.master')
@section('title')

الإجراءات
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
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  اجراءات الافراج المؤقت </span>
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
				


			
			
					<div class="col-lg-2 mg-t-10">
										<label for="inputName" class=""> البحث برقم الدفتر</label>
			   </div>
			<div class="col-lg-5 ">
					<form action="{{ route('SearchLetters') }}" class="col-lg-10 " method="POST" role="search" autocomplete="off">
                    {{ csrf_field() }}
									<?php /*--	<select name="carnet" onchange="this.form.submit()" class="form-control select2"  >
												<option value=""  > اختر رقم الدفتر</option>
												@foreach ($customerlist as $emp)
													<option value="{{ $emp->id }}" >
														{{ $emp->carnetNo}}
													</option>
												@endforeach

										</select>-->*/?>
										<input name="carnet" onchange="this.form.submit()" value="{{ optional($emportcar)->carnetNo }}" class="form-control" />
						</form>
				</div>	

<?php
/*
$uniques = array();
foreach ($customerlist as $emp) {
    $uniques=array(	
		         'id'=> $emp->id,
				'name'=>$emp->customer->name
				); // Get unique country by code.
}
?>
				                    <div class="col-lg-4 mg-t-20 ">
										<label for="inputName" class="control-label"> البحث بالاسم</label>
										<select name="cus_id" id="cus_id"  class="form-control select2"  >
												<option value=""  > اختر الاسم من القائمة</option>
												@foreach (array_unique($uniques) as $key =>$emp)
													<option value="{{ $key }}" >
														{{ $emp}}
													</option>
												@endforeach
												
										  </select>
									</div>
							
									<div class="col-lg-4 mg-t-20">
										<label for="inputName" class="control-label"> البحث  برقم اللوحة</label>
										<select name="plateNo"  class="form-control select2"  >
												<option value=""   > اختر رقم اللوحة</option>
												@foreach ($customerlist as $emp)
													<option value="{{ $emp->id }}" >
														{{ $emp->mycars->plateNo }}
													</option>
												@endforeach
										</select>
									</div>
				*/?>
				
					
            </div>
				<div class="card mg-b-20 mg-t-20">
			
						
					
			    <div class="card-body" id ="mytable" >
				@if($emportcar!=null)
						<table class="table table-bordered table-hover mg-b-20 text-md-nowrap">
									<thead>
										
									</thead>
									<tbody>
										<tr>
											<td>الاسم : {{ optional($emportcar)->customer->name }}</td>
											<td>رقم الدفتر :   {{ optional($emportcar)->carnetNo }} </td>
											<td>رقم الشاسي: {{ optional($emportcar->car)->chassisNo }}</td>
											<td>نوع العربة :   {{ optional($emportcar->car->vehicle)->name }}</td>

																	

										</tr>
										<?php /*<tr>
											<td> رقم اللوحة : {{ optional($emportcar->car)->plateNo }}</td>		
											<td>تاريخ الدخول : {{ $emportcar->entryDate }}</td>

											<td> تاريخ الخروج : {{ optional($emportcar)->exitDate }}</td>	
											<td> الحالة: {{ optional($emportcar)->status_value }}</td>	


										</tr>*/?>
																				
										</tbody>
						</table>
				




<!-- //////////////////////////////////-->


         <div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card overflow-hidden">
							<div class="card-header pb-0">
								<h3 class="card-title">الخطابات</h3>
								<p class="text-muted card-sub-title mb-0"></p>
							</div>
							<div class="card-body">
								<div class="panel-group1" id="accordion11">


									<div class="panel panel-default  mb-4">
										<div class="panel-heading1 bg-primary ">
											<h4 class="panel-title1">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFour1" aria-expanded="false">خطاب تمديد اول<i class="fe fe-arrow-left ml-2"></i></a>
											</h4>
										</div>
										<div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
										<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                               				 class="mdi mdi-printer ml-1"></i>طباعة</button>	
										<div class="panel-body border" id="print">
											@if($emportcar->myincreases != null)	
												<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0">
													<div  class="d-flex justify-content-between">
													<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($emportcar->myincreases[0]->created_at)) }}</h4>
														<h4 class="left">{{ $emportcar->myincreases[0]->serialNo }}</h4>

													</div>
													
													<div>
														<h2 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
														تمديد دفاتر المرور الجمركي
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
													
														<h5 class="left"> التوقيع : {{  $emportcar->myincreases[0]->signature }}</h5>
															
													</div>
													
													
														
														
														<p> 	 ايصال استلام رسوم  رقم:  ( {{ $emportcar->myincreases[0]->voucher }} )</p>
													
												</div>
                                            @else لا يوجد خطاب تجديد
											@endif;

											
											</div>
										</div>
									</div>
<!---------------------------------------------------------------------------------------------------------------------------------------->

									<div class="panel panel-default mb-4">
										<div class="panel-heading1  bg-info">
											<h4 class="panel-title1">
												<a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive2" aria-expanded="false">خطاب تمديد مغادرة <i class="fe fe-arrow-left ml-2"></i></a>
											</h4>
										</div>
										<div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
										<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv2()"> <i
                               				 class="mdi mdi-printer ml-1"></i>طباعة</button>	
										<div class="panel-body border" id="print2">
											@if($emportcar->myincreases != null && $emportcar->myincreases[1]!=null)	
												<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0">
													<div  class="d-flex justify-content-between">
													<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($emportcar->myincreases[1]->created_at)) }}</h4>
														<h4 class="left">{{ $emportcar->myincreases[1]->serialNo }}</h4>

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
													
														<h5 class="left"> التوقيع : {{  $emportcar->myincreases[1]->signature }}</h5>
															
													</div>
													
													
														
														
														<p> 	 ايصال استلام رسوم  رقم:  ( {{ $emportcar->myincreases[1]->voucher }} )</p>
													
												</div>
                                            @else  لا يوجد خطاب تجديد مغادرة
											@endif;

											
											
											</div>
										</div>
									</div>
<!--------------------------------------------------------------------------------------------------------------------------------->
									<div class="panel panel-default mb-4">
										<div class="panel-heading1  bg-success">
											<h4 class="panel-title1">
												<a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive3" aria-expanded="false">خطاب  مغادرة <i class="fe fe-arrow-left ml-2"></i></a>
											</h4>
										</div>
										<div id="collapseFive3" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
										<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv3()"> <i
                               				 class="mdi mdi-printer ml-1"></i>طباعة</button>	
										<div class="panel-body border" id="print3">
											
											@if($emportcar->myleavingcars != null)	
												<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0">
													<div  class="d-flex justify-content-between">
													<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($emportcar->myleavingcars->created_at)) }}</h4>
														<h4 class="left">{{ $emportcar->myleavingcars->serialNo }}</h4>

													</div>
													
													<div>
														<h2 class="text-center mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
														مغادرة عربة الافراج المؤقت													 </h2>
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
													نوصي بالمغادرة فورا من البلاد													</h5>
													<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
													
													<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
													
														<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
													
														<h5 class="left"> التوقيع : {{  $emportcar->myleavingcars->signature }}</h5>
															
													</div>
													
													
														
														
														<p> 	 ايصال استلام رسوم  رقم:  ( {{ $emportcar->myleavingcars->voucher }} )</p>
													
												</div>
                                            @else لا يوجد خطاب مغادرة
											@endif;





											</div>
										</div>
									</div>

<!--------------------------------------------------------------------------------------------------------------------->
									<div class="panel panel-default mb-4">
										<div class="panel-heading1  bg-warning">
											<h4 class="panel-title1">
												<a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive4" aria-expanded="false">خطاب  تخليص <i class="fe fe-arrow-left ml-2"></i></a>
											</h4>
										</div>
										<div id="collapseFive4" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
										<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv4()"> <i
                               				 class="mdi mdi-printer ml-1"></i>طباعة</button>	
										<div class="panel-body border" id="print4">
											@if($emportcar->mytakhlees!=null)

												<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0 ">
													<div  class="d-flex justify-content-between mg-t-20">
														<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($emportcar->mytakhlees->created_at)) }}</h4>
														<h4 class="left">{{ $emportcar->mytakhlees->serialNo }}</h4>

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
													
														<h5 class="left"> التوقيع : {{  $emportcar->mytakhlees->signature }}</h5>
															
													</div>

														
														
														<p> 	 ايصال استلام رسوم الموانئ رقم:  ( {{ $emportcar->mytakhlees->voucher }} )</p>
													
												</div>
                                           @else
										 <p> لا يوجد خطاب تخليص</p>  
										   @endif

											
											
											</div>
										</div>
									</div>

<!---------------------------------------------------------------------------------------------------------------->
									<div class="panel panel-default mb-0">
										<div class="panel-heading1  bg-danger">
											<h4 class="panel-title1">
												<a class="accordion-toggle mb-0 collapsed" data-toggle="collapse" data-parent="#accordion11" href="#collapseFive5" aria-expanded="false">خطاب  مخالفة <i class="fe fe-arrow-left ml-2"></i></a>
											</h4>
										</div>
										<div id="collapseFive5" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
										<button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv5()"> <i
                               				 class="mdi mdi-printer ml-1"></i>طباعة</button>	
										<div class="panel-body border" id="print5">
											
											@if($emportcar->myalerts!=null)

												<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0 ">
													<div  class="d-flex justify-content-between mg-t-20">
														<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($emportcar->myalerts->created_at)) }}</h4>
														<h4 class="left">{{ $emportcar->myalerts->serialNo }}</h4>

													</div>
													
													<div>
														<h2 class="text-center mg-t-50 mg-b-50" style=" text-decoration: underline; text-decoration-skip-ink: none ">
														خطاب بلاغ عن مخالفة عربة 
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
														عنوان البلاغ : {{  $emportcar->myalerts->title }}
														</h5>
														<p>الموضوع: <br/>
															{{  $emportcar->myalerts->desc }} </p>
														
														<h5>ملحوظة : اي كشط او تعديل يلغي هذا البلاغ </h5>
													
													<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
													
														<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
													
														<h5 class="left"> التوقيع : {{  $emportcar->myalerts->signature }}</h5>
															
													</div>

														
														
														<p> 	 ايصال استلام   رقم:  ( {{ $emportcar->myalerts->voucher }} )</p>
													
												</div>
                                           @else
										 <p> لا يوجد خطاب مخالفة</p>  
										   @endif

											
											
											</div>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->


<!--	////////////////////-->
					@else 
					 لا توجد بيانات 
					
					@endif
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
<!--<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>-->
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js --
<script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>-->
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>



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

		function printDiv5() {
            var printContents = document.getElementById('print5').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

 </script>
<script>
    $(document).ready(function() {
		$('#entryDate').on('change', function() {

		var dateTypeVar = $('#entryDate').datepicker('getDate');
        var entryd= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
		$('#entryDate').val(entryd);

		var newDate = moment(entryd, "YYYY-MM-DD").add(3, 'months').format('YYYY-MM-DD');

		$('#exitDate').val(newDate);

	//	alert(newDate);
		});

		$('#exitDate').on('change', function() {
			var dateTypeVar = $('#exitDate').datepicker('getDate');
			var exitd= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
			$('#exitDate').val(exitd);
		});
//////////////////////////////////////////////////////////////////////////

	/*
	 $('#entryDate').on('change', function() {
		
		var entaydate = $(this).val();
		//alert(entaydate);
		var exitDate= date('yy-mm-dd', strtotime("+3 months", strtotime(entaydate))); 
		//$("#exitDate11").attr('value','11-2-2022');
		//alert(exitDate);
	 });*/
	 ////////////////////////////////////////////////////////////////////////
	 

		//var type = $('input[type="radio"]').val();

	/*
		$('select[name="cus_id"]').on('change', function() {
           
            var emp_id = $(this).val();
			//var dataString='emp_id'+emp_id;
			var type=1;
			//alert(emp_id);
            if (emp_id) {
                $.ajax({
                    url: "{{ URL::to('Search_process') }}/" + emp_id,
                    type: "get",
					//data:dataString,
                    //dataType: "json",
                    success: function(data) {
						//alert(data);
                        $('#mytable').html(data);
						ajaxCall2();
				
                    },
                });


            } else {
				//alert(emp_id);
               console.log('AJAX load did not work');
            }
});
*/

////////////////////////////////////////////////////////////////////////////////
$('select[name="carnet"]').on('change', function() {
           
		   var emp_id = $(this).val();
		   //var dataString='emp_id'+emp_id;
		   var type=1;
		   //alert(emp_id);
		   if (emp_id) {
			   $.ajax({
				   url: "{{ URL::to('Search_process') }}/" + emp_id,
				   type: "get",
				 //  data:dataString,
				 //  dataType: "json",
				   success: function(data) {
					   alert(data);
					   $('#mytable').html(data);

					   ajaxCall2();
					  
				   },
			   });

		   } else {
			   //alert(emp_id);
			  console.log('AJAX load did not work');
		   }
	   });
////////////////////////////////////////////////////////////////////////////////
/*
$('select[name="plateNo"]').on('change', function() {
           
	$('select[name="carnet"]').empty();
		   var emp_id = $(this).val();
		   //var dataString='emp_id'+emp_id;
		   var type=1;

		   //alert(emp_id);
		   if (emp_id) {
			   $.ajax({
				   url: "{{ URL::to('Search_process') }}/" + emp_id,
				   type: "get",
				   //data:dataString,
				   //dataType: "json",
				   success: function(data) {
					   //alert(data);
					   $('#mytable').html(data);
					   ajaxCall2();
					  
				   },
			   });

		   } else {
			   //alert(emp_id);
			  console.log('AJAX load did not work');
		   }
	   });	
	   */		
///////////////////////////////////////////////////////////////////////////////

    });

</script>

@endsection