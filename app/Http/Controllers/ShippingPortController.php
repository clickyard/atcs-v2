<?php

namespace App\Http\Controllers;

use App\Models\Shippingports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShippingPortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
        $shippingport = Shippingports::all();

        return view('admin.shippingport.index',compact('shippingport'));
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
            'name' => 'required|unique:shippingports',
       ],[
          'name.required' =>'يرجى ادخال اسم الميناء ',
          'name.unique' =>'هذا الميناء  مسجل مسبقا',


       ]);

       Shippingports::create([
               'name' => $request->name,
               'created_by' => Auth::user()->name ,

           ]);
           session()->flash('Add', 'تم اضافة  الميناء بنجاح');
           return redirect('/shippingport');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shippingPort  $shippingPort
     * @return \Illuminate\Http\Response
     */
    public function show(shippingPort $shippingPort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shippingPort  $shippingPort
     * @return \Illuminate\Http\Response
     */
    public function edit(shippingPort $shippingPort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shippingPort  $shippingPort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,shippingports  $shippingPort)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|unique:shippingports,name,'.$id,
       ],[
            'name.required' =>'يرجى ادخال اسم الميناء',
            'name.unique' =>'هذا الميناء  مسجل مسبقا',
       ]);
       $shippingport = Shippingports::find($id);
       $shippingport->update([
                'name' => $request->name,       
                'updated_by' => (Auth::user()->name),
       ]);

       session()->flash('edit','تم تعديل الميناء بنجاح');
       return redirect('/shippingport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shippingPort  $shippingPort
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Shippingports::find($id)->delete();
        session()->flash('delete','تم حذف الميناء بنجاح');
        return redirect('/shippingport');
    }
}
