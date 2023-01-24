<?php

namespace App\Http\Controllers;

use App\Models\States;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = States::with('country')->get();
        $countries = Countries::all();
        return view('admin.states.index',compact('states','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          //  'country_id' => 'required',
            'name' => 'required:states',
       ],[
          'name.required' =>'يرجى ادخال اسم المدينة او القرية',
           //'country_id.required' =>'يرجى تحديد الدولة',
       ]);

       States::create([
               'name' => $request->name,
               'country_id' => $request->country_id ,
               'created_by' => Auth::user()->name ,

           ]);
           session()->flash('Add', 'تم اضافة المدينةاو القرية بنجاح');
           return redirect('/states');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\states  $states
     * @return \Illuminate\Http\Response
     */
    public function show(states $states)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\states  $states
     * @return \Illuminate\Http\Response
     */
    public function edit(states $states)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\states  $states
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, states $states)
    {
        $id = $request->id;
        $validatedData = $request->validate([
           // 'country_id' => 'required,',
            'name' => 'required:states',
       ],[
            'name.required' =>'يرجى ادخال اسم المدينة او القرية',
           // 'country_id.required' =>'يرجى تحديد الدولة',
       ]);

       $country_id = Countries::where('name', $request->country_name)->first()->id;

       $states = States::find($id);
       $states->update([
                'name' => $request->name,
                'country_id' => $country_id,
                'updated_by' => (Auth::user()->name),
       ]);

       session()->flash('edit','تم تعديل المدينة او القرية بنجاح');
       return redirect('/states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\states  $states
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        States::find($id)->delete();
        session()->flash('delete','تم حذف المدينة او القرية بنجاح');
        return redirect('/states');
    }
}
