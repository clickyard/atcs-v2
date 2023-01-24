<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amounts;
use App\Models\Revenues;
use App\Models\Customers;
use App\Models\Emportcars;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class AmountsController extends Controller
{
    //

    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $amounts = Amounts::all();

        return view('admin.amounts.index',compact('amounts'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
             'carnet' => 'required|numeric',
             'portsudan' => 'required|numeric',
             'increase' => 'required|numeric',
             'letter' => 'required|numeric',
             'moanye' => 'required|numeric',
       ],[
          'carnet.required' =>'هذا  الحقل مطلوب ',
          'carnet.decimal' =>'يجب ادخال رقم'
       ]);


         // $takhlees=($request->letter + $request->moanye);
       Amounts::create([
               'carnet' => $request->carnet,
               'portsudan' => $request->portsudan,
               'increase' => $request->increase,
               'letter' => $request->letter,
               'moanye' => $request->moanye,
               'created_by' => Auth::user()->name ,

           ]);
           session()->flash('Add', 'تم الإضافة بنجاح');
           return redirect('/amounts');
    }


    public function update(Request $request, amounts $amounts)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'carnet' => 'numeric|required',
            'portsudan' => 'numeric|required',
            'increase' => 'numeric|required',
            'letter' => 'numeric|required',
            'moanye' => 'numeric|required',
       ]);
       $amounts = Amounts::find($id);
       $amounts->update([
                'carnet' => $request->carnet,
                'portsudan' => $request->portsudan,
                'increase' => $request->increase,
                'letter' => $request->letter,
                'moanye' => $request->moanye,
                'updated_by' => (Auth::User()->name),
       ]);

       session()->flash('edit','تم التعديل  بنجاح');
       return redirect('/amounts');
    }


    public function  revenue(){
        $id=1;
       // pluck('id','id')->all();
   /*     $customer = Emportcars::pluck('carnetNo','id')->all();
        $amount = Amounts::firstOrFail();
       foreach($customer as $id => $carnetNo){
        Revenues::create([
            'carnetNo' => $carnetNo,
            'emp_id' => $id,
            'carnet' => $amount->carnet,
            'portsudan' => 0,
            'increase' => 0,
            'takhlees' => 0,
            'created_by' => Auth::user()->name

        ]);
    }*/
    
         $revenues = Revenues::with('Customer')->get();
         $carnets=Revenues::sum('carnet');
	     $portsudans =Revenues::sum('portsudan');
	     $increases =Revenues::sum('increase');
		 $takhleeses=Revenues::sum('takhlees');
         $details=0;
		// $total=number_format(($carnets + $portsudans )+ ($increases + $takhleeses),2);

        return view('admin.amounts.revenues',compact('revenues','carnets','portsudans','increases','takhleeses','details'));

    }
}
