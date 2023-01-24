<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicles::all();

        return view('admin.vehicles.index',compact('vehicles'));
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
            'name' => 'required|unique:vehicles',
       ],[
          'name.required' =>'يرجى ادخال اسم السيارة ',
          'name.unique' =>'هذه السيارة  مسجله مسبقا',


       ]);

       Vehicles::create([
               'name' => $request->name,
               'created_by' => Auth::user()->name ,

           ]);
           session()->flash('Add', 'تم اضافة  السيارة بنجاح');
           return redirect('/vehicles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(vehicles $vehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicles $vehicles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehicles $vehicles)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|unique:vehicles,name,'.$id,
       ],[
            'name.required' =>'يرجى ادخال اسم السيارة',
            'name.unique' =>'هذه السيارة  مسجل مسبقا',
       ]);
       $vehicles = Vehicles::find($id);
       $vehicles->update([
                'name' => $request->name,       
                'updated_by' => (Auth::user()->name),
       ]);

       session()->flash('edit','تم تعديل السيارة بنجاح');
       return redirect('/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Vehicles::find($id)->delete();
        session()->flash('delete','تم حذف السيارة بنجاح');
        return redirect('/vehicles');
    }
}
