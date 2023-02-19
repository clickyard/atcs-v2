@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->

<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@section('title')
تعديل مستخدم 
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                مستخدم</span>
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

                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="">
                <?php 
                    if(Auth::user()->roles_name=="superAdmin")
                       $readonly="";
                    else 
                        $readonly="readonly";
               ?>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                            {!! Form::text('username', null, array('class' => 'form-control','required','readonly')) !!}
                    
                        </div>
                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label> الاسم بالكامل: <span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, array('class' => 'form-control','required',$readonly)) !!}
                    
                        </div>
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="">
                            <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, array('class' => 'form-control','required',$readonly)) !!}
                        </div>
                    </div>

                </div>

               

                <div class="row row-sm mg-b-20">
                  
           
                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label>الدولة :</label>
                            {!! Form::text('country', null, array('class' => 'form-control','required',$readonly)) !!}
                    
                        </div>
                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label>العنوان : </label>
                            {!! Form::text('address', null, array('class' => 'form-control',$readonly)) !!}
                    
                        </div>

                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label>رقم الهاتف : <span class="tx-danger">*</span></label>
                            {!! Form::text('tel', null, array('class' => 'form-control',$readonly)) !!}
                    
                        </div>
                </div>

                <div class="row mg-b-20">
                    <div class="col-lg-6 form-group">
                        <label class="form-label">حالة المستخدم</label>
                        
                       <?php $Status_value=array('مفعل'=>'مفعل','غير مفعل'=>'غير مفعل');?>
                        {!! Form::select('Status', $Status_value,$user->Status, array('class' => 'form-control select2 ')) !!}

                        
                    </div>
                        <div class="col-lg-6">
                            <strong>نوع المستخدم</strong>
                           
                            {!! Form::select('roles_name', $roles,$userRole, array('class' => 'form-control select2'))
                            !!}
                         
                        </div>
                </div>
                <div class="mg-t-30">
                    <button class="btn btn-success pd-x-20" type="submit">تحديث</button>
                </div>
                {!! Form::close() !!}


                            <hr/>
                            {!! Form::model($user, ['method' => 'post','route' => ['users.updatepassword', $user->id]]) !!}
 
                     <div class="mg-t-30">
                            <strong> تغيير كلمة المرور</strong>
                            <div class="row mg-b-30">
                                <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="">
                                    <label>كلمة المرور الجديدة: <span class="tx-danger">*</span></label>
                                    {!! Form::password('password', array('class' => 'form-control','required')) !!}
                                </div>

                                <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="">
                                    <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                    {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                                </div>
                               
                            </div>
                            <div class="mg-t-30">
                                        <button class="btn btn-main-primary pd-x-20" type="submit">تحديث كلمة المرور</button>

                                </div>
                     </div>
                {!! Form::close() !!}

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

<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

@endsection