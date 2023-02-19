<?php


$user = Auth::user();

?>
<!-- main-sidebar -->
		   <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
				<div class="main-sidebar-header active">
					<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
					<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white2.png')}}" width="150"  hieght="70" class="main-log dark-theme" alt="logo"></a>
					<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-icon" alt="logo"></a>
					<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white2.png')}}" class="logo-icon dark-theme" alt="logo"></a>
					

				</div>

			<div class="main-sidemenu">
				<div class="mg-t-20 mg-b-50 pd-r-20 " >
						<h3>نادي السيارات والرحلات السوداني</h3>
				</div>
			    <div class="app-sidebar__user clearfix">
						@if($user->hasAnyRole('superAdmin'))
								@include('layouts.menu.superAdmin')

							@endif
							@if($user->hasRole('admin'))
								
								@include('layouts.menu.admin')
								
							@endif
							@if($user->hasRole('agent'))
								
								@include('layouts.menu.agent')
								
							@endif
							@if($user->hasRole('extoffice'))
								
								@include('layouts.menu.extoffice')
								
							@endif
							@if($user->hasRole('employee'))
								
								@include('layouts.menu.employee')
								
							@endif
							@if($user->hasRole('customer'))
								
								@include('layouts.menu.customer')
								
							@endif
					</div>			
			</div>
		</aside>
<!-- main-sidebar -->
