<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use App\Models\State;
use App\Models\custrefrances;
use Illuminate\Http\Request;
use Exception;

class CustrefrancesController extends Controller
{

    /**
     * Display a listing of the custrefrances.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $custrefrancesObjects = custrefrances::paginate(25);

        return view('custrefrances.index', compact('custrefrancesObjects'));
    }

    /**
     * Show the form for creating a new custrefrances.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Countries = Country::pluck('name','id')->all();
$States = State::pluck('name','id')->all();
$ccreatedBies = CcreatedBy::pluck('id','id')->all();
$cupdatedBies = CupdatedBy::pluck('id','id')->all();
$Customers = Customer::pluck('name','id')->all();
        
        return view('custrefrances.create', compact('Countries','States','ccreatedBies','cupdatedBies','Customers'));
    }

    /**
     * Store a new custrefrances in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            custrefrances::create($data);

            return redirect()->route('custrefrances.custrefrances.index')
                ->with('success_message', trans('custrefrances.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('custrefrances.unexpected_error')]);
        }
    }

    /**
     * Display the specified custrefrances.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $custrefrances = custrefrances::with('country','state','ccreatedby','cupdatedby','customer')->findOrFail($id);

        return view('custrefrances.show', compact('custrefrances'));
    }

    /**
     * Show the form for editing the specified custrefrances.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $custrefrances = custrefrances::findOrFail($id);
        $Countries = Country::pluck('name','id')->all();
$States = State::pluck('name','id')->all();
$ccreatedBies = CcreatedBy::pluck('id','id')->all();
$cupdatedBies = CupdatedBy::pluck('id','id')->all();
$Customers = Customer::pluck('name','id')->all();

        return view('custrefrances.edit', compact('custrefrances','Countries','States','ccreatedBies','cupdatedBies','Customers'));
    }

    /**
     * Update the specified custrefrances in the storage.
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
            
            $custrefrances = custrefrances::findOrFail($id);
            $custrefrances->update($data);

            return redirect()->route('custrefrances.custrefrances.index')
                ->with('success_message', trans('custrefrances.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('custrefrances.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified custrefrances from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $custrefrances = custrefrances::findOrFail($id);
            $custrefrances->delete();

            return redirect()->route('custrefrances.custrefrances.index')
                ->with('success_message', trans('custrefrances.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('custrefrances.unexpected_error')]);
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
                'cname' => 'required|string|min:1|max:400',
            'cnationality' => 'required|string|min:1|max:400',
            'cnationalityNo' => 'required|string|min:1',
            'ccountry_id' => 'required|numeric|min:0',
            'cstate_id' => 'required',
            'ccity' => 'required|string|min:1|max:900',
            'cblock' => 'required|string|min:1|max:900',
            'chouseNo' => 'required|string|min:1|max:100',
            'cstreet' => 'required|string|min:1|max:900',
            'cwork_address' => 'required|string|min:1|max:900',
            'ctel' => 'required|string|min:1',
            'ccreated_by' => 'required',
            'cupdated_by' => 'nullable',
            'cus_id' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
