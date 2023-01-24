<?php

namespace App\Http\Controllers;

use App\Models\Ships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships = Ships::all();

        return view('admin.ships.index',compact('ships'));
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
            'name' => 'required|unique:ships',
       ],[
          'name.required' =>'يرجى ادخال اسم السفينة ',
          'name.unique' =>'هذه السفينة  مسجله مسبقا',


       ]);

       Ships::create([
               'name' => $request->name,
               'created_by' => Auth::user()->name ,

           ]);
           session()->flash('Add', 'تم اضافة  السفينة بنجاح');
           return redirect('/ships');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ships  $ships
     * @return \Illuminate\Http\Response
     */
    public function show(ships $ships)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ships  $ships
     * @return \Illuminate\Http\Response
     */
    public function edit(ships $ships)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ships  $ships
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ships $ships)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|unique:ships,name,'.$id,
       ],[
            'name.required' =>'يرجى ادخال اسم السفينة',
            'name.unique' =>'هذه السفينة  مسجلة مسبقا',
       ]);
       $ships = Ships::find($id);
       $ships->update([
                'name' => $request->name,       
                'updated_by' => (Auth::user()->name),
       ]);

       session()->flash('edit','تم تعديل السفينة بنجاح');
       return redirect('/ships');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ships  $ships
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Ships::find($id)->delete();
        session()->flash('delete','تم حذف السفينة بنجاح');
        return redirect('/ships');
    }
}
