<?php

namespace App\Http\Controllers;

use App\Models\Car_marks;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_marks = Car_marks::with('vehicle')->get();
        $vehicles = Vehicles::all();

        return view('admin.car_marks.index',compact('car_marks','vehicles'));
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
              'name' => 'required|unique:car_marks',
              'veh_id' => 'required:car_marks',
         ],[
            'name.required' =>'يرجى ادخال اسم ماركة السيارة ',
            'name.unique' =>'هذه الماركة  مسجله مسبقا',
            'veh_id.required' =>'يرجى ادخال اسم  السيارة ',


         ]);
         echo 'veh:  '.$request->veh_id;
  
        Car_marks::create([
                 'name' => $request->name,
                 'veh_id' => $request->veh_id,
                 'created_by' => Auth::user()->name ,
  
             ]);
             session()->flash('Add', 'تم اضافة ماركة السيارة بنجاح');
             return redirect('/car_marks');
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\car_marks  $car_marks
     * @return \Illuminate\Http\Response
     */
    public function show(car_marks $car_marks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\car_marks  $car_marks
     * @return \Illuminate\Http\Response
     */
    public function edit(car_marks $car_marks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\car_marks  $car_marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, car_marks $car_marks)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|unique:car_marks,name,'.$id,
       ],[
            'name.required' =>'يرجى ادخال اسم ماركة السيارة',
            'name.unique' =>'هذه الماركة  مسجل مسبقا',
       ]);
       $car_marks = Car_marks::find($id);

       $veh_id = Vehicles::where('name', $request->veh_name)->first()->id;

       $car_marks->update([
                'name' => $request->name,       
                 'veh_id' => $veh_id,
                'updated_by' => (Auth::user()->name),
       ]);

       session()->flash('edit','تم تعديل ماركة السيارة بنجاح');
       return redirect('/car_marks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\car_marks  $car_marks
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $request->id;
        Car_marks::find($id)->delete();
        session()->flash('delete','تم حذف ماركة السيارة بنجاح');
        return redirect('/car_marks');
    }
}
