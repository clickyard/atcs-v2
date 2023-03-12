<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Customers;
use App\Models\States;
use App\Models\Cars;
use App\Models\Ships;
use App\Models\Shippingports;
use App\Models\Emportcars;
use App\Models\Vehicles;
use App\Models\Car_marks;
use App\Models\Custrefrances;
use App\Models\Guarantors;


use App\Models\Leavingcars;
use App\Models\Takhlees;
use App\Models\Revenues;
use App\Models\Amounts;
use App\Models\SerialNumber;

use Illuminate\Support\Facades\DB;

//use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

//use Exception;

class CustomersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the customers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {      $user = Auth::user();

        $type ='';
       if($user->hasAnyRole(['extoffice','agent'])){

        $customersObjects = Emportcars::where('status','0')->with(['car:id,chassisNo,customer_id','customer:name'])
                    ->orderBy('issueDate','desc')
                         ->Paginate(10);
        } else  {               
        $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                         ->orderBy('issueDate','desc')
                              ->Paginate(10);        
        }
        return view('customers.index', compact('customersObjects','type'));
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
public function markibat( Request $request)
{
    // $Date=date('Y-m-d'); 
    //  $newdate=date('Y-m-d', strtotime($Date. ' - 15 days'));

    $data = Emportcars::where('exitDate', '<',  date('Y-m-d')  )->where('status', 1  )->update([
        'status' => 3,
        'status_value' => 'متخلفة ',
    ]);
    
    //  return $newdate;
    $customersObjects=array();
    $title="";
    $excelsheet="no";
    $type =$request->type;


   switch ($type) {

            case 1:
                $title="مركبات واصلة";
                $customersObjects=Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                                ->where('status', 0  )
                                ->orderBy('issueDate','desc')
                                ->Paginate(10);
              //  return json_encode($customersObjects);
                return view('customers.index', compact('customersObjects','type','title'));

            break;
            case 2:
                $title=" مركبات بالداخل";

                $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                        ->where('status', 1  )
                        ->orderBy('issueDate','desc')
                        ->Paginate(10);
                return view('customers.index', compact('customersObjects','type','title'));
                break; 
            case 3:
                $title="مركبات بالداخل ومتبقي المدة لها اقل من 15يوم";
                $Date=date('Y-m-d'); 
                $newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));
                $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                                    ->where('status', 1  )
                                    ->where('exitDate', '<=',  $newdate  )
                                    ->orderBy('issueDate','desc')
                                    ->Paginate(10);
                //return json_encode($customersObjects);
                return view('customers.index', compact('customersObjects','type','title'));
                break;
            case 4:
                $title="مركبات متخلفة عن المغادرة ";
              
                $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                                ->where('status', 3 )
                                ->where('exitDate', '<',  date('Y-m-d') )
                                ->Paginate(10);
                return view('customers.index', compact('customersObjects','type','title'));
                 break;  
          
           case 5:
                    $title="مركبات غادرت";
    
                    $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                                    ->where('status', 2 )
                                    ->Paginate(10);
                    return view('customers.index', compact('customersObjects','type','title'));
                     break;  
          case 6:
                    $title="مركبات تم تخليصها ";
    
                    $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                                    ->where('takhlees', 1)
                                    ->Paginate(10);
                    return view('customers.index', compact('customersObjects','type','title'));
                        break;    
        case 7:
            $title="مركبات تم تمديدها ";

            $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                            ->where('increase', 1 )
                            ->Paginate(10);
            return view('customers.index', compact('customersObjects','type','title'));
                break; 
    case 8:
        $title="مركبات  مخالفة ";

