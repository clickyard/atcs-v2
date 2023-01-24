<?php 
           $lang=app()->getLocale()=='ar' ? '-rtl' : '';

?>


<!-- Title -->
<title> @yield("title")</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets')}}/css{{ $lang }}/sidemenu.css">
@yield('css')
<!--- Style css -->
<link href="{{URL::asset('assets')}}/css{{ $lang }}/style.css" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets')}}/css{{ $lang }}/style-dark.css" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets')}}/css{{ $lang }}/skin-modes.css" rel="stylesheet">
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/print.css')}}"  type="text/css" media="print" />
