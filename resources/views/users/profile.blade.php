@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ البروفايل</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{URL::asset('assets/img/faces/66.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<?php 
										$role=array(

											'superAdmin'=>'مدير عام',
											'admin'=>'مدير',
											'employee'=>'موظف',
											'agent'=>'وكيل خارجي',
											'extoffice'=>'مكتب خارجي',
											'customer'=>'عميل'
										);
										
										?>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">اسم المستخدم: {{Auth::user()->username}}</h5>
												<p class="main-profile-name-text">الصلاحية : {{ $role[Auth::user()->roles_name]}} </p>
											</div>
										</div>
										<div class="main-profile-bio">

										<h5> الاسم :   {{Auth::user()->name}}</h5>
										</br>
										<h5> الدولة :   {{Auth::user()->country}}</h5></br>
										<h5> رقم الهاتف :   {{Auth::user()->tel}}</h5></br>
										<h5> البريد الالكتروني :   {{Auth::user()->email}}</h5></br>
										<h5> العنوان :   {{Auth::user()->address}}</h5></br>

										</br>
									</div><!-- main-profile-bio -->
									
									
										
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										
										<li class="active">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> 
											<span class="hidden-xs">تعديل البيانات</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">

									<div class="tab-pane active" id="settings">
									{!! Form::model(Auth::user(), ['method' => 'post','route' => ['users.updateprofile', Auth::user()->id]]) !!}
											<div class="form-group">
												<label for="FullName">العنوان</label>
												<input type="text" value=" {{Auth::user()->address}}" id="address" name="address" class="form-control">
											</div>
											<div class="form-group">
												<label for="Email">رقم الهاتف</label>
												<input type="tel" value="{{Auth::user()->tel}}" id="tel" name="tel" class="form-control">
											</div>
											
											<div class="form-group">
											<h5> إذا اردت التغيير الى كلمة مرور جديدة ادخل الاتي</h5><hr/>
												<label for="Password">كلمة المرور الجديدة</label>
												<input type="password" placeholder="6 - 15 Characters" id="Password" name="Password" class="form-control">
											</div>
											<div class="form-group">
												<label for="RePassword">إعادة كلمة المرور</label>
												<input type="password" placeholder="6 - 15 Characters" id="RePassword" name="confirm-password" class="form-control">
											</div>
										
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">حفظ التغيرات</button>
										{!! Form::close() !!}

									</div>
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
@endsection