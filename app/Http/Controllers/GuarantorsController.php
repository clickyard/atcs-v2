<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Customers;
use App\Models\States;
use App\Models\Guarantors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class GuarantorsController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the guarantors.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $guarantorsObjects = Guarantors::with('Customer.emportcar')->paginate(25);

        return view('guarantors.index', compact('guarantorsObjects'));
    }

    /**
     * Show the form for creating a new guarantors.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Countries = Countries::pluck('name','id')->all();
$States = States::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$Customers = Customer::pluck('name','id')->all();
        
        return view('guarantors.create', compact('Countries','States','creators','updaters','Customers'));
    }

    /**
     * Store a new guarantors in the storage.
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
            guarantors::create($data);

            return redirect()->route('guarantors.index')
                ->with('success_message', trans('guarantors.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('guarantors.unexpected_error')]);
        }
    }

    /**
     * Display the specified guarantors.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $guarantors = Guarantors::with('country','state','customer')->findOrFail($id);

        return view('guarantors.show', compact('guarantors'));
    }

    /**
     * Show the form for editing the specified guarantors.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $guar_id= Guarantors::where('cus_id',$id)->first()->id;
     // $guarantors = Guarantors::where('cus_id',$id)->get();

        $guarantors = Guarantors::findOrFail($guar_id);
        $Countries = Countries::pluck('name','id')->all();
        $States = States::pluck('name','id')-> all();

        return view('guarantors.edit', compact('guarantors','Countries','States'));
    }

    /**
     * Update the specified guarantors in the storage.
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
            $data['updated_by'] = Auth::user()->name;
            $guarantors = Guarantors::findOrFail($id);
            $guarantors->update($data);

            return redirect()->route('customers.index')
                ->with('success_message', trans('guarantors.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('guarantors.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified guarantors from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $guarantors = Guarantors::findOrFail($id);
            $guarantors->delete();

            return redirect()->route('guarantors.index')
                ->with('success_message', trans('guarantors.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('guarantors.unexpected_error')]);
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
             'gname' => 'required|string|min:1|max:400',
            'gcountry_id' => 'required|numeric|min:0',
            'gstate_id' => 'required',
            'gcity' => 'required|string|min:1|max:900',
            'gblock' => 'nullable|string|min:1|max:900',
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
