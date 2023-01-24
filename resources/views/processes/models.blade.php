
	<!-- إدخال بيانات اذن دخول افراج جمركي   -->
		<!-- Grid modal -->
		<form method="POST" action="{{ route('intarnal_files.store') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
		<div class="modal" id="modaldemo1">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title" >إدخال بيانات اذن دخول افراج جمركي  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
			     

						  
					<div class="modal-body body1">
						<div class="row mg-b-50">
							<div class="col-md-5">

									<p>أسم صاحب العربة :  <span id="name"></span>	</p>
							</div>
							<div class="col-md-3">
									<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
							</div>
							<div class="col-md-4">
							<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
							</div>

							<input type="hidden" name="emp_id" id="emp_id" value="" />
						</div>
						<div class="row">
							<div class="col-md-6">
									<div class="form-group {{ $errors->has('serialNo') ? 'has-error' : '' }}">
										<label for="serialNo" class="control-label">{{ trans('intarnal_files.serialNo') }}</label>
										<div class="">
											<input class="form-control" name="serialNo" type="text" id="serialNo" value="<?php /*{{ old('serialNo', optional($intarnalFiles)->serialNo) }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.serialNo__placeholder') }}">
											{!! $errors->first('serialNo', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
							<div class="col-md-6">

									<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
										<label for="date" class=" control-label">{{ trans('intarnal_files.date') }}</label>
										<div class="">
											<input class="form-control" name="date" type="date" id="date" value="<?php /*{{ /*old('date', optional($intarnalFiles)->date)  }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.date__placeholder') }}">
											{!! $errors->first('date', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
						</div>

						<div class="row">
							<div class="col-md-6">
									<div class="form-group {{ $errors->has('expiryDuration') ? 'has-error' : '' }}">
										<label for="expiryDuration" class="control-label">{{ trans('intarnal_files.expiryDuration') }}</label>
										<div class="">
											<input class="form-control" name="expiryDuration" type="text" id="expiryDuration" value="<?php /*{{ old('expiryDuration', optional($intarnalFiles)->expiryDuration) }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.expiryDuration__placeholder') }}">
											{!! $errors->first('expiryDuration', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
							<div class="col-md-6">

									<div class="form-group {{ $errors->has('exitDate') ? 'has-error' : '' }}">
										<label for="exitDate" class=" control-label">{{ trans('intarnal_files.exitDate') }}</label>
										<div class="">
											<input class="form-control" name="exitDate" type="date" id="date" value="<?php /*{{ /*old('exitDate', optional($intarnalFiles)->exitDate)  }}*/?>" minlength="1" maxlength="10" required="true" placeholder="{{ trans('intarnal_files.exitDate__placeholder') }}">
											{!! $errors->first('exitDate', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
						     </div>
						</div>
					

							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="card">
										<div class="card-body">
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
							            </div>
						            </div>
					            </div>				
			    	        </div>




					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		<!--End Grid modal -->
<!---//////////////////////////////////////////////////////////////////////////////////////////////////---->		
		<!-- التمديد -->
		<!-- Grid modal7 -->
		<form method="POST" action="{{ route('update_increase') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
		     <div class="modal" id="modaldemo2">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">التمديد لفترة اخرى </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
			     

						  
					<div class="modal-body body2">
						<div class="row mg-b-50">
							<div class="col-md-12">

									<p>أسم صاحب العربة :  <span id="name"></span>	</p>
							</div>
							<div class="col-md-6">
									<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
							</div>
							<div class="col-md-6">
							<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
							</div>

							<input type="hidden" name="emp_id" id="emp_id" value="" />
							<input type="hidden" name="status" id="status" value="" />
							<input type="hidden" name="dura" id="dura" value="" />
							<input type="hidden" name="allow" id="allow" value="" />


						</div>
						<div class="row">
							<div class="col-md-4 form-group">
										<label for="status_value" class="control-label">التمديد لفنرة :</label>
										<div class="">
											<input class="form-control" name="status_value" type="text" id="status_value" value="" readonly >
										</div>
						     </div>
							<div class="col-md-4">

										<label for="start_date" class=" control-label"> التمديد من تاريخ:</label>
										<div class="">
											<input class="form-control" name="start_date" type="date" id="start_date" value=""  readonly>
										</div>
								
						     </div>
							 <div class="col-md-4">
							          <label for="end_date" class=" control-label">  الى تاريخ:</label>
										<div class="">
											<input class="form-control" name="end_date" type="date" id="end_date" value=""  readonly>
										</div>
						     </div>
							 <div class="col-md-6">
										<label for="serialNo" class="control-label">الرقم المتسلسل</label>
										<div class="">
											<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="10" required="true" placeholder="">
										</div>
						     </div>
						</div>

					
							<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="card">
											<div class="card-body">
											<div class="mg-b-50">
													<h6 class="card-title mb-1">المرفقات:  خطاب التمديد</h6>
													<p class="text-muted card-sub-title">
								من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
										</p>
												</div>
								<div class="row mb-4">
								
									<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
										<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
									</div>
								
								</div>
								
							</div>
						</div>
					</div>
				
			    	</div>
					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		<!--End Grid modal7 -->
	
<!--//////////////////////////////////////////////////////////////////////////////-->
<!-- مغادرة -->
				
		<!-- Grid modal6 -->
		<form method="POST" action="{{ route('leavingCars_update') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
			<div class="modal" id="modaldemo3">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">مغادرة السيارة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body body3">
							<div class="row mg-b-50">
								<div class="col-md-12">

										<p>أسم صاحب العربة :  <span id="name"></span>	</p>
								</div>
								<div class="col-md-6">
										<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
								</div>
								<div class="col-md-6">
								<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
								</div>

								<input type="hidden" name="emp_id" id="emp_id" value="" />
							</div>
							<div class="row">
								<div class="col-md-6">
											<label for="serialNo" class="control-label">الرقم المتسلسل</label>
											<div class="">
												<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="10" required="true" placeholder="">
											</div>
								</div>
								<div class="col-md-6">
											<label for="exitDate" class=" control-label">تاريخ المغادرة</label>
											<div class="">
												<input class="form-control" name="exitDate" type="date" id="exitDate" value="" minlength="1" maxlength="10" required="true" placeholder="">
											</div>
								</div>
							</div>

								<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="card">
												<div class="card-body">
												<div class="mg-b-50">
														<h6 class="card-title mb-1">المرفقات:  </h6>
														<p class="text-muted card-sub-title">
									من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
											</p>
													</div>
									<div class="row mb-4">
									<h6 class="card-title mb-1"> إذن شحن</h6>
										<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
											<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
										</div>
									
									</div>
									
									<div class="row mb-4">
									<h6 class="card-title mb-1"> بويصلة التأمين </h6>
										<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
											<input type="file"  name="file_name2" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
										</div>
									
									</div>
								</div>
							</div>
						</div>
					
						</div>
					</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
						</div>
					</div>
				</div>
			</div>
	</form>
		<!--End Grid modal 6 -->


<!-- //////////////////////////////////////////////////////////////////////////////////-->

		<!-- التخليص -->

						<!-- Grid modal6 -->
	<form method="POST" action="{{ route('update_takhlees') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
			<div class="modal" id="modaldemo4">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">تخليص السيارة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body body4">
							<div class="row mg-b-50">
								<div class="col-md-12">

										<p>أسم صاحب العربة :  <span id="name"></span>	</p>
								</div>
								<div class="col-md-6">
										<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
								</div>
								<div class="col-md-6">
								<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
								</div>

								<input type="hidden" name="emp_id" id="emp_id" value="" />
							</div>
							<div class="row">
								<div class="col-md-6">
											<label for="serialNo" class="control-label">الرقم المتسلسل</label>
											<div class="">
												<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="10" required="true" placeholder="">
											</div>
								</div>
								<div class="col-md-6">
											<label for="amount" class=" control-label">الرسوم المدفوعة لهيئة الموانئ </label>
											<div class="">
												<input class="form-control" name="amount" type="text" id="amount" value="" minlength="1" maxlength="10" required="true" placeholder="">
											</div>
								</div>
							</div>

								<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="card">
												<div class="card-body">
												<div class="mg-b-50">
														<h6 class="card-title mb-1">المرفقات:  </h6>
														<p class="text-muted card-sub-title">
									من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
											</p>
													</div>
									<div class="row mb-4">
									<h6 class="card-title mb-1"> اورنيك تخليص </h6>
										<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
											<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
										</div>
									
									</div>
								
							</div>
						</div>
					
						</div>
					</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
						</div>
					</div>
				</div>
			</div>
	</form>
		<!--End Grid modal 6 -->


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////-->
		<!-- بلاغ عن سيارة مخالفة -->


			<!-- Grid modal7 -->
	<form method="POST" action="{{ route('update_alerts') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
			<div class="modal" id="modaldemo5">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">بلاغ عن سيارة مخالفة  </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body body5">
							<div class="row mg-b-50">
								<div class="col-md-12">

										<p>أسم صاحب العربة :  <span id="name"></span>	</p>
								</div>
								<div class="col-md-6">
										<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
								</div>
								<div class="col-md-6">
								<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
								</div>

								<input type="hidden" name="emp_id" id="emp_id" value="" />
							</div>
							<div class="row">
								<div class="col-md-6">
											<label for="serialNo" class="control-label"> رقم البلاغ</label>
											<div class="">
												<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="50" required="true" placeholder="">
											</div>
								</div>
								<div class="col-md-6">
											<label for="title" class=" control-label">موضوع البلاغ    </label>
												<input class="form-control" name="title" type="text" id="" value="" minlength="1" maxlength="100" required="true" placeholder="">
								</div>
								
								
							</div>
							<div class="row">
									<div class="col-md-12">
													<label for="desc" class=" control-label">وصف مختصر للبلاغ </label>
													<div class="">
														<textarea class="form-control" name="desc"  rows="5" id="desc"    placeholder="">

														</textarea>
													</div>
										</div>
								</div>	
								<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="card">
												<div class="card-body">
												<div class="mg-b-50">
														<h6 class="card-title mb-1">المرفقات:  </h6>
														<p class="text-muted card-sub-title">
									من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
											</p>
													</div>
									<div class="row mb-4">
									<h6 class="card-title mb-1">  البلاغ </h6>
										<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
											<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
										</div>
									
									</div>
								
							</div>
						</div>
					
						</div>
					</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit" type="button">بلاغ</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
						</div>
					</div>
				</div>
			</div>
	</form>
		<!--End Grid modal 7 -->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
		<!-- ترحيل سيارة -->

					<!-- Grid modal6 -->
<form method="POST" action="{{ route('traheel') }}"  enctype="multipart/form-data" accept-charset="UTF-8" id="create_intarnal_files_form" name="create_intarnal_files_form" class="form-horizontal">
          				  {{ csrf_field() }}
		<div class="modal" id="modaldemo6">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title"> إعادة او ترحيل السيارة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
			     	<div class="modal-body body6">
						<div class="row mg-b-50">
							<div class="col-md-12">

									<p>أسم صاحب العربة :  <span id="name"></span>	</p>
							</div>
							<div class="col-md-6">
									<p> رقم الدفتر:  <span  id="carnetNo" > </span> </p>
							</div>
							<div class="col-md-6">
							<p> رقم الهيكل :  <span id="chassisNo"> </span> </p>
							</div>

							<input type="hidden" name="emp_id" id="emp_id" value="" />
						</div>
						<div class="row">
							 <div class="col-md-6">
										<label for="serialNo" class="control-label">الرقم المتسلسل</label>
										<div class="">
											<input class="form-control" name="serialNo" type="text" id="serialNo" value="" minlength="1" maxlength="10" required="true" placeholder="">
										</div>
						     </div>
							 <div class="col-md-6">
									    <label for="exitDate" class=" control-label">تاريخ  الترحيل</label>
										<div class="">
											<input class="form-control" name="exitDate" type="date" id="exitDate" value="" minlength="1" maxlength="10" required="true" placeholder="">
										</div>
						     </div>
						</div>

							<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="card">
											<div class="card-body">
											<div class="mg-b-50">
													<h6 class="card-title mb-1">المرفقات:  </h6>
													<p class="text-muted card-sub-title">
								من فضلك ارفع نوع الملفات المسموح بها وهي ( <code>jpg, .png, image/jpeg, image/png , pdf</code> )			
										</p>
												</div>
								<div class="row mb-4">
								<h6 class="card-title mb-1"> خطاب الترحيل</h6>
									<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
										<input type="file"  name="file_name" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
									</div>
								
								</div>
								
								<div class="row mb-4">
								<h6 class="card-title mb-1"> إفادة  </h6>
									<div class="col-sm-12 col-md-6 mg-t-10 mg-sm-t-0">
										<input type="file"  name="file_name2" accept=".jpg, .png, image/jpeg, image/png, .pdf" class="dropify"  value=""  />
									</div>
								
								</div>
							</div>
						</div>
					</div>
				
			    	</div>
            	</div>
					<div class="modal-footer">
						<button class="btn ripple btn-primary" type="submit" type="button">حفظ</button>
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		<!--End Grid modal -->