        $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                        ->where('alerts', 1 )
                        ->Paginate(10);
        return view('customers.index', compact('customersObjects','type','title'));
            break;                                                                     
            default:
                //  return $customersObjects;
                return view('customers.index', compact('customersObjects','type','title'));
  
    }
}
    /**
     * Show the form for creating a new customers.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        $sd = Countries::where('code', '=',  'sd' )->orwhere('code', '=',  'SD' )->first()->id;
        $sa = Countries::where('code', '=',  'sa' )->orwhere('code', '=',  'SA' )->first()->id;

        $Countries = Countries::all();
        $States = States::all();

        $cusCountries = Countries::where('code', '=',  'sd' )->orwhere('code', '=',  'SD' )->get();
        $gCountries = Countries::where('code', '!=',  'sd' )->where('code', '!=',  'SD' )->get();
       
        $SaStates = States::where('country_id', '=',  $sa )->get();
        $sdStates = States::where('country_id', '=',  $sd )->get();
       
        $Cars = Cars::all();
        $vehicles = Vehicles::all();
        $marks = Car_marks::all();
        $Ships = Ships::all();
        $Shippingports = Shippingports::all();
       // $guarantors = guarantors::all();
        return view('customers.create', compact('Countries','States','sdStates','SaStates','vehicles','Ships','Shippingports','marks','gCountries','cusCountries'));
    }

    /**
     * Store a new customers in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function emportExcel()
    {
       // $select = DB::select('select * from execlsheet ', array(1));
       $excel_status = DB::table('excelstatus')
        ->select('*')   
        ->first();

          
        if ($excel_status->status == 0){
           

            return   redirect()->route('customers.index')
                        ->with('success_message', 'لقد تم رفع الملف سابقاً');
        } else{

        $select = DB::table('execlsheet')
        ->select('*')   
       // ->where('id',14)
        ->get();
/*
        SELECT  `carnetNo`,`carnetDate`,`name`,`nationalityNo`,`carType`,`chassisNo`,
       `entrydate`,`tel1`,`tel2`,`entryType`,`increse1`,`increse2`,`leavingIncrese`,
       `leavingDate`,`status`
*/
$sd = Countries::where('code', '=',  'sd' )->orwhere('code', '=',  'SD' )->first()->id;
$sa = Countries::where('code', '=',  'sa' )->orwhere('code', '=',  'SA' )->first()->id;

//$date = Carbon::now()->setTime(0,0)->format('Y-m-d');
$date = '0000-00-00';

