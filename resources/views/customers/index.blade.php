@extends('layouts.master')
@section('title')
إضافة عميل - لوحة التحكم

@endsection

@section('css')

<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!--<link href="{{ asset('css/plugin.css') }}" rel="stylesheet">-->

@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة العملاء</span>
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

<?php  $user = Auth::user(); ?>
				
				
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<!--- stat button            -->
							@if($user->hasAnyRole(['superAdmin','admin','employee','seudiAdmin']))
							<div class="col-sm-4 col-md-4">
								
										<div class="card-body">
										
											<a class="btn ripple btn-primary"  href="{{ route('customers.create') }}"><i class="mdi mdi-plus"></i>  إضاقة دفتر جديد</a>
										</div>
								
								</div>
							@endif
							<div class="card-body">
						@if($user->hasAnyRole(['superAdmin','admin','employee']))		
							<form action="{{ route('markibat')}} " method="POST" role="search" autocomplete="off">
									{{ csrf_field() }}

									<label for="inputName" class="control-label"> البحث بنوع المركبة</label>
									<div class="row  mg-b-30">
									

										<div class="col-lg-3">
											<label class="rdiobox"><input class="type" name="type" onchange="this.form.submit()" value="1" type="radio" {{ $type==1  ? 'checked':""; }} > <span> المركبات الواصلة</span></label>
										</div>
										
										<div class="col-lg-3 mg-t-20 mg-lg-t-0">
											<label class="rdiobox"><input class="type" name="type" onchange="this.form.submit()"  value="2" type="radio"  {{ $type ==2  ? 'checked':""; }} > <span> مركبات بالداخل </span></label>
										</div>
										<div class="col-lg-4 mg-t-20 mg-lg-t-0">
											<label class="rdiobox"><input  value="3"  name="type" onchange="this.form.submit()" type="radio"  {{ $type ==3  ? 'checked':""; }} > <span>بالداخل ومتبقي المدة اقل من 15يوم</span></label>
										</div>
										<div class="col-lg-2 mg-t-20 mg-lg-t-0">
											<label class="rdiobox"><input  name="type" value="4" onchange="this.form.submit()" type="radio"  {{ $type ==4  ? 'checked':""; }} > <span> متخلفة عن المغادرة</span></label>
										</div>
									
										
									</div>
									
									<div class="row  mg-b-30">
									

										<div class="col-lg-3">
											<label class="rdiobox"><input class="type" name="type" onchange="this.form.submit()" value="5" type="radio" {{ $type==5  ? 'checked':""; }} > <span> مركبات غادرت</span></label>
										</div>
										
										<div class="col-lg-3 mg-t-20 mg-lg-t-0">
											<label class="rdiobox"><input class="type" name="type" onchange="this.form.submit()"  value="6" type="radio"  {{ $type ==6  ? 'checked':""; }} > <span> مركبات تم تخليصها </span></label>
										</div>
										<div class="col-lg-3 mg-t-20 mg-lg-t-0">
											<label class="rdiobox"><input  class="type"  name="type" onchange="this.form.submit()"  value="7"  type="radio"  {{ $type ==7  ? 'checked':""; }} > <span>   مركبات تم تمديدها  </span></label>
										</div>
										<div class="col-lg-3 mg-t-20 mg-lg-t-0">
											<label class="rdiobox"><input class="type"  name="type"  onchange="this.form.submit()" value="8"   type="radio"  {{ $type ==8  ? 'checked':""; }} > <span>مركبات   مخالفة</span></label>
										</div>
									
										
									</div>
									
						    </form>
							@endif
							<hr/>
							 @if(count($customersObjects) == 0)
								<div class="panel-body text-center">
									<h4>لا توجد بيانات حالياً  </h4>
								</div>
							@else
						 <div class="table-responsive">
									<table id="" class="table table-hover key-buttons text-md-nowrap">
										<thead>
											<tr>
											  <tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">اسم العميل </th>
												<th class="border-bottom-0">رقم الدفتر</th>
												<th class="border-bottom-0">تاريخ اصدار الدفتر</th>
												<th class="border-bottom-0">رقم الشاسي</th>
												@if($user->hasAnyRole(['superAdmin','admin','employee']))		
		
												<th class="border-bottom-0">تاريخ الدخول</th>
												@endif
                                                <th class="border-bottom-0">العمليات</th>
												<th class="border-bottom-0">التفاصيل</th>
											</tr>
										</thead>
										<tbody>
										<?php $i = 0; ?>
                               @foreach($customersObjects as $customers)
                                <?php $i++; 
								 $j=0;
								//  $key=count($customers->emportcar) - 1;
								//  $key2= count($customers->car) - 1;
								  ?>
                                <tr>
                                    <td>{{ $i }}</td>
									<td>
									<a href="{{ route('customers.show', $customers->id ) }}" title="بيانات صاحب العربة">		
						     			{{ $customers->customer->name }}
									</a>
								 </td>
								    <td>{{ $customers->carnetNo }} </td>
									 <td>{{ $customers->issueDate }} </td>
									<td>{{ $customers->car->chassisNo}} </td>
									@if($user->hasAnyRole(['superAdmin','admin','employee']))	
									<td>{{ $customers->entryDate }} </td>
									@endif

					<td class="" style="overflow: visible;">
						@if($customers->status !=5 && $customers->status !=2) 
						    <div class="dropdown" style="overflow: visible;">
									<button aria-expanded="false" aria-haspopup="true"
										class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
										type="button">العمليات  <i class="fas fa-caret-down ml-1"></i></button>
									<div class="dropdown-menu tx-14" style="overflow: visible;">
											
											<a class="dropdown-item" href="{{ route('customers.edit',$customers->car->customer_id) }}" >
												<i class="text-info fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات العميل
											</a>
											<a class="dropdown-item" href="{{ route('emportcars.edit',$customers->id) }}" >
												<i class="text-primary fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات الدفتر
											</a>
											<a class="dropdown-item" href="{{ route('cars.edit',$customers->car->id) }}" >
												<i class="text-warning fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات العربة
											</a>
											<a class="dropdown-item" href="{{ route('guarantors.edit',$customers->car->customer_id) }}" >
												<i class="text-success fas fa-pen"></i>&nbsp;&nbsp;
													 تعديل بيانات الكفيل
											</a>
											
											<?php /*<a class="dropdown-item" href="{{ route('customers.destroy',$customers->car->customer_id) }}" >
												<i class="text-danger las la-trash"></i>      &nbsp;&nbsp; حذف                                 
											</a>*/ ?>
											@if($user->hasAnyRole(['superAdmin','admin']))
											<form action="{{  route('customers.destroy',$customers->car->customer_id) }}" method="post">
												{{ method_field('delete') }}
												{{ csrf_field() }}
												<a onclick="return confirm(&quot;هل انت متأكد من عملية الحذف؟.&quot;)" >
												  <button class="dropdown-item" type="submit" ><i class="text-danger las la-trash"></i>  حذف</button>
												</a>	
											</form>
											@endif
										</div>
								</div>
						@endif 
					    </td>
                               <td>
							   <div class="dropdown">
									<button aria-expanded="false" aria-haspopup="true"
										class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
										type="button">المزيد  <i class="fas fa-caret-down ml-1"></i></button>
									<div class="dropdown-menu tx-14">
									<a class="dropdown-item" href="{{ route('customers.show',$customers->id) }}" >
												<i class="text-primary fas fa-eye"></i>&nbsp;&nbsp;
												جميع التفاصيل
											</a>
											
											<a class="dropdown-item" href="{{ route('reports.show',$customers->id) }}" >
												<i class="text-info fas fa-eye"></i>&nbsp;&nbsp;
													بيانات صاحب العربة
											</a>		

											<a class="dropdown-item" href="{{route('carReport', $customers->id) }}">
												<i class=" text-success fas fa-eye"></i>&nbsp;&nbsp; 
													بيانات العربة 
												</a>

											<a class="dropdown-item" href="{{ route('luggagesReport', $customers->id) }}" >
												<i class="text-warning fas fa-eye"></i>&nbsp;&nbsp;
												كشف عفش
											</a>
							   </div>
							</div>
							</td>  
									
                                </tr>
                            @endforeach
										</tbody>
									</table>
									<?php /*     <td>
                               <form method="POST" action="{{ route('customers.destroy', $customers->id) }}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}   
									 <a href="{{ route('customers.show', $customers->id ) }}" class="btn btn-success" title="Show Customers">
									 <i class="las la-eye"></i></a>
                                     <a href="{{ route('customers.edit', $customers->id ) }}" class="btn btn-info" title="Show Customers">
									 <i class="las la-pen "></i></a>
									   <button type="submit" class="btn btn-danger" title="Delete Customers" onclick="return confirm(&quot;هل انت متأكد من عملية الحذف؟.&quot;)">
											<i class="las la-trash"></i>                                       
									  </button>
								 </form>	
								 
								 
                                    </td>
									*/ ?>
								</div>

								<?php
								$coun=$customersObjects->currentPage()-2;
								$perpage=$customersObjects->count()*$customersObjects->currentPage();
								?>
								  Showing {{ $perpage-$customersObjects->count() }} to {{ $perpage }} of {{ $customersObjects->total() }} entries

								{{-- Pagination --}}
								<div class="d-flex justify-content-center">
									{!! $customersObjects->links() !!}
								
								</div>


							</div>
						</div>
                        @endif
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
<script src="{{ asset('js/plugin.js') }}" defer></script>

<!-- Internal Data tables -->
<!--<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
--<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>--
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
--Internal  Datatable js --
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>-->
@endsection