@extends('layouts.master')
@section('title')
بيانات السيارة - لوحة التحكم

@endsection
@section('css')

<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal Sumoselect css-->
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.css') }}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  تعديل بيانات السيارات</span>
						</div>
					</div>
                    <div class="d-flex my-xl-auto right-content">
                    
                    <a class="btn  btn-success"  href="/cars"><i class="mdi mdi-table"></i>  قائمة السيارات</a>
                   

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


				
				
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<!--- stat button            -->
							<div class="col-sm-8 col-md-8">
								
										<div class="card-body">
										
                                        <h4 class="mt-5 mb-5">{{ !empty($cars->plateNo)  ? 'تعديل بيانات السيارة : '.optional($cars->Vehicle)->name .' - رقم اللوحة : '.$cars->plateNo : 'Cars' }}</h4>
										</div>
								
							</div>


            <form method="POST" action="{{ route('cars.update', $cars->id) }}" id="edit_cars_form" name="edit_cars_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            
                        @include ('cars.form', [
                                    'cars' => $cars,
                                    ])
				  
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input class="btn btn-primary" type="submit" value="تعديل">

                        </div>
                    </div>
                </form>
					
            
        </div>    
							
				

				
				</div>
				<!-- /row -->   
				
     
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

@endsection
