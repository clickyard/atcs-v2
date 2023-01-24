@extends('layouts.master')
@section('title')
 رسوم الايرادات
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  الرسوم</span>
						</div>
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

@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

				<!-- row -->
				<div class="row">


				
				
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<!--- stat button            -->
							
					
							<div class="card-body">
                            العملة بالجنيه السوداني !
                               @if(count($amounts) == 0)
                                    <form action="{{ route('amounts.store') }}" method="post" autocomplete="off">
                                        {{ csrf_field() }}

                                        
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم الدفتر  </label>
                                            <input type="text" class="form-control" id="" name="carnet"  value="" required="true" placeholder="رسوم الدفتر">
                                        </div>
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم سواكن  </label>
                                            <input type="text" class="form-control" id="" name="portsudan" value="" required="true" placeholder="رسوم سواكن">
                                        </div>
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم التمديد  </label>
                                            <input type="text" class="form-control" id="" name="increase" value="" required="true" placeholder="رسوم التمديد">
                                        </div>
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم التخليص   </label>
                                            <input type="text" class="form-control" id="" name="letter" value=""  required="true" placeholder="رسوم الخطاب">
                                            <input type="text" class="form-control" id="" name="moanye" value="" required="true" placeholder="رسوم الموانئ">
                                        </div>
                                        <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <input class="btn btn-primary" type="submit" value="حفظ">
                                                    </div>
                                        </div>
                                    </form> 
                             @else
                                        
                            @foreach ($amounts as $x)
                                <form action="amounts/update" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="{{$x->id}}">
                                        </div>  
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم الدفتر  </label>
                                            <input type="text" class="form-control" id="" name="carnet"  value="{{$x->carnet}}" required="true" placeholder="رسوم الدفتر">
                                        </div>
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم سواكن  </label>
                                            <input type="text" class="form-control" id="" name="portsudan" value="{{$x->portsudan}}" required="true" placeholder="رسوم سواكن">
                                        </div>
                                        <div class="form-group col-md-5 col-lg-4">
                                            <label for="">رسوم التمديد  </label>
                                            <input type="text" class="form-control" id="" name="increase" value="{{$x->increase}}" required="true" placeholder="رسوم التمديد">
                                        </div>
                                        <div class="form-group col-md-5 col-lg-4">
                                            <h3>رسوم التخليص :-  </h3></br>
                                            رسوم الخطاب
                                            <input type="text" class="form-control" id="" name="letter" value="{{$x->letter}}"  required="true" placeholder="رسوم الخطاب">
                                           رسوم الموانئ
                                            <input type="text" class="form-control" id="" name="moanye" value="{{$x->moanye}}" required="true" placeholder="رسوم الموانئ">
                                        </div>
                                        <div class="form-group">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <input class="btn btn-primary" type="submit" value="تعديل">
                                                    </div>
                                         </div>
                                  </form>  
                                @endforeach
                                @endif
			
								</div>
							</div>
						</div>
					</div>
					<!--/div-->




	
				
				</div>
				<!-- /row -->   
	
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')


@endsection