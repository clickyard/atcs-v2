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

use Illuminate\Support\Facades\DB;

//use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'addMore.*.cblock' => 'required|string|min:1|max:900',
            'addMore.*.chouseNo' => 'required|string|min:1|max:100',
            'addMore.*.cstreet' => 'required|string|min:1|max:900',
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
                'nationalityNo' => 'required|string|min:1',
                'passport' => 'required|string|min:1|max:100',
                'passportDate' => 'required',
                'residenceNo' => 'required|string|min:1',
                'residenceDate' => 'required',
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

        
        $data = $request->validate($rules);




        return $data;
    }
    // get car data
    protected function getData_car(Request $request)
    {
        $rules = [
            'veh_id' => 'required',
            'mark_id' => 'required',
            'place_id' => 'required',
            'plateNo' => 'required|string|min:1',
            'valueUsd' => 'nullable|numeric|min:-999999.99|max:999999.99',
            'machineNo' => 'nullable|string|min:1',
            'chassisNo' => 'required|string|min:1',
            'color' => 'required|string|min:1',
            'year' => 'nullable|string|min:1',
        
        ];

        
        $data = $request->validate($rules);




        return $data;
    }
    // get emport data

    protected function getData_emport(Request $request)
    {
        $rules = [
            'ship_id' => 'nullable',
            'port_id' => 'required',
            'portAccess_id' => 'nullable',
            'carnetNo' => 'required|string|min:1',
            'destination' => 'required|string|min:1|max:100',
            'shippingAgent' => 'nullable|string|min:1|max:100',
           'deliveryPerNo' => 'nullable|string|min:1',
            'issueDate' => 'nullable',
           'expiryDate' => 'nullable|date|',
            'entryDate' => 'nullable|date',
           'exitDate' => 'nullable|date'
         
        ];

        
        $data = $request->validate($rules);




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

        
        $data = $request->validate($rules);




        return $data;
    }
   

}
