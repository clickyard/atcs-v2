@extends('layouts.master2')
@section('title')
 ATCS - تسجيل دخول
@endsection
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-7  bg-success-transparent">
					<div class="login d-flex align-items-center py-0">
						<!-- Demo content-->
						<div class="container p-0 mt-0">
							<div class="row">
							<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/faviconheader.png')}}" class="sign-favicon ht-100 " alt="logo"></a>
									</div>
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									
									<div class="card-sigin">
									<!--	<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-80" alt="logo"></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

										<h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 text-center">نادي السيارات والرحلات السوداني
										<br/> 	<span class="tx-20 ">نظام إدارة الإفراج الموقت</span>
										</h1>
										
										
									</div>-->
										<div class="card-sigin">
											<div class="main-signup-header">
											<h2>مرحبا بك</h2>
                                            <h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>
												<form method="POST" action="{{ route('login') }}">
                                                  @csrf
													<div class="form-group">
												
														<label>اسم المستخدم</label>

														
															<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

															@error('username')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													
												
													<?php /*
                                                    <label>البريد الالكتروني</label>
                                                        <input id="email" type="email" placeholder="Enter your email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                         @error('email') 
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                */?>
                                                    </div>
													<div class="form-group">
                                                    <label>كلمة المرور</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        
													</div>
                                                    <div class="form-check form-group">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                        <label class="form-check-label" for="remember">
														{{ __('تذكرني') }}
                                                        </label>
                                                    </div>

                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                        </button>

                                                       
                                                  
													
												
												<div class="main-signin-footer mt-5">
													<p> 
                                                        
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="#">
                                                            {{ __('هل نسيت كلمة المرور؟') }}
                                                        </a>
                                                    @endif
                                                    
                                                    </p>
													<p>ليس لديك حساب؟ <a href="#">انشاء حساب جديد</a></p>
												
                                                </div>
                                                </form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
                <!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-5 d-none d-md-flex bg-white">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login.jpg')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
@section('js')
@endsection