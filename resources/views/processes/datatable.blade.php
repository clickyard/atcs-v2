

<table class="table table-bordered table-hover mg-b-20 text-md-nowrap">
			<thead>
				
			</thead>
			<tbody>
				<tr>
					<td>الاسم : {{ optional($customers)->customer->name }}</td>
					<td>تاريخ الدخول : {{ $customers->entryDate }}</td>
					<td>نوع العربة :   {{ optional($customers->car->vehicle)->name }}</td>

					<td> الحالة: {{ optional($customers)->status_value }}</td>	
											

				</tr>
				<tr>
					<td>رقم الدفتر :   {{ optional($customers)->carnetNo }} </td>
					<td> تاريخ الخروج : {{ optional($customers)->exitDate }}</td>	
					<td> رقم اللوحة : {{ optional($customers->car)->plateNo }}</td>		
					<td>رقم الشاسي: {{ optional($customers->car)->chassisNo }}</td>


				</tr>
														
				</tbody>
</table>
<!--///////////////////////////////////////////////////////////////////////////////////////////////-->
<label for="inputName" class="control-label"> اختر نوع الاجراء</label>
    <div class="row  mg-b-30">
					@if(optional($customers)->status==0)
					  <div class="col-lg-2 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input  name="type" value="1" type="radio" > <span> إذن دخول</span></label>
						</div>
					@endif

					<?php 
					$Date=date('Y-m-d'); 
					$newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));
					?>
					@if(optional($customers)->takhlees==1) <p> لا يوجد إجراءت هذه السيارة تم تخليصها</p> @endif
					@if(optional($customers)->status==2) <p> لا يوجد إجراءت هذه السيارة تمت مغادرتها </p> @endif
					
					@if($customers->allow_increase == 1 && $customers->status != 0 )	
						
						<div class="col-lg-2">
							<label class="rdiobox"><input name="type" value="2"  type="radio"  > <span>  تمديد</span></label>
						</div>
					@endif	
					@if(optional($customers)->takhlees==0 && $customers->status!=0 && $customers->status != 2)
						<div class="col-lg-2 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input name="type" value="3" type="radio"  > <span> تخليص  </span></label>
						</div>
					@endif
					@if(optional($customers)->takhlees==0 && optional($customers)->status != 2 && optional($customers)->status != 0)	
						<div class="col-lg-2 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input  name="type" value="4"  type="radio"   > <span>مغادرة</span></label>
						</div>
					
						<!--<div class="col-lg-2 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input  name="type" value="5" type="radio"   > <span> ترحيل</span></label>
						</div>-->
						@if($customers->alerts==0 && optional($customers)->status != 0 && $customers->takhlees==0  && $customers->status != 2)
						<div class="col-lg-2 mg-t-20 mg-lg-t-0">
							<label class="rdiobox"><input  name="type" value="6" type="radio"  > <span> بلاغ عن مخالفة</span></label>
						</div>
						@endif	
					@endif	
</div>	
								
<hr/>
<!--////////////////////////////////////////////////////////////////////////////////////////-->

<div  id="form1"  style="display:none;">
	    <form method="POST" action="{{ route('intarnal_files.store') }}"  enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off" class="form-horizontal">
          	{{ csrf_field() }}
			  @method('post')
			إذن دخول بيانات افراج جمركي
			<div class="row mg-t-20 ">
			              <input type="hidden" name="emp_id"  value="{{$customers->id}}" />
					    <div class="row">

							<div class="col-md-6">
									<div class="form-group {{ $errors->has('serialNo') ? 'has-error' : '' }}">
										<label for="serialNo" class="control-label">{{ trans('intarnal_files.serialNo') }}</label>
										<div class="">
											<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="10" required  placeholder="{{ trans('intarnal_files.serialNo__placeholder') }}">
											{!! $errors->first('serialNo', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>

							<div class="col-md-6">

									<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
										<label for="date" class=" control-label">{{ trans('intarnal_files.date') }}</label>
										
											<input class="form-control" name="entryDate" type="date" id="date" value="" required="true" placeholder="{{ trans('intarnal_files.date__placeholder') }}">
											{!! $errors->first('date', '<p class="help-block">:message</p>') !!}
										
									</div>
						     </div>
						</div>

						<div class="row">

							    <div class="col-md-6">

									<label for="portAccess_id" class="control-label">{{ trans('emportcars.portAccess_id') }}</label>
									<div class="col">
										<select class="form-control" id="portAccess_id" name="portAccess_id" required="true">
												<option value="" >{{ trans('emportcars.portAccess_id__placeholder') }}</option>
											@foreach ($Shippingports as $key =>  $Shippingport)
												<option value="{{ $Shippingport->id }}" >
													{{ $Shippingport->name  }}
												</option>
											@endforeach
										</select>
										
										{!! $errors->first('portAccess_id', '<p class="help-block">:message</p>') !!}
									</div>
						       </div>
				
							    <div class="col-md-6">

									<label for="ship_id" class="control-label">{{ trans('emportcars.ship_id') }}</label>
									<div class="">
										<select class="form-control" id="ship_id" name="ship_id" required="true">
												<option value="" >{{ trans('emportcars.ship_id__placeholder') }}</option>
											@foreach ($Ships as $key => $Ship)
												<option value="{{ $Ship->id }}"  >
													{{ $Ship->name  }}
												</option>
											@endforeach
										</select>
										
										{!! $errors->first('ship_id', '<p class="help-block">:message</p>') !!}
									</div>
							    </div>
						</div>	
						   <div>
								<div class="col-md-6">

										<label for="shippingAgent" class="control-label">{{ trans('emportcars.shippingAgent') }}</label>
										<div class="">
											<input class="form-control" name="shippingAgent" type="text" id="shippingAgent" value="" min="1" max="100"  placeholder="{{ trans('emportcars.shippingAgent__placeholder') }}">
											{!! $errors->first('shippingAgent', '<p class="help-block">:message</p>') !!}
										</div>
								 </div>
								 <div class="col-md-6">

										 <label for="deliveryPerNo" class=" control-label">{{ trans('emportcars.deliveryPerNo') }}</label>
										<div class="">
											<input class="form-control" name="deliveryPerNo" type="text" id="deliveryPerNo" value="" minlength="1"  placeholder="{{ trans('emportcars.deliveryPerNo__placeholder') }}">
											{!! $errors->first('deliveryPerNo', '<p class="help-block">:message</p>') !!}
										</div>
								 </div>
						</div>
					

							<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="card">
											<div class="mg-b-50">
													<h6 class="card-title mb-1">المرفقات: إذن دخول</h6>
													<p class="text-muted card-sub-title">
														من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
																</p>
											</div>
												<div class="row mb-4">
												
													<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
														<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
													</div>
												
												</div>
										
											<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
								      </div>
								
							        </div>
					      	 </div>
			        
             </div>
        </form>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////-->
<div  id="form2"  style="display:none;">
	<form method="POST" action="{{ route('update_increase') }}"  accept-charset="UTF-8"  class="form-horizontal">
          	{{ csrf_field() }}
 التمديد لفترة اخرى
    <div class="row mg-t-20 ">
	<?php  
			$exDate= $customers->exitDate;

			$dura=  $customers->duration + 3;
			if($dura == 6){
				$status=1;
				$status_value="تمديد اول";
				$end_date = date('Y-m-d', strtotime("+3 months", strtotime($exDate))); 

			}else{
				$status=2;
				$status_value=" تمديد مغادرة";
				$end_date = date('Y-m-d', strtotime("+1 months", strtotime($exDate))); 

			}
?>
      
	            <input type="hidden" name="emp_id"  value="{{$customers->id}}" />
				<input type="hidden" name="cus_id"  value="{{$customers->id}}" />

				<input type="hidden" name="status"  value="{{$status}}">  
				<input type="hidden" name="entryDate"  value="{{$customers->entryDate}}"> 
			    
				<div class="col-lg-3">
								<label for="" class=" control-label"> رقم الايصال</label>
								<div class="">
									<input class="form-control" name="voucher" type="text" value=""  >
					            </div>
					</div>
				<div class="col-lg-3">
								<label for="start_date" class=" control-label">  نوع التمديد  </label>
								<div class="">
									<input class="form-control" name="status_value" type="text" value="{{$status_value}}"  readonly>
							</div>
					</div>
			      <!--  <div class="col-lg-3">
								<label for="start_date" class=" control-label">تاريخ الدخول - الخروج</label>
								<div class="">
									<input class="form-control" name="entryDate" type="text" value="{{$customers->entryDate}} -- {{$customers->exitDate}}"  readonly>
							</div>
					</div>-->
					 
					<div class="col-lg-3">
						         
								<label for="start_date" class=" control-label">  التمديد لتاريخ </label>
								<div class="">
									<input class="form-control" name="end_date" type="text" value="{{$end_date}}"  readonly>
							   </div>
					</div>
					<div class="col-lg-3 "> 
						<button class="btn ripple btn-primary mg-t-30" type="submit" type="button">تمديد</button>
					 </div>
            </div>
        </form>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- التخليص -->
	
<div  id="form3"  style="display:none;">
    <form method="POST" action="{{ route('update_takhlees') }}"   >
          				  {{ csrf_field() }}
							تخليص عربة

		<input type="hidden" name="emp_id"  value="{{$customers->id}}" />
	
		<div class="col-lg-4">
				<label for="" class=" control-label">     إيصال استلام رسوم المواني </label>
				<div class=""><input class="form-control" name="voucher" value=""  ></div>
		</div>
		
		<div class="col-lg-4 mg-t-20"> 
			<button class="btn ripple btn-primary" type="submit" type="button">تخليص</button>
		</div>
	</form>
</div>
<!-- //////////////////////////////////////  مغادرة //////////////////////////////////////////////////////// -->
<div  id="form4"  style="display:none;">
	
		<form method="POST" action="{{ route('leavingCars_update') }}"  autocomplete="off">
          				  {{ csrf_field() }}

						  مغادرة عربة
							<input type="hidden" name="emp_id"  value="{{$customers->id}}" />
							<input type="hidden" name="cus_id"  value="{{$customers->id}}" />
							<input type="hidden" name="entryDate"  value="{{$customers->entryDate}}"> 

				
				<div class="col-lg-3">
					<label for="" class=" control-label"> رقم الايصال</label>
					<div class="">
						<input class="form-control" name="voucher" type="text" value=""  >
					</div>
				</div>
		
				<div class="col-lg-3">
						<label for="exitDate" class=" control-label">تاريخ المغادرة</label>
						<div class="">
							<input class="form-control fc-datepicker" name="exitDate" type="text" id="exitDate" value=""   placeholder="" />
						</div>
			    </div>
			<div class="col-lg-3 mt-50 " > 
				<br/>
			      <button class="btn ripple btn-primary" type="submit" type="button">مغادرة</button>
		</div>
	</form>


</div>
<!-- ////////////////////////////////////////// ترحيل ////////////////////////////////////////////////////// -->
<div  id="form5"  style="display:none;">
	


			<form method="POST" action="{{ route('traheel') }}"  >
								{{ csrf_field() }}
								إعادة او ترحيل السيارة 
								<input type="hidden" name="emp_id"  value="{{$customers->id}}" />
								<input type="hidden" name="cus_id"  value="{{$customers->id}}" />
					<div class="col-md-4">
						<label for="exitDate" class=" control-label">تاريخ  الترحيل</label>

							<input class="form-control" name="exitDate" type="date" id="exitDate" value="" minlength="1" maxlength="10" required="true" placeholder="">
					</div>
					<div class="col-lg-4 mg-t-20"> 
					<button class="btn ripple btn-primary" type="submit" type="button">ترحيل</button>
				</div>
			</form>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////-->
<div  id="form6"  style="display:none;">

			<form method="POST" action="{{ route('update_alerts') }}"  >
								{{ csrf_field() }}
								بلاغ عن سيارة مخالفة 
								<input type="hidden" name="emp_id"  value="{{$customers->id}}" />
								<input type="hidden" name="cus_id"  value="{{$customers->id}}" />
					
								<div class="col-md-6">
											<label for="title" class=" control-label">موضوع البلاغ    </label>
											<input class="form-control" name="title" type="text" id="" value="" minlength="1" maxlength="100" required="true" placeholder="">
								</div>	

								<div class="col-md-6">
													<label for="desc" class=" control-label">وصف مختصر للبلاغ </label>
														<textarea class="form-control" name="desc"  rows="5" id="desc"    placeholder="">

														</textarea>
								</div>

					<div class="col-lg-4 mg-t-20"> 
					<button class="btn ripple btn-primary" type="submit" type="button">بلاغ</button>
				</div>
			</form>

</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php 
							/*				
											
											$exDate= $customers->exitDate;
											$end_date = date('Y-m-d', strtotime("+3 months", strtotime($exDate)));
											$allow=true;
											//$status=0;
											$status_value="";
											$dura=  $customerss->duration + 3;
											if($dura == 3 ){
											//	$status=1;
												$status_value=" اولى";
												$allow=true;
											}else if($dura == 6 ){
												//$status=2;
												$status_value=" ثانية";
												$allow=true;
											}else if($dura == 9 ){
												//$status=3;
												$status_value=" ثالثة";
												$allow=false;
											}
											
							
	<div  id="form2" >
	                      
		<form method="POST" action="{{ route('intarnal_files.store') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				          {{ csrf_field() }}
		    <div class="row">
					       <!-- <input type="hidden" name="emp_id"  value="{{$customers->id}}" />
							<input type="hidden" name="dura" value="{{$dura}}" />
							<input type="hidden" name="allow"  value="{{$allow}}" />
							--->
                            <div class="col-md-4 form-group">
										<label for="status_value" class="control-label">التمديد لفنرة :</label>
										<div class="">
											<input class="form-control" name="value" type="text" id="status_value" value="" readonly >
										</div>
						     </div>
					<div class="col-lg-3">
								<label for="start_date" class=" control-label"> التمديد من تاريخ:</label>
								<div class="">
									<input class="form-control" name="start_date" type="date" value="{{ optional($customers)->entryDate}}"  readonly>
							</div>
					</div>	
					<div class="col-lg-3 ">
					           <label for="end_date" class=" control-label">  الى تاريخ:</label>
								<div class="">
									<input class="form-control" name="end_date" type="date" value=""  readonly>
								</div>
					</div>
				    <div class="col-lg-3 "> <button class="btn ripple btn-primary" type="submit" type="button">تأكيد</button> </div>
            </div>	
		</form>
		</div>
	*/?>