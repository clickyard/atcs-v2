<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car_marks;
use App\Models\Cars;
use App\Models\Countries;
use App\Models\Customers;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CarsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the cars.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $carsObjects = Cars::with('Vehicle','carmark','country','customer.emportcar')->paginate(25);

        return view('cars.index', compact('carsObjects'));
    }

    /**
     * Show the form for creating a new cars.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Vehicles = Vehicles::pluck('name','id')->all();
$CarMarks = CarMarks::pluck('name','id')->all();
$Countries = Countries::pluck('name','id')->all();
$Customers = Customers::pluck('name','id')->all();

        
        return view('cars.create', compact('Vehicles','CarMarks','Countries','Customers'));
    }

    /**
     * Store a new cars in the storage.
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
            Cars::create($data);

            return redirect()->route('cars.index')
                ->with('success_message', trans('cars.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('cars.unexpected_error')]);
        }
    }

    /**
     * Display the specified cars.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $cars = Cars::with('vehicle','carmark','country','customer')->findOrFail($id);

        return view('cars.show', compact('cars'));
    }

    /**
     * Show the form for editing the specified cars.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $cars = Cars::findOrFail($id);
        $Vehicles = Vehicles::pluck('name','id')->all();
$CarMarks = Car_marks::pluck('name','id')->all();
$Countries = Countries::pluck('name','id')->all();
$Customers = Customers::pluck('name','id')->all();

        return view('cars.edit', compact('cars','Vehicles','CarMarks','Countries','Customers'));
    }

    /**
     * Update the specified cars in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['updated_by'] =Auth::user()->name;
            $cars = Cars::findOrFail($id);
            $cars->update($data);

           
           
            if(Auth::user()->hasrole('extoffice'))   
            return redirect()->route('intarnals')
                ->with('success_message', trans('customers.model_was_updated'));
        else 
            return redirect()->route('customers.index')
                ->with('success_message', trans('cars.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('cars.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified cars from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $cars = Cars::findOrFail($id);
            $cars->delete();

            return redirect()->route('cars.index')
                ->with('success_message', trans('cars.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('cars.unexpected_error')]);
        }
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
            'veh_id' => 'required',
            'mark_id' => 'required',
            'place_id' => 'required',
            'plateNo' => 'required|string|min:1',
            'valueUsd' => 'required|numeric|min:-999999.99|max:999999.99',
            'machineNo' => 'required|string|min:1',
            'chassisNo' => 'required|string|min:1',
            'color' => 'required|string|min:1|max:16',
           
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
