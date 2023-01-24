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
    {
      /*

     $latestempcarts = DB::table('emportcars')
        ->select('car_id', DB::raw('MAX(entryDate) as entryDate'))
        ->groupBy('car_id');
     //   return $latestempcarts;
/*
        $users = DB::table('users')
        ->joinSub($latestPosts, 'latest_posts', function ($join) {
            $join->on('users.id', '=', 'latest_posts.user_id');
        })->get();

        $customersObjects = DB::table('cars')
        ->joinSub($latestempcarts, 'latestempcarts', function ($join) {
            $join->on('cars.id', '=', 'latestempcarts.car_id');
        })
        ->join('customers','cars.cus_id',  '=', 'customers.id')
        ->select('customers.id','customers.name','customers.nationalityNo', 'cars.id as car_id', 'cars.chassisNo','latestempcarts.id as emp_id','latestempcarts.carnetNo')
        ->get();
        */
     //   return $customersObjects;
/*

        $customersObjects = DB::table('customers')
            ->join('cars', 'customers.id', '=', 'cars.cus_id')
            ->join('emportcars', 'cars.id', '=', 'emportcars.car_id')
            ->where('emportcars.entryDate','max(emportcars.entryDate)')
            ->select('customers.*', 'cars.id as car_id', 'cars.chassisNo', 'emportcars.id as emp_id','emportcars.carnetNo')
            ->orderBy('emportcars.entryDate','desc')->Paginate(5);
*/
        $customersObjects = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])
                                        ->Paginate(10);
       // ->orderBy('entryDate','desc');
    //    return $customersObjects;
        //    Emportcars::join('Cars','Emportcars.car_id','=', 'Cars.id')->max('entryDate')->select('entryDate'),
             //   ->whereColumn('Emportcars.car_id', 'Cars.id'),
          //  'desc'
       // )->Paginate(5);

      //  $customersObjects = Customers::with(['emportcar','car'])->orderBy('created_at', 'desc')->Paginate(5);
    // return $customersObjects;
        return view('customers.index', compact('customersObjects'));
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
            $data['created_by'] = Auth::Id();
            $data['country_id'] = $sd;
            $data['processType'] = "emp";
         

/////////////////////////////////////////////////////////////////////////////////////
            //insert car data
            $data_car = $this->getData_car($request);
            $data_car['created_by'] = Auth::Id();
           // return  $data_car;
          
////////////////////////////////////////////////////////////////////////////////////////////
            // stor emp carnet
            $data_emp = $this->getData_emport($request);
            $data_emp['allow_increase']=1;
            $data_emp['increase']=0;
            $data_emp['duration'] = 0;
            $data_emp['status'] = 0;
            $data_emp['alerts'] = 0;
            $data_emp['takhlees'] = 0;
            $data_emp['status_value'] = 'واصلة';
            $data_emp['created_by'] = Auth::Id();           
    
          
/////////////////////////////////////////////////////////////////////////////////////////////
            // stor emguarantors 

          $data_gua = $this->getData_gua($request);
            $data_gua['created_by'] = Auth::Id();           
       
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
        $data_gua['cus_id'] = $cust_id;


        Cars::create($data_car);
        $car_id = Cars::latest()->first()->id;

        $data_emp['car_id'] = $car_id;


        Emportcars::create($data_emp);  
        Guarantors::create($data_gua); 

        foreach ($request->addMore as $key => $value) {
        custrefrances::create( [
                    'cus_id' => $cust_id,
                    'ccountry_id'=>$sd,
                    'cname'=>$value['cname'],
                    'cstate_id'=>$value['cstate_id'],
                    'ccity'=>$value['ccity'],
                    'cblock'=>$value['cblock'],
                    'chouseNo'=>$value['chouseNo'],
                    'cstreet'=>$value['cstreet'],
                    'cwork_address'=>$value['cwork_address'],
                    'ctel'=>$value['ctel'],
                    'created_by'=>Auth::Id()
                ]  );
        }
}
      

          return redirect()->route('customers.index')
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
        $customers = Customers::with('country','state','creator','updater')->findOrFail($id);

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
            
            $data = $this->getData($request);
            $data['updated_by'] = Auth::user()->name;
            $customers = Customers::findOrFail($id);
            $customers->update($data);

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
            'ship_id' => 'required',
            'port_id' => 'required',
            'portAccess_id' => 'required',
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
