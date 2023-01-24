					
					<p class="mg-b-20">البيانات الاساسية</p>

							<div class="row row-sm col-md-9 col-lg-12">
								
								<div class="col-md-5 col-lg-4 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
									<label for="name" class=" control-label">Name</label>
							
									<div class="col">

											<input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($customers)->name) }}" minlength="1" maxlength="400" required="true" placeholder="Enter name here...">
											{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
										</div>
									</div>

									<div class="col-md-5 col-lg-4  form-group {{ $errors->has('nationality') ? 'has-error' : '' }}">
									<label for="nationality" class="col control-label">Nationality</label>
							
									<div class="col">

											<input class="form-control" name="nationality" type="text" id="nationality" value="{{ old('nationality', optional($customers)->nationality) }}" minlength="1" maxlength="400" required="true" placeholder="Enter nationality here...">
											{!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
										</div>
									</div>

									<div class="col-md-5 col-lg-4 form-group {{ $errors->has('nationalityNo') ? 'has-error' : '' }}">
										<div class=" col">
												<label for="nationalityNo" class=" control-label">Nationality No</label>

											<input class="form-control" name="nationalityNo" type="text" id="nationalityNo" value="{{ old('nationalityNo', optional($customers)->nationalityNo) }}" minlength="1" required="true" placeholder="Enter nationality no here...">
											{!! $errors->first('nationalityNo', '<p class="help-block">:message</p>') !!}
										</div>
									</div>
							</div>

					{{-- 2 --}}
					<hr/>
					<p class="mg-b-20">العنوان</p>
					<div class="row row-sm col-md-9 col-lg-12">
							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
								<label for="country_id" class=" control-label">Country</label>
								<div class="col">
									<select class="form-control" id="country_id" name="country_id" required="true">
											<option value="" style="display: none;" {{ old('country_id', optional($customers)->country_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter country here...</option>
										@foreach ($Countries as $key => $Country)
											<option value="{{ $key }}" {{ old('country_id', optional($customers)->country_id) == $key ? 'selected' : '' }}>
												{{ $Country->name }}
											</option>
										@endforeach
									</select>
									
									{!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
								<label for="state_id" class=" control-label">State</label>
								<div class="col">
									<select class="form-control" id="state_id" name="state_id" required="true">
											<option value="" style="display: none;" {{ old('state_id', optional($customers)->state_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select state</option>
										@foreach ($States as $key => $State)
											<option value="{{ $key }}" {{ old('state_id', optional($customers)->state_id) == $key ? 'selected' : '' }}>
												{{ $State->name }}
											</option>
										@endforeach
									</select>
									
									{!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('city') ? 'has-error' : '' }}">
								<label for="city" class=" control-label">City</label>
								<div class="col">
									<input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($customers)->city) }}" minlength="1" maxlength="900" required="true" placeholder="Enter city here...">
									{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
				
							
					</div>
					<div class="row row-sm col-md-9 col-lg-12">  
							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('block') ? 'has-error' : '' }}">
								<label for="block" class=" control-label">Block</label>
								<div class="col">
									<input class="form-control" name="block" type="text" id="block" value="{{ old('block', optional($customers)->block) }}" minlength="1" maxlength="900" required="true" placeholder="Enter block here...">
									{!! $errors->first('block', '<p class="help-block">:message</p>') !!}
								</div>
							</div>					
							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('houseNo') ? 'has-error' : '' }}">
								<label for="houseNo" class=" control-label">House No</label>
								<div class="col">
									<input class="form-control" name="houseNo" type="text" id="houseNo" value="{{ old('houseNo', optional($customers)->houseNo) }}" minlength="1" maxlength="100" required="true" placeholder="Enter house no here...">
									{!! $errors->first('houseNo', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('street') ? 'has-error' : '' }}">
								<label for="street" class=" control-label">Street</label>
								<div class="col">
									<input class="form-control" name="street" type="text" id="street" value="{{ old('street', optional($customers)->street) }}" minlength="1" maxlength="900" required="true" placeholder="Enter street here...">
									{!! $errors->first('street', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							
					</div>
					<div class="row row-sm col-md-9 col-lg-12">
					      <div class="col-md-5 col-lg-4 form-group {{ $errors->has('work_address') ? 'has-error' : '' }}">
								<label for="work_address" class=" control-label">Work Address</label>
								<div class="col">
									<input class="form-control" name="work_address" type="text" id="work_address" value="{{ old('work_address', optional($customers)->work_address) }}" minlength="1" maxlength="900" required="true" placeholder="Enter work address here...">
									{!! $errors->first('work_address', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
								<label for="tel" class=" control-label">Tel</label>
								<div class="col">
									<input class="form-control" name="tel" type="text" id="tel" value="{{ old('tel', optional($customers)->tel) }}" minlength="1" required="true" placeholder="Enter tel here...">
									{!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('tel2') ? 'has-error' : '' }}">
								<label for="tel2" class=" control-label">Tel2</label>
								<div class="col">
									<input class="form-control" name="tel2" type="text" id="tel2" value="{{ old('tel2', optional($customers)->tel2) }}" placeholder="Enter tel2 here...">
									{!! $errors->first('tel2', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
                        </div>
						<div class="row row-sm col-md-9 col-lg-12">
							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label for="email" class=" control-label">Email</label>
								<div class="col">
									<input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($customers)->email) }}" minlength="1" maxlength="400" required="true" placeholder="Enter email here...">
									{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('whatsup') ? 'has-error' : '' }}">
								<label for="whatsup" class=" control-label">Whatsup</label>
								<div class="col">
									<input class="form-control" name="whatsup" type="text" id="whatsup" value="{{ old('whatsup', optional($customers)->whatsup) }}" placeholder="Enter whatsup here...">
									{!! $errors->first('whatsup', '<p class="help-block">:message</p>') !!}
								</div>
							</div>

							<div class="col-md-5 col-lg-4 form-group {{ $errors->has('processType') ? 'has-error' : '' }}">
								<label for="processType" class=" control-label">Process Type</label>
								<div class="col">
									<input class="form-control" name="processType" type="text" id="processType" value="{{ old('processType', optional($customers)->processType) }}" minlength="1" maxlength="10" required="true" placeholder="Enter process type here...">
									{!! $errors->first('processType', '<p class="help-block">:message</p>') !!}
								</div>
							</div>
					 </div>
				
			


