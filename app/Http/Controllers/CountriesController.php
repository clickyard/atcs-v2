<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $countries = Countries::all();
        return view('admin.countries.index',compact('countries'));
        //return view('admin.countries.index');
        
      
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
             'code' => 'required|unique:countries|max:10',
             'name' => 'required:countries|max:255',
        ],[
            'code.required' =>'يرجى ادخال الكود',
            'code.unique' =>'هذا الكود مسجل مسبقا',
            'name.required' =>'يرجى ادخال اسم الدولة',
        ]);

        Countries::create([
                'code' => $request->code,
                'name' => $request->name,
                'Status' => 'نشط',
                'Value_Status' => 1,
                'created_by' => Auth::user()->name ,

            ]);
            session()->flash('Add', 'تم اضافة الدولة بنجاح');
            return redirect('/countries');

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function show(countries $countries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function edit(countries $countries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, countries $countries)
    {
        //

        $id = $request->id;
        $validatedData = $request->validate([
            'code' => 'required|unique:countries,code,'.$id,
            'name' => 'required:countries|max:255',
       ],[
           'code.required' =>'يرجى ادخال الكود',
           'code.unique' =>'هذا الكود مسجل مسبقا',
           'name.required' =>'يرجى ادخال اسم الدولة',
       ]);
       $countries = Countries::find($id);
       $countries->update([
                'code' => $request->code,
                'name' => $request->name,
                'Status' => 'نشط',
                'Value_Status' => 1,
                'updated_by' => (Auth::user()->name),
       ]);

       session()->flash('edit','تم تعديل الدولة بنجاح');
       return redirect('/countries');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\countries  $countries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Countries::find($id)->delete();
        session()->flash('delete','تم حذف الدولة بنجاح');
        return redirect('/countries');
    }
}
