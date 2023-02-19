<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Vehicles;
use App\Models\Customers;
use App\Models\Guarantors;
use App\Models\Emportcars;
use App\Models\Ships;
use App\Models\increase_files;
use App\Models\Shippingports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class EmportcarsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the emportcars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        /*
          return Event::with(['city.companies.persons' => function ($query) {
                $query->select('id', '...');
            }])->get();
         */
       $emportcarsObjects = Emportcars::with(['customer:id,name','customer.car'])->paginate(25);

        return view('emportcars.index', compact('emportcarsObjects'));
    }
  

////////////////////////////////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new emportcars.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Cars = Car::pluck('plateNo','id')->all();
$Customers = Customer::pluck('name','id')->all();
$Ships = Ship::pluck('name','id')->all();
$Shippingports = Shippingport::pluck('id','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
        
        return view('emportcars.create', compact('Cars','Customers','Ships','Shippingports','Shippingports','creators','updaters'));
    }

    /**
     * Store a new emportcars in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['created_by'] = Auth::Id();
            Emportcars::create($data);

            return redirect()->route('emportcars.emportcars.index')
                ->with('success_message', trans('emportcars.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('emportcars.unexpected_error')]);
        }
    }

    /**
     * Display the specified emportcars.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
             // $id=71;
          //  $report = Customers::all();
            $customers = Emportcars::with('Shippingport','Ship','car','customer')->findOrFail($id);

            return view('reports.details', compact('customers'));
  
    }

    /**
     * Show the form for editing the specified emportcars.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $emportcars = Emportcars::findOrFail($id);
       // $Vehicle = Vehicles::all();
        $Ships = Ships::all();

        $Shippingports = Shippingports::all();


        return view('emportcars.edit', compact('emportcars','Ships','Shippingports'));
    }

    /**
     * Update the specified emportcars in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
       // try {
            
            $data = $this->getData($request);
            $data['updated_by'] = Auth::Id();
            $emportcars = Emportcars::findOrFail($id);
            $emportcars->update($data);

            return redirect()->route('customers.show',$id)
                ->with('success_message', trans('emportcars.model_was_updated'));
      //  } catch (Exception $exception) {

          //  return back()->withInput()
          //      ->withErrors(['unexpected_error' => trans('emportcars.unexpected_error')]);
      //  }        
    }

    /**
     * Remove the specified emportcars from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    

    public function destroy($id)
    {
     //   try {
            // $emportcars = Emportcars::findOrFail($id);
             $emportcars = Emportcars::where('id', $id)->update([
                 'status' => 2,
                 'status_value' => 'غادرت ',
                 'updated_by'=>Auth::Id()
             ]);
 
             return redirect()->route('leavingCarsReport')
                 ->with('success_message', trans('emportcars.model_was_updated'));
        // } catch (Exception $exception) {
 
        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' => trans('emportcars.unexpected_error')]);
        // }
    }

 ////////////////////////////////////////////////////////////////////////////////////////////////

 
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'car_id' => 'required',
            'ship_id' => 'nullable',
            'port_id' => 'required',
            'portAccess_id' => 'nullable',
            'carnetNo' => 'required|string|min:1',
            'destination' => 'required|string|min:1|max:100',
            'shippingAgent' => 'nullable|string|min:1|max:100',
            'deliveryPerNo' => 'nullable|string|min:1',
           // 'deliveryPerDate' => 'required|date',
          //  'arrivedDate' => 'required|date',
            'issueDate' => 'required|date',
            'expiryDate' => 'nullable|date',
            'entryDate' => 'nullable|date',
            'exitDate' => 'nullable|date',
            'updated_by' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
