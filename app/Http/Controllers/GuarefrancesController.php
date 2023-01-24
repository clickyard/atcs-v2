<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Guarantor;
use App\Models\State;
use App\Models\guarefrances;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class GuarefrancesController extends Controller
{

    /**
     * Display a listing of the guarefrances.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $guarefrancesObjects = guarefrances::paginate(25);

        return view('guarefrances.index', compact('guarefrancesObjects'));
    }

    /**
     * Show the form for creating a new guarefrances.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Countries = Country::pluck('name','id')->all();
$States = State::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$Guarantors = Guarantor::pluck('gname','id')->all();
        
        return view('guarefrances.create', compact('Countries','States','creators','updaters','Guarantors'));
    }

    /**
     * Store a new guarefrances in the storage.
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
            guarefrances::create($data);

            return redirect()->route('guarefrances.guarefrances.index')
                ->with('success_message', trans('guarefrances.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('guarefrances.unexpected_error')]);
        }
    }

    /**
     * Display the specified guarefrances.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $guarefrances = guarefrances::with('country','state','creator','updater','guarantor')->findOrFail($id);

        return view('guarefrances.show', compact('guarefrances'));
    }

    /**
     * Show the form for editing the specified guarefrances.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $guarefrances = guarefrances::findOrFail($id);
        $Countries = Country::pluck('name','id')->all();
$States = State::pluck('name','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
$Guarantors = Guarantor::pluck('gname','id')->all();

        return view('guarefrances.edit', compact('guarefrances','Countries','States','creators','updaters','Guarantors'));
    }

    /**
     * Update the specified guarefrances in the storage.
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
            $data['updated_by'] = Auth::Id();
            $guarefrances = guarefrances::findOrFail($id);
            $guarefrances->update($data);

            return redirect()->route('guarefrances.guarefrances.index')
                ->with('success_message', trans('guarefrances.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('guarefrances.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified guarefrances from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $guarefrances = guarefrances::findOrFail($id);
            $guarefrances->delete();

            return redirect()->route('guarefrances.guarefrances.index')
                ->with('success_message', trans('guarefrances.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('guarefrances.unexpected_error')]);
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
                'grname' => 'required|string|min:1|max:400',
            'grnationality' => 'required|string|min:1|max:400',
            'grnationalityNo' => 'required|string|min:1',
            'grcountry_id' => 'required|numeric|min:0',
            'grstate_id' => 'required',
            'grcity' => 'required|string|min:1|max:900',
            'grblock' => 'required|string|min:1|max:900',
            'grhouseNo' => 'required|string|min:1|max:100',
            'grstreet' => 'required|string|min:1|max:900',
            'grwork_address' => 'required|string|min:1|max:900',
            'grtel' => 'required|string|min:1',
            'created_by' => 'required',
            'updated_by' => 'nullable',
            'gua_id' => 'required', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