foreach ($select as $value){
            Customers::create( [
                'name' => $value->name,
                'nationalityNo'=>$value->nationalityNo,
                'passport'=>'لا يوجد',
                'residenceNo'=>'0',
                'passportDate'=>$date,
                'residenceDate'=>$date,
                'country_id'=>'1',
                'state_id'=>'1',
                'city'=>'لا يوجد',
                'tel'=>$value->tel1,
                'tel2'=>$value->tel2,
                'processType'=>'emp',
                'created_by'=>Auth::user()->name
            ]  );
       
         $cust_id = Customers::latest()->first()->id;
/////////////////////////////////////////////////////////////////////////////////////

for($i=0;$i<2;$i++){
    Custrefrances::create( [
        'customer_id' => $cust_id,
        'ccountry_id'=>$sd,
        'cname'=>'لا يوجد',
        'cstate_id'=>'1',
        'ccity'=>'لا يوجد',
        'cblock'=>'لا يوجد',
        'chouseNo'=>'لا يوجد',
        'cstreet'=>'لا يوجد',
        'cwork_address'=>'لا يوجد',
        'ctel'=>'لا يوجد',
        'created_by'=>Auth::user()->name

    ]);
}
///////////////////////////////////////////////////////////////////////////////////////
Guarantors::create([
            'customer_id' => $cust_id,
            'gname' =>'لا يوجد',
            'gcountry_id' => $sa,
            'gstate_id' => 4,
            'gcity' => 'لا يوجد',
            'ghouseNo' => 'لا يوجد',
            'gstreet' =>'لا يوجد',
            'gwork_address' => 'لا يوجد',
            'gtel' =>$value->tel2,
            'gtel2' => 'لا يوجد',
            'gwhatsup' => 'لا يوجد',
            'created_by'=>Auth::user()->name
]);
//////////////////////////////////////////////////////////////////////////////////////
         Cars::create( [
            'plateNo' => 'لا يوجد',
            'carType' => $value->carType,
            'chassisNo' => $value->chassisNo,
            'customer_id' => $cust_id,
            'created_by'=>Auth::user()->name
        
        ]);
        $car_id = Cars::latest()->first()->id;
        ////////////////////////////////////////////////////////////////////////////////
        $takhlees=0;
        $allow_increase=1;
      if($value->status ==1)
            $status_value="بالداخل";
      else if($value->status ==2){ $status_value="غادر"; $allow_increase=0;}
      else if($value->status ==5){ $status_value="خلص"; $takhlees=1;  $allow_increase=0;}
      else if($value->status ==6){ $status_value="مخالفة دفتر"; $allow_increase=0;}
       
        $expiryDate=date('Y-m-d', strtotime($value->carnetDate. ' + 12 months'));
        $entrydate=date('Y-m-d', strtotime($value->entrydate));

        Emportcars::create( [
            'port_id' => 1,
            'carnetNo' => $value->carnetNo,
            'destination' => 'لا يوجد',
            'issueDate' => $value->carnetDate,
            'expiryDate' => $expiryDate,
            'entryDate' => $entrydate,
            'status'  =>  $value->status,
            'allow_increase'  =>$allow_increase,
            'increase'  =>0 ,
            'duration' =>3,
            'alerts' =>0,
            'takhlees'=>$takhlees,
            'status_value'=>$status_value,
            'car_id' => $car_id,
            'created_by'=>Auth::user()->name 
        ]);
        $emp_id = Emportcars::latest()->first()->id;
/// ////////////////////////////////////////////////////////////////////////////////
$amount=Amounts::firstOrFail();
    
Revenues::create([
      'carnetNo' => $value->carnetNo,
      'emp_id' => $emp_id,
      'carnet' => $amount->carnet,
      'portsudan' => 0,
      'increase' => 0,
      'takhlees' => 0,
      'created_by' => Auth::user()->name

  ]); 
////////////////////////////////////////////////////////////////////////////////////
        if($value->status==2) {
            $no=SerialNumber::firstOrFail();
            $count = Leavingcars::count();
            $seri=$count+1;
             $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");
            Leavingcars::create( [
                'serialNo' => $serialNo,
                'voucher' => $no->voucherNo+1,
                'entryDate'=>$value->entryType,
                'exitDate'=>$value->leavingDate,
                'signature' =>Auth::user()->name,
                'emp_id'=>$emp_id
            ]);
            SerialNumber::where('id', $no->id)->update([
                'voucherNo' => $no->voucherNo+1,
           ] );

        }else  if($value->status ==5) {
            
                $no=SerialNumber::firstOrFail();
                $count = Takhlees::count();
                $seri=$count+1;
                $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");

                    Takhlees::create([
                        'serialNo' => $serialNo,
                        'voucher' => $no->voucher+1,
                        'entryDate'=>Date('Y-m-d'),
                        'signature' =>Auth::user()->name,
                        'emp_id'=>$emp_id
                    ]);
                  
                    $amount = Amounts::firstOrFail();
                    $takhlees=($amount->letter + $amount->moanye);

                    Revenues::where('emp_id',$emp_id)->update([
                        'takhlees' =>$takhlees,
                        'updated_by' => Auth::user()->name
                    ]);

                    SerialNumber::where('id', $no->id)->update([
                        'voucherNo' => $no->voucherNo+1,
                ] );


        }
        if($value->increse1 ==1 ){

            $amount = Amounts::firstOrFail();
            $revenues = Revenues::where('emp_id', $emp_id)->first();
            $increase=($amount->increase + $revenues->increase);
    
            Revenues::where('emp_id',$emp_id)->update([
                'increase' =>$increase,
                'updated_by' => Auth::user()->name
            ]);

        }
        if($value->increse2 ==1 ){

            $amount = Amounts::firstOrFail();
            $revenues = Revenues::where('emp_id', $emp_id)->first();
            $increase=($amount->increase + $revenues->increase);
    
            Revenues::where('emp_id',$emp_id)->update([
                'increase' =>$increase,
                'updated_by' => Auth::user()->name
            ]);

        }
        if($value->leavingIncrese ==1 ){

            $amount = Amounts::firstOrFail();
            $revenues = Revenues::where('emp_id', $emp_id)->first();
            $increase=($amount->increase + $revenues->increase);
    
            Revenues::where('emp_id',$emp_id)->update([
                'increase' =>$increase,
                'updated_by' => Auth::user()->name
            ]);

        }
    }
    // $excelsheet= "no";
     DB::table('excelstatus')
        ->update(array('status' => 0));
        return redirect()->route('customers.index')
        ->with('success_message', 'لقد تم رفع الملف بنجاح');
}
}
    /////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {


       //return  $request;
     //   try {
            
            // insert customer data
            $sd = Countries::where('code', '=',  'sd' )->orwhere('code', '=',  'SD' )->first()->id;

            $data = $this->getData($request);
            $data['created_by'] =Auth::user()->name;
            $data['country_id'] = $sd;
            $data['processType'] = "emp";
         

