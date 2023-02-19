@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@section('title')
اضافة مستخدم 
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                مستخدم</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">رجوع</a>
                    </div>
                </div><br>
                <form class="" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('users.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="">

         
                
                        <div class="row mg-b-20">
                                    <div class="parsley-input col-md-3" id="">
                                        <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                        <input class="form-control "
                                            data-parsley-class-handler="#" name="username" required="" type="text" value="{{ old('username') }}">
                                    </div>

                                    <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="">
                                        <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                        <input class="form-control "
                                            data-parsley-class-handler="#" name="email" required="" type="email" value="{{ old('email') }}">
                                    </div>
                               
                                <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="">
                                    <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                    <input class="form-control " data-parsley-class-handler="#"
                                        name="password" required="" type="password">
                                </div>
                                <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="">
                                    <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                    <input class="form-control " data-parsley-class-handler="#"
                                        name="confirm-password" required="" type="password">
                                </div>
                        </div>
                    </div>

                    <hr/>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-4" id="">
                                <label>اسم بالكامل: <span class="tx-danger">*</span></label>
                                <input class="form-control "
                                    data-parsley-class-handler="#" name="name" required type="text" value="{{ old('name') }}">
                            </div>

                            <div class="parsley-input col-md-4" id="">
                                <label> الدولة: <span class="tx-danger">*</span></label>
                                <input class="form-control "
                                    data-parsley-class-handler="#" name="country"  required type="text" value="{{ old('country') }}">
                            </div>

                            <div class="parsley-input col-md-4" id="">
                                <label> رقم الهاتف: <span class="tx-danger"></span></label>
                                <input class="form-control "
                                    data-parsley-class-handler="#" name="tel"  type="text" value="{{ old('tel') }}">
                            </div>
                         
                        </div>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="">
                                <label> العنوان: <span class="tx-danger"></span></label>
                                <input class="form-control "
                                    data-parsley-class-handler="#" name="address" type="text" value="{{ old('address') }}">
                            </div>

                           
                         
                   


                     <!--   <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="">
                            <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                            <input class="form-control " data-parsley-class-handler="#"
                                name="confirm-password" required="" type="password">
                        </div>-->
                    </div>
<hr/>
            <div class="row row-sm mg-b-20">
                 

            <div class="col-xs-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label"> صلاحية المستخدم</label>
                           

                                {!! Form::select('roles_name', $roles,old('roles_name'), array('class' => 'form-control select2 ')) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">حالة المستخدم</label>
                            <select name="Status" id="select-beast" class="form-control select2">
                                <option value="مفعل">مفعل</option>
                                <option value="غير مفعل">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-success pd-x-20" type="submit">تاكيد</button>
                    </div>
                </form>
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


<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!--Internal  Parsley.min js --
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
-- Internal Form-validation js --
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>-->
@endsection