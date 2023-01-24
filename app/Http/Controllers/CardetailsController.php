<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Cardetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CardetailsController extends Controller
{

    /**
     * Display a listing of the cardetails.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $cardetailsObjects = cardetails::paginate(25);

        return view('cardetails.index', compact('cardetailsObjects'));
    }

    /**
     * Show the form for creating a new cardetails.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Cars = Car::pluck('plateNo','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();
        
        return view('cardetails.create', compact('Cars','creators','updaters'));
    }

    /**
     * Store a new cardetails in the storage.
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
            cardetails::create($data);

            return redirect()->route('cardetails.cardetails.index')
                ->with('success_message', trans('cardetails.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('cardetails.unexpected_error')]);
        }
    }

    /**
     * Display the specified cardetails.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $cardetails = cardetails::with('car','creator','updater')->findOrFail($id);

        return view('cardetails.show', compact('cardetails'));
    }

    /**
     * Show the form for editing the specified cardetails.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $cardetails = cardetails::findOrFail($id);
        $Cars = Car::pluck('plateNo','id')->all();
$creators = User::pluck('name','id')->all();
$updaters = User::pluck('name','id')->all();

        return view('cardetails.edit', compact('cardetails','Cars','creators','updaters'));
    }

    /**
     * Update the specified cardetails in the storage.
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
            $cardetails = cardetails::findOrFail($id);
            $cardetails->update($data);

            return redirect()->route('cardetails.cardetails.index')
                ->with('success_message', trans('cardetails.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('cardetails.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified cardetails from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $cardetails = cardetails::findOrFail($id);
            $cardetails->delete();

            return redirect()->route('cardetails.cardetails.index')
                ->with('success_message', trans('cardetails.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('cardetails.unexpected_error')]);
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
                'year' => 'required|string|min:1',
            'weight' => 'required|string|min:1',
            'cylindersNo' => 'required|string|min:1',
            'hoursPower' => 'required|string|min:1|max:10',
            'type' => 'required|string|min:1|max:16',
            'seats' => 'required|numeric|min:-2147483648|max:2147483647',
            'radio' => 'required|numeric|min:-2147483648|max:2147483647',
            'numTires' => 'required|numeric|min:-2147483648|max:2147483647',
            'airCondition' => 'required|string|min:1|max:100',
            'others' => 'nullable|string|min:0|max:4294967295',
            'car_id' => 'required',
            'created_by' => 'required',
            'updated_by' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