/////////////////////////////////////////////////////////////////////////////////////
            //insert car data
            $data_car = $this->getData_car($request);
            $data_car['created_by'] = Auth::user()->name;
           // return  $data_car;
          
////////////////////////////////////////////////////////////////////////////////////////////
            // stor emp carnet
            $data_emp = $this->getData_emport($request);
            $data_emp['allow_increase']=1;
            $data_emp['increase']=0;
            $data_emp['duration'] =3;
            $data_emp['status'] = 0;
            $data_emp['alerts'] = 0;
            $data_emp['takhlees'] = 0;
            $data_emp['status_value'] = 'واصلة';
            $data_emp['created_by'] = Auth::user()->name;           
    
          
/////////////////////////////////////////////////////////////////////////////////////////////
            // stor emguarantors 

          $data_gua = $this->getData_gua($request);
            $data_gua['created_by'] = Auth::user()->name;           
       
          //  return  $data_gua;
////////////////////////////////////////////////////////////////////////////////////

// store custmoer refrances
$cus_ref= $request->validate([
            'addMore.*.cname' => 'required|string|min:1|max:400',
            'addMore.*.cstate_id' => 'required',
            'addMore.*.ccity' => 'required|string|min:1|max:900',
            'addMore.*.cblock' => '|nullable|min:1|max:900',
            'addMore.*.chouseNo' => 'nullable|string|min:1|max:100',
            'addMore.*.cstreet' => 'nullable|string|min:1|max:900',
            'addMore.*.cwork_address' => 'required|string|min:1|max:900',
            'addMore.*.ctel' => 'required|string|min:1'
]);
////////////////////////////////////////////////////////////////////////
if($data && $data_car && $data_emp && $data_gua && $cus_ref){
        Customers::create($data);
        $cust_id = Customers::latest()->first()->id;
        $data_car['customer_id'] = $cust_id;
        $data_gua['customer_id'] = $cust_id;


        Cars::create($data_car);
        $car_id = Cars::latest()->first()->id;

        $data_emp['car_id'] = $car_id;
      
        Emportcars::create($data_emp); 
        $emp = Emportcars::latest()->firstOrFail();

        Guarantors::create($data_gua); 

        foreach ($request->addMore as $key => $value) {
        Custrefrances::create( [
                    'customer_id' => $cust_id,
                    'ccountry_id'=>$sd,
                    'cname'=>$value['cname'],
                    'cstate_id'=>$value['cstate_id'],
                    'ccity'=>$value['ccity'],
                    'cblock'=>$value['cblock'],
                    'chouseNo'=>$value['chouseNo'],
                    'cstreet'=>$value['cstreet'],
                    'cwork_address'=>$value['cwork_address'],
                    'ctel'=>$value['ctel'],
                    'created_by'=>Auth::user()->name
                ]  );
        }

       
       
        $amount=\App\Models\Amounts::firstOrFail();
    
        \App\Models\Revenues::create([
              'carnetNo' => $emp->carnetNo,
              'emp_id' => $emp->id,
              'carnet' => $amount->carnet,
              'portsudan' => 0,
              'increase' => 0,
              'takhlees' => 0,
              'created_by' => Auth::user()->name

          ]); 
}
      

          return redirect()->route('customers.show',$emp->id)
            ->with('success_message', trans('customers.model_was_added'));
  //      } catch (Exception $exception) {

     //       return back()->withInput()
     //          ->withErrors(['unexpected_error' => trans('customers.unexpected_error')]);
     //   }
    }

    /**
     * Display the specified customers.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
       // $customers = Customers::with('country','state','creator','updater')->findOrFail($id);
        $customers= Emportcars::where('id',$id)
        ->with(['customer','car','mytakhlees','myincreases','myleavingcars','myalerts'])
        ->firstOrFail();

        //return  $customers;
        return view('customers.show', compact('customers'));
    }

    /**
     * Show the form for editing the specified customers.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $sd = Countries::where('code', '=',  'sd' )->orwhere('code', '=',  'SD' )->first()->id;

        $customers = Customers::findOrFail($id);
        $sdStates = States::where('country_id', '=',  $sd )->get();

        return view('customers.edit', compact('customers','sdStates'));
    }

    /**
     * Update the specified customers in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
      //  try {
        $sd = Countries::where('code', '=',  'sd' )->orwhere('code', '=',  'SD' )->first()->id;

            $data = $this->getData($request);
            $data['updated_by'] = Auth::user()->name;
            $customers = Customers::findOrFail($id);
            $customers->update($data);
            foreach ($request->addMore as $key => $value) {
                Custrefrances::where('id','=',$value['ref_id'])->update( [
                            'customer_id' => $id,
                            'ccountry_id'=>$sd,
                            'cname'=>$value['cname'],
                            'cstate_id'=>$value['cstate_id'],
                            'ccity'=>$value['ccity'],
                            'cblock'=>$value['cblock'],
                            'chouseNo'=>$value['chouseNo'],
                            'cstreet'=>$value['cstreet'],
                            'cwork_address'=>$value['cwork_address'],
                            'ctel'=>$value['ctel'],
                            'updated_by'=>Auth::user()->name
                        ]  );
                }

            if(Auth::user()->hasrole('extoffice'))   
                return redirect()->route('intarnals')
                    ->with('success_message', trans('customers.model_was_updated'));
            else  
                 return redirect()->route('customers.index')
                    ->with('success_message', trans('customers.model_was_updated'));
        //} catch (Exception $exception) {

         //   return back()->withInput()
           //     ->withErrors(['unexpected_error' => trans('customers.unexpected_error')]);
       // }        
    }

    /**
     * Remove the specified customers from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       // try {
            $customers = Customers::findOrFail($id);
            $customers->delete();

            return redirect()->route('customers.index')
                ->with('success_message', trans('customers.model_was_deleted'));
       // } catch (Exception $exception) {

        //    return back()->withInput()
         //       ->withErrors(['unexpected_error' => trans('customers.unexpected_error')]);
       // }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:400',
                'nationalityNo' => 'required|unique:customers|string|min:1',
                'passport' => 'required|unique:customers|string|min:1|max:100',
                'passportDate' => 'nullable',
                'residenceNo' => 'required|unique:customers|string|min:1',
                'residenceDate' => 'nullable',
                'state_id' => 'required',
                'city' => 'required|string|min:1|max:900',
                'block' => 'nullable|string|min:1|max:900',
                'houseNo' => 'nullable|string|min:1|max:100',
                'street' => 'nullable|string|min:1|max:900',
                'work_address' => 'nullable|string|min:1|max:900',
                'tel' => 'required|string|min:1',
                'tel2' => 'nullable|string|min:0',
                'email' => 'nullable|string|min:1|max:400',
                'whatsup' => 'nullable|string|min:0',
          
        ];
        
       $massage= [
            'name.required' =>'يرجى ادخال اسم العميل ',
            'nationalityNo.required' =>'يرجى ادخال  الرقم الوطني ',
            'passport.required' =>'يرجى ادخال رقم الجواز ',
           // 'passportDate.required' =>'يرجى ادخال تاريخ الجواز ',
            'residenceNo.required' =>'يرجى ادخال رقم الإقامة ',
           // 'residenceDate.required' =>'يرجى ادخال تاريخ انتهاء الاقامة ',
            'state_id.required' =>'يرجى ادخال اسم المدينة للعميل ',
            'city.required' =>'يرجى ادخال اسم المنطقة للعميل ',
            'tel.required' =>'يرجى ادخال رقم هاتف العميل ',

            'nationalityNo.unique' =>'هذا الرقم الوطني  مسجل مسبقا ',
            'passport.unique' =>'  هذا الجواز  مسجل مسبقا ',
            'residenceNo.unique' =>'هذه  الإقامة  مسجلة مسبقا ',


  
  
         ];

        
        $data = $request->validate($rules,$massage);




        return $data;
    }
    // get car data
    protected function getData_car(Request $request)
    {
        $rules = [
            'veh_id' => 'required',
            'mark_id' => 'required',
            'place_id' => 'required',
            'plateNo' => 'required|unique:cars|string|min:1',
            'valueUsd' => 'nullable|numeric|min:-999999.99|max:999999.99',
            'machineNo' => 'required|unique:cars|string|min:1',
            'chassisNo' => 'required|unique:cars|string|min:1',
            'color' => 'nullable|string|min:1',
            'year' => 'nullable|string|min:1',
        
        ];
        $massage= [
            'veh_id.required' =>'يرجى ادخال  السيارة ',
            'mark_id.required' =>'يرجى ادخال  ماركة السيارة ',
            'place_id.required' =>'يرجى  بلد تسجيل السيارة ',
            'machineNo.required' =>'يرجى ادخال رقم الماكنة ',
            'plateNo.required' =>'يرجى ادخال رقم اللوحة ',
            'chassisNo.required' =>'يرجى ادخال رقم  الشاسي ',
          

            'machineNo.unique' =>'رقم هذه الماكنة مسجل مسبقا ',
            'chassisNo.unique' =>'  رقم هذا الشاسي  مسجل مسبقا ',
            'plateNo.unique' =>'رقم هذه اللوحة مسجل مسبقا ',


  
  
         ];
        
        $data = $request->validate($rules,$massage);




        return $data;
    }
    // get emport data

    protected function getData_emport(Request $request)
    {
        $rules = [
            'ship_id' => 'nullable',
            'port_id' => 'required',
            'portAccess_id' => 'nullable',
            'carnetNo' => 'required|unique:emportcars|string|min:1',
            'destination' => 'required|string|min:1|max:100',
            'shippingAgent' => 'nullable|string|min:1|max:100',
           'deliveryPerNo' => 'nullable|string|min:1',
            'issueDate' => 'nullable',
           'expiryDate' => 'nullable|date|',
            'entryDate' => 'nullable|date',
           'exitDate' => 'nullable|date'
         
        ];

        $massage= [
            'carnetNo.required' =>'يرجى ادخال  رقم الدفتر ',
            'destination.required' =>'يرجى ادخال جهة القدوم  ',
            'port_id.required' =>'يرجى ادخال ميناء الشحن ',
          

            'carnetNo.unique' =>'رقم هذا الدفتر مسجل مسبقا ',


  
  
         ];
        $data = $request->validate($rules,$massage);




        return $data;
    }



    protected function getData_gua(Request $request)
    {
        $rules = [
             'gname' => 'required|string|min:1|max:400',
            'gcountry_id' => 'required|numeric|min:0',
            'gstate_id' => 'required',
            'gcity' => 'required|string|min:1|max:900',
            'ghouseNo' => 'nullable|string|min:1|max:100',
            'gstreet' => 'nullable|string|min:1|max:900',
            'gwork_address' => 'nullable|string|min:1|max:900',
            'gtel' => 'required|string|min:1',
            'gtel2' => 'nullable|string|min:0',
            'gwhatsup' => 'nullable|string|min:0',
        
        ];

        $massage= [
            'gname.required' =>'يرجى ادخال  اسم الكفيل ',
            'gcountry_id.required' =>'يرجى ادخال دولة الكفيل  ',
            'gstate_id.required' =>'يرجى ادخال مدينة الكفيل ',
            'gcity.required' =>'يرجى ادخال منطقة الكفيل ',
            'gtel.required' =>'يرجى ادخال رقم هاتف الكفيل '

  
  
         ];
        $data = $request->validate($rules,$massage);


        return $data;
    }
   

}
