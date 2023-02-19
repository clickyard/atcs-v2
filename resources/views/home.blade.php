@extends('layouts.master')
@section('title')
نظام ادارة الافراج المؤقت لنادي السيارات السوداني
@stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بك في نادي السيارات والرحلات السوداني !</h2>
                <p class="mg-t-20">  نظام ادارة الافراج المؤقت:  الرئيسية</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">تقييم العملاء</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">طلبات اصدار الدفتر</label>
                <h5>000,000</h5>
            </div>
            <div>
                <label class="tx-13">طلبات الرخص</label>
                <h5>000,000</h5>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <?php 
    
    $count_all= $emp->allcars;
    ?>
    <div class="row row-sm">
    <?php  $user = Auth::user(); ?>

    @if($user->hasAnyRole(['superAdmin','admin','employee','extoffice','agent']))

    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-secondary">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> سيارت واصلة  </h6>
                       
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-20 font-weight-bold mb-1 text-white">
                                     
                                    {{ number_format($emp->beforeintarnal)}} سيارة

                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">{{  $emp->beforeintarnal }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">

                                    @php
                                    $count_cars2 = $emp->beforeintarnal;

                                    if($count_cars2 == 0){
                                       echo $count_cars2 = 0;
                                    }
                                    else{
                                       echo $count_cars2 = round($count_cars2 / $count_all *100).'%';
                                    }
                                    @endphp

                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif


    @if($user->hasAnyRole(['superAdmin','admin','employee']))
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> جميع عربات الافراج المؤقت</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
									{{ $emp->allcars}} سيارة
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">{{ $emp->allcars}}</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"><?php  $temp=$emp->allcars=='0' ? 0 : '100%';
                                                      echo $temp ; ?>
                              </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">السيارات بالداخل  </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h3 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{ $emp->afterintarnal }} سيارة

                                </h3>
                                <p class="mb-0 tx-12 text-white op-7">{{ $emp->afterintarnal }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">

                                    @php
                                    $count_cars2 = $emp->afterintarnal;

                                    if($count_cars2 == 0){
                                       echo $count_cars2 = 0;
                                    }
                                    else{
                                       echo $count_cars2 = round($count_cars2 / $count_all *100).'%';
                                    }
                                    @endphp

                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> بالداخل ومتبقي المدة اقل من 15يوم </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
								 
                                    {{ number_format($emp->intarnalCars) }} سيارة

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ $emp->intarnalCars }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $count_cars1 = $emp->intarnalCars;

                                        if($count_cars1 == 0){
                                           echo $count_cars1 = 0;
                                        }
                                        else{
                                           echo $count_cars1 = round($count_cars1 / $count_all *100).'%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">السيارات التي غادرت  </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{ $emp->leaving }} سيارة

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ $emp->leaving }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $count_cars1 = $emp->leaving;

                                        if($count_cars1 == 0){
                                            echo $count_cars1 = 0;
                                        }
                                        else{
                                          echo $count_cars1 = round($count_cars1 / $count_all *100).'%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">السيارات  المخالفة  </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{ $emp->notleaving }} سيارة

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ $emp->notleaving }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $count_cars1 =$emp->notleaving;

                                        if($count_cars1 == 0){
                                            echo $count_cars1 = 0;
                                        }
                                        else{
                                          echo $count_cars1 = round($count_cars1 / $count_all *100).'%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-pink-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">السيارات التي تم ترحيلها  </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{ $emp->tarheel }} سيارة

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ $emp->tarheel }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $count_cars1 = $emp->tarheel;

                                        if($count_cars1 == 0){
                                            echo $count_cars1 = 0;
                                        }
                                        else{
                                          echo $count_cars1 = round($count_cars1 / $count_all *100).'%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">السيارات التي تم تخليصها  </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{ $emp->takhlees }} سيارة

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ $emp->takhlees }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $count_cars1 = $emp->takhlees;

                                        if($count_cars1 == 0){
                                            echo $count_cars1 = 0;
                                        }
                                        else{
                                          echo $count_cars1 = round($count_cars1 / $count_all *100).'%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">السيارات التي تم تمديدها  </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">

                                    {{ $emp->increase }} سيارة

                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ $emp->increase }}
                                </p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    @php
                                        $count_cars1 = $emp->increase;

                                        if($count_cars1 == 0){
                                            echo $count_cars1 = 0;
                                        }
                                        else{
                                          echo $count_cars1 = round($count_cars1 / $count_all *100).'%';
                                        }
                                    @endphp
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
   
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-5">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">روابط سريعة  </h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body" style="width: 70%">
                <div class="media-body">
                   @if($user->hasAnyRole(['superAdmin','admin','employee','agent']))
                     <div class="mt-2">  <a class=""  href="{{ route('customers.create') }}"><i class="mdi mdi-plus text-primary tx-18"></i>  إضاقة دفتر جديد</a></div>
                   @endif
                     @if($user->hasAnyRole(['superAdmin','admin','employee']))

                     <div class="mt-2">  <a class=""  href="#"><i class="mdi mdi-file text-danger tx-18"></i>   استخراج خطابات </a></div>
                     <div class="mt-2">  <a class=""  href="#"><i class="mdi mdi-file text-success tx-18"></i>   إصدار دفتر مرور جمركي  </a></div>
                     <div class="mt-2">  <a class=""  href="#"><i class="mdi mdi-pen text-info tx-18"></i>   إصدار رخصة قيادرة دولية  </a></div>
                     @endif
                     <div class="mt-2">   <a class=""  href="#"><i class="bx bx-user-circle text-danger tx-18"></i>      تعديل البروفايل  </a></div>

                 </div>     
               
                </div>
            </div>
        </div>

        @if($user->hasAnyRole(['superAdmin','admin','employee']))
        <div class="col-lg-12 col-xl-7">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">الطلبات</label>
                <div class="" style="width: 100%">
                 

                                    <div class="list-group-item list-group-item-action" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/11.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-1">
														<h5 class="mb-1 tx-15">طلب اصدار دفتر </h5>
														<p class="mb-0 tx-13 text-muted">User ID: #1234 <span class="text-danger ml-2">Pending</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark2" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>


                                    <div class="list-group-item list-group-item-action" href="#">
										<div class="media mt-0">
											<img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('assets/img/faces/17.jpg')}}" alt="Image description">
											<div class="media-body">
												<div class="d-flex align-items-center">
													<div class="mt-1">
														<h5 class="mb-1 tx-15">طلب رخصة </h5>
														<p class="mb-0 tx-13 text-muted">User ID: #1234<span class="text-danger ml-2">Pending</span></p>
													</div>
													<span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark3" class="wd-100p"></div>
													</span>
												</div>
											</div>
										</div>
									</div>

                                    
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- row closed -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
