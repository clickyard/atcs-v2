@extends('layouts.master')
@section('title')
 عرض تفاصيل بيانات الدفتر - لوحة التحكم

@endsection
@section('css')



<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  عرض تفاصيل دفتر المرور الجمركي</span>
						</div>
					</div> 
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
   
@if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        {!! session('success_message') !!}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif
<div class="panel panel-default">
    <div class="panel-heading clearfix">
	<?php  $user = Auth::user(); ?>

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($customers->customer->name) ? 'اسم العميل : '.$customers->customer->name : 'العميل' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('customers.destroy', $customers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary mr-4 p-3" title="Show All Customers">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">قائمة الدفاتر</span>
                    </a>
					@if($user->hasAnyRole(['superAdmin','admin','employee','seudiAdmin']))

                    <a href="{{ route('customers.create') }}" class="btn btn-success mr-4 p-3" title="Create New Customers">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">إضافة دفتر جديد</span>
                    </a>
                    @endif
                   
					@if($user->hasAnyRole(['superAdmin','admin']))

                    <button type="submit" class="btn btn-danger mr-4 p-3" title="Delete Customers" onclick="return confirm(&quot;Click Ok to delete Customers.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">حذف الدفتر</span>
                    </button>
					@endif
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">


				<!-- row opened -->
				<div class="row">
					<div class="col-xl-10">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">عرض البيانات</h3>
							</div>
							<div class="card-body">
								<div id="accordion" class="w-100 br-2 overflow-hidden">
									
                                <div class="mb-4">
										<div class="accor bg-primary " id="headingOne1">
											<h4 class="m-0">
												<a href="#collapseOne1" class="" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
												  بيانات صاحب العربة <i class="si si-cursor-move ml-2"></i>
												</a>
											</h4>
										</div>
										<div id="collapseOne1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="border p-3">
                                            <table class="table table-bordered table-hover mg-b-0 text-md-nowrap">
                                                <tr>
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
										        <td> تم الإدخال بواسطة : {{ optional($customers->customer)->created_by }} </td>
											     <td>تم التعديل بواسطة    : {{ optional($customers->customer)->updated_by }}   </td>
											</tr>
                                        </table>

									  	<hr/>
										<a href="{{ route('customers.edit', $customers->car->customer_id ) }}" class="btn btn-success mr-4 p-3" title="Edit Customers">
												<span class="glyphicon glyphicon-pencil" aria-hidden="true">تعديل بيانات صاحب العربة</span>
											</a>
                                            
                                            </div>
										</div>
									</div>



									<div class="mb-4">
										<div class="accor  bg-primary" id="headingTwo2">
											<h4 class="m-0">
												<a href="#collapseTwo2" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
													بيانات العربة<i class="si si-cursor-move ml-2"></i>
												</a>
											</h4>
										</div>
										<div id="collapseTwo2" class="collapse b-b0 bg-white" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="border p-3">
												<div class="row">
													

                                        <table class="table table-bordered table-hover mg-b-0 text-md-nowrap">
      
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
											    <th scope="row" rowspan=5>دفتر المرور الجمركي(التربيك)</th>
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
										        <td> تم الإدخال بواسطة : {{ optional($customers)->created_by }} </td>
											     <td>تم التعديل بواسطة    : {{ optional($customers)->updated_by }}   </td>
											</tr>
                                     </table>	
									 
									  	
												</div>
												<hr> </hr>
											<div>
												<a href="{{ route('cars.edit', $customers->car->id ) }}" class="btn btn-success mr-4 p-3" title="Edit Customers">
														<span class="glyphicon glyphicon-pencil" aria-hidden="true">تعديل بيانات  العربة</span>
													</a> 

													<a href="{{ route('emportcars.edit', $customers->id ) }}" class="btn btn-warning mr-4 p-3" title="Edit Customers">
														<span class="glyphicon glyphicon-pencil" aria-hidden="true">تعديل بيانات  الدفتر</span>
													</a>	
												</div>
											</div>
										</div>
									</div>


									<div class="mb-4">
										<div class="accor  bg-primary" id="headingThree3">
											<h4 class="m-0">
												<a href="#collapseThree1" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
													بيانات الكفيل الضامن المتضامن <i class="si si-cursor-move ml-2"></i>
												</a>
											</h4>
										</div>
										<div id="collapseThree1" class="collapse b-b0 bg-white" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="border p-3">
                                            <table class="table table-bordered table-hover mg-b-0 text-md-nowrap">
                                           <tr>
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
										        <td> تم الإدخال بواسطة : {{ optional($customers->customer->guarantor)->created_by }} </td>
											     <td>تم التعديل بواسطة    : {{ optional($customers->customer->guarantor)->updated_by }}   </td>
											</tr>
                                            </table>
											<hr/>
										<a href="{{ route('guarantors.edit',$customers->car->customer_id)  }}" class="btn btn-success mr-4 p-3" title="Edit Customers">
												<span class="glyphicon glyphicon-pencil" aria-hidden="true">تعديل بيانات  الكفيل</span>
											</a>
											</div>
										</div>
									</div>

	                            <div class="mb-4">
										<div class="accor  bg-primary" id="headingFour4">
											<h4 class="m-0">
												<a href="#collapsefour1" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
													بيانات اقرب الاقربين <i class="si si-cursor-move ml-2"></i>
												</a>
											</h4>
										</div>
										<div id="collapsefour1" class="collapse b-b0 bg-white" aria-labelledby="headingFour" data-parent="#accordion">
											<div class="border p-3">
                                            <table class="table table-bordered table-hover mg-b-0 text-md-nowrap">
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
											    <th scope="row" rowspan=5>   عنوان اقرب الاقربين2</th>
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
											<tr>
										        <td> تم الإدخال بواسطة : {{ optional($customers->customer->custrefrance[1])->created_by }} </td>
											     <td>تم التعديل بواسطة    : {{ optional($customers->customer->custrefrance[1])->updated_by }}   </td>
											</tr>
											
										
									</table>
									<hr/>
										<a href="{{ route('customers.edit', $customers->car->customer_id ) }}" class="btn btn-success mr-4 p-3" title="Edit Customers">
												<span class="glyphicon glyphicon-pencil" aria-hidden="true">تعديل بيانات اقرب  الاقربين</span>
											</a>
											</div>
										</div>
									</div>



                                    <div class="mb-4">
										<div class="accor  bg-primary" id="headingFive5">
											<h4 class="m-0">
												<a href="#collapsefive1" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
													المرفقات <i class="si si-cursor-move ml-2"></i>
												</a>
											</h4>
										</div>
										<div id="collapsefive1" class="collapse b-b0 bg-white" aria-labelledby="headingFive" data-parent="#accordion">
											<div class="border p-3">
												<p>لا توجد مرفقات</p>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>
					</div>
              </div>


              <div class="row">        
                    <div class="col-xl-10">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">الخطابات</h3>
							</div>
                           <div class="card-body">
                           @if(count($customers->myincreases) != 0)
                                    <button class="col-xl-6 mb-4 btn btn-success" id="print_Button" onclick="printDiv()"> 
                                    <i class="mdi mdi-printer ml-1"></i>  طباعة خطاب تمديد اول </button>

                                    <div  id="print"  style="display:none;">
                                    <img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

                                    <div class="card-header pb-0">
                                        <div  class="d-flex justify-content-between">
                                        <h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($customers->myincreases[0]->created_at)) }}</h4>
                                            <h4 class="left">{{ $customers->myincreases[0]->serialNo }}</h4>

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
                                            <tr> <td>أسم صاحب العربة : </td>  <td >{{  $customers->customer->name }}</td> </tr>
                                            <tr> <td>رقم الجواز : </td> <td >{{ $customers->customer->passport }}</td> </tr>
                                            <tr> <td>العنوان بالسودان : </td> <td >{{ $customers->customer->State->name }}- {{$customers->customer->city}}</td> </tr>
                                            <td>تاريخ دخول المركبة : </td> <td >{{ $customers->entryDate }}</td> </tr>
                                            <tr> <td>ماركة المركبة : </td>  <td >{{ $customers->car->CarMark->name }}</td> </tr>
                                            <tr> <td> موديل المركبة:</td>  <td >{{ $customers->car->year }}</td> </tr>
                                            <tr> <td> رقم الهيكل : </td> <td > {{ $customers->car->chassisNo }}</td> </tr>
                                            <tr> <td> رقم اللوحة:  </td> <td >{{ $customers->car->plateNo }}</td></tr>
                                            <tr> <td> رقم الدفتر: </td> <td > {{ $customers->carnetNo }} </td>	</tr>
                                            
                                        </table>
                                        <h5>
                                            التوصية :- لا مانع لدينا من التجديد لفترة ثلاثة شهور أخرى وفق النظام المعمول به.
                                        </h5>
                                        <h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
                                        
                                        <div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
                                        
                                            <h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
                                        
                                            <h5 class="left"> التوقيع : {{  $customers->myincreases[0]->signature }}</h5>
                                                
                                        </div>
                                        
                                        
                                            
                                            
                                            <p> 	 ايصال استلام رسوم  رقم:  ( {{ $customers->myincreases[0]->voucher }} )</p>
                                        
                                    </div>

                                    </div>
                            @endif  
  <!--------------------------------------------------------------------------------------------------------------->
                            @if(count($customers->myincreases) == 2)
                                    <button class="col-xl-6 mb-4 btn btn-info" id="print_Button2" onclick="printDiv2()"> 
                                    <i class="mdi mdi-printer ml-1"></i>  طباعة خطاب تمديد المغادرة </button>

                                    <div  id="print2"  style="display:none;">
                                    <img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0">
													<div  class="d-flex justify-content-between">
													<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($customers->myincreases[1]->created_at)) }}</h4>
														<h4 class="left">{{ $customers->myincreases[1]->serialNo }}</h4>

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
														<tr> <td>أسم صاحب العربة : </td>  <td >{{  $customers->customer->name }}</td> </tr>
														<tr> <td>رقم الجواز : </td> <td >{{ $customers->customer->passport }}</td> </tr>
														<tr> <td>العنوان بالسودان : </td> <td >{{ $customers->customer->State->name }}- {{$customers->customer->city}}</td> </tr>
														<td>تاريخ دخول المركبة : </td> <td >{{ $customers->entryDate }}</td> </tr>
														<tr> <td>ماركة المركبة : </td>  <td >{{ $customers->car->CarMark->name }}</td> </tr>
														<tr> <td> موديل المركبة:</td>  <td >{{ $customers->car->year }}</td> </tr>
														<tr> <td> رقم الهيكل : </td> <td > {{ $customers->car->chassisNo }}</td> </tr>
														<tr> <td> رقم اللوحة:  </td> <td >{{ $customers->car->plateNo }}</td></tr>
														<tr> <td> رقم الدفتر: </td> <td > {{ $customers->carnetNo }} </td>	</tr>
														
													</table>
													<h5>
														التوصية :- لا مانع لدينا من التجديد لفترة  شهر  واحد حتى تسطيع المركبة مغادرة البلاد وفق النظام المعمول به.
													</h5>
													<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
													
													<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
													
														<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
													
														<h5 class="left"> التوقيع : {{  $customers->myincreases[1]->signature }}</h5>
															
													</div>
													
													
														
														
														<p> 	 ايصال استلام رسوم  رقم:  ( {{ $customers->myincreases[1]->voucher }} )</p>
													
												</div>
                                    </div>

                            @endif

  <!--------------------------------------------------------------------------------------------------------------->

                            @if($customers->myleavingcars != null)
                                    <button class="col-xl-6 mb-4 btn btn-warning" id="print_Button3" onclick="printDiv3()"> 
                                    <i class="mdi mdi-printer ml-1"></i>  طباعة خطاب المغادرة  </button>
                                    <div  id="print3"  style="display:none;">
                                    <img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0">
													<div  class="d-flex justify-content-between">
													<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($customers->myleavingcars->created_at)) }}</h4>
														<h4 class="left">{{ $customers->myleavingcars->serialNo }}</h4>

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
														<tr> <td>أسم صاحب العربة : </td>  <td >{{  $customers->customer->name }}</td> </tr>
														<tr> <td>رقم الجواز : </td> <td >{{ $customers->customer->passport }}</td> </tr>
														<tr> <td>العنوان بالسودان : </td> <td >{{ $customers->customer->State->name }}- {{$customers->customer->city}}</td> </tr>
														<td>تاريخ دخول المركبة : </td> <td >{{ $customers->entryDate }}</td> </tr>
														<tr> <td>ماركة المركبة : </td>  <td >{{ $customers->car->CarMark->name }}</td> </tr>
														<tr> <td> موديل المركبة:</td>  <td >{{ $customers->car->year }}</td> </tr>
														<tr> <td> رقم الهيكل : </td> <td > {{ $customers->car->chassisNo }}</td> </tr>
														<tr> <td> رقم اللوحة:  </td> <td >{{ $customers->car->plateNo }}</td></tr>
														<tr> <td> رقم الدفتر: </td> <td > {{ $customers->carnetNo }} </td>	</tr>
														
													</table>
													<h5>
													نوصي بالمغادرة فورا من البلاد													</h5>
													<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
													
													<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
													
														<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
													
														<h5 class="left"> التوقيع : {{  $customers->myleavingcars->signature }}</h5>
															
													</div>
													
													
														
														
														<p> 	 ايصال استلام رسوم  رقم:  ( {{ $customers->myleavingcars->voucher }} )</p>
													
												</div>
                                    </div>
                                   
                           @endif
 
   <!--------------------------------------------------------------------------------------------------------------->
                          

                           @if($customers->mytakhlees!=null)
                                    <button class="col-xl-6 mb-4 btn btn-primary" id="print_Button4" onclick="printDiv4()"> 
                                    <i class="mdi mdi-printer ml-1"></i>  طباعة خطاب  التخليص </button>

                                    <div  id="print4"  style="display:none;">
                                    <img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

												<div class="card-header pb-0 ">
													<div  class="d-flex justify-content-between mg-t-20">
														<h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($customers->mytakhlees->created_at)) }}</h4>
														<h4 class="left">{{ $customers->mytakhlees->serialNo }}</h4>

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
														<tr> <td>أسم صاحب العربة : </td>  <td >{{  $customers->customer->name }}</td> </tr>
														<tr> <td>رقم الجواز : </td> <td >{{ $customers->customer->passport }}</td> </tr>
														<tr> <td>قادم من  : </td> <td >{{ $customers->destination }}</td> </tr>
														<tr> <td>تاريخ دخول المركبة : </td> <td >{{ $customers->entryDate }}</td> </tr>
														<tr> <td>ماركة المركبة : </td>  <td >{{ $customers->car->CarMark->name }}</td> </tr>
														<tr> <td> موديل المركبة:</td>  <td >{{ $customers->car->year }}</td> </tr>
														<tr> <td> رقم الهيكل : </td> <td > {{ $customers->car->chassisNo }}</td> </tr>
														<tr> <td> رقم اللوحة:  </td> <td >{{ $customers->car->plateNo }}</td></tr>
														<tr> <td> رقم الدفتر: </td> <td > {{ $customers->carnetNo }} </td>	</tr>
														<tr> <td>العنوان خارج البلاد : </td> 
														<td >	{{ $customers->customer->guarantor->State->name }}- 
																{{ $customers->customer->guarantor->city }}
														</td> </tr>
														<tr> <td>العنوان داخل البلاد : </td> <td >{{ $customers->customer->State->name }}- {{$customers->customer->city}}</td> </tr>
													</table>
													<h5>
													التوصية :-لا مانع لدينا وفق االنظام المعمول به
													</h5>
													<h5>ملحوظة : اي كشط او تعديل يلغي هذا الأورنيك </h5>
													
													<div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
													
														<h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
													
														<h5 class="left"> التوقيع : {{  $customers->mytakhlees->signature }}</h5>
															
													</div>

														
														
														<p> 	 ايصال استلام رسوم الموانئ رقم:  ( {{ $customers->mytakhlees->voucher }} )</p>
													
												</div>
                                    </div>  

                            @endif
   <!--------------------------------------------------------------------------------------------------------------->
                           
                            @if($customers->myalerts!=null)
                                    <button class="col-xl-6 mb-4 btn btn-danger" id="print_Button5" onclick="printDiv5()"> 
                                    <i class="mdi mdi-printer ml-1"></i>  طباعة خطاب المخالفة</button>
                        
                                   
                                    <div  id="print5"  style="display:none;">
                                    
												<img src="{{URL::asset('assets/img/atcsheader.jpg')}}"  width="100%"/> 

                                                <div class="card-header pb-0 ">
                                                    <div  class="d-flex justify-content-between mg-t-20">
                                                        <h4 class="right">التاريخ: {{ date('Y-m-d',strtotime($customers->myalerts->created_at)) }}</h4>
                                                        <h4 class="left">{{ $customers->myalerts->serialNo }}</h4>

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
                                                        <tr> <td>أسم صاحب العربة : </td>  <td >{{  $customers->customer->name }}</td> </tr>
                                                        <tr> <td>رقم الجواز : </td> <td >{{ $customers->customer->passport }}</td> </tr>
                                                        <tr> <td>قادم من  : </td> <td >{{ $customers->destination }}</td> </tr>
                                                        <tr> <td>تاريخ دخول المركبة : </td> <td >{{ $customers->entryDate }}</td> </tr>
                                                        <tr> <td>ماركة المركبة : </td>  <td >{{ $customers->car->CarMark->name }}</td> </tr>
                                                        <tr> <td> موديل المركبة:</td>  <td >{{ $customers->car->year }}</td> </tr>
                                                        <tr> <td> رقم الهيكل : </td> <td > {{ $customers->car->chassisNo }}</td> </tr>
                                                        <tr> <td> رقم اللوحة:  </td> <td >{{ $customers->car->plateNo }}</td></tr>
                                                        <tr> <td> رقم الدفتر: </td> <td > {{ $customers->carnetNo }} </td>	</tr>
                                                        <tr> <td>العنوان خارج البلاد : </td> 
                                                        <td >	{{ $customers->customer->guarantor->State->name }}- 
                                                                {{ $customers->customer->guarantor->city }}
                                                        </td> </tr>
                                                        <tr> <td>العنوان داخل البلاد : </td> <td >{{ $customers->customer->State->name }}- {{$customers->customer->city}}</td> </tr>
                                                    </table>
                                                    <h5>
                                                        عنوان البلاغ : {{  $customers->myalerts->title }}
                                                        </h5>
                                                        <p>الموضوع: <br/>
                                                            {{  $customers->myalerts->desc }} </p>
                                                        
                                                        <h5>ملحوظة : اي كشط او تعديل يلغي هذا البلاغ </h5>
                                                    
                                                    <div  class="d-flex justify-content-between  mg-b-50 mg-t-50">	
                                                    
                                                        <h5 class="right">	ختم الشركة :  <img src="{{URL::asset('assets/img/sigin.png') }} "  width="120" /></h5> </td>
                                                    
                                                        <h5 class="left"> التوقيع : {{  $customers->myalerts->signature }}</h5>
                                                            
                                                    </div>

                                                        
                                                        
                                                        <p> 	 ايصال استلام   رقم:  ( {{ $customers->myalerts->voucher }} )</p>
                                                    
                                                </div>
                                    </div>
                                    @endif 
                            
     <!--------------------------------------------------------------------------------------------------------------->
                                 
                                    
                                    
                                   
							</div>
						</div>
					</div>
			


				</div>
				<!-- row closed -->


















    </div>
</div>


		<!-- row closed -->
        </div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>


<script type="text/javascript">
     

		function printDiv() {
            $("#print").show();

            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        } 
		
		function printDiv2() {
            $("#print2").show();

            var printContents = document.getElementById('print2').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
           location.reload();
        } 
		
		function printDiv3() {
            $("#print3").show();

            var printContents = document.getElementById('print3').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        } 
		
		function printDiv4() {
            $("#print4").show();

            var printContents = document.getElementById('print4').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

		function printDiv5() {
            $("#print5").show();
            var printContents = document.getElementById('print5').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
        </script>
@endsection
