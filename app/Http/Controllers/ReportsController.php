<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Customers;
use App\Models\Guarantors;
use App\Models\Emportcars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Takhlees;
use App\Models\Alerts;

use Exception;

class ReportsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

   ///////////////////////////////////////////////////////////////////////
   public function show($id)
   {
       $customers = Emportcars::with(['car:id,chassisNo,customer_id','customer.guarantor'])->findOrFail($id);
 
       return view('reports.details', compact('customers'));
   }
    ///////////////////////////////////////////////////////////////////////
public function Search_customers(Request $request){
    

   
    //return $request;
    $report=array();
    $report_title="";
    $Search=array(
         'type'=>$request->type,
         'start_at'=>$request->start_at,
         'end_at'=>date($request->end_at),

    );
    switch ($request->type) {

        case 1:
            $report_title="تقرير شامل";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->get();
                    return view('reports.report', compact('report','report_title','Search'));

         } else {
                    $report_title=" تقرير شامل من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->whereBetween('entryDate',[$start_at,$end_at])->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
            break;
        case 2:
            $report_title="تقرير عن المركبات الواصلة";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',0)->get();
                    return view('reports.report', compact('report','report_title','Search'));

            } else {
                    $report_title=" تقرير المركبات الواصلة من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',0)->whereBetween('entryDate',[$start_at,$end_at])->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
            break;
        case 3:
            $report_title="تقرير عن المركبات بالداخل";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',1)->get();
                    return view('reports.report', compact('report','report_title','Search'));

         } else {
                    $report_title=" تقرير المركبات بالداخل من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',1)->whereBetween('entryDate',[$start_at,$end_at])->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
            break;
        case 4:
            $report_title="تقرير المركبات التي غادرت";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',2)->get();
                    return view('reports.report', compact('report','report_title','Search'));

         } else {
                    $report_title=" تقرير المركبات التي غادرت من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',2)->whereBetween('entryDate',[$start_at,$end_at])->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
            break;
        case 5:
            $report_title="تقرير المركبات التي تم ترحيلها";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',4)->get();
                    return view('reports.report', compact('report','report_title','Search'));

         } else {
                    $report_title=" تقرير المركبات التي تم ترحيلها من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status',4)->whereBetween('entryDate',[$start_at,$end_at])->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
            break;
        case 6:
            $report_title="تقرير المركبات المخالفة";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('alerts',1)->get();
                    return view('reports.report', compact('report','report_title','Search'));

         } else {
            $report_title="تقرير المركبات المخالفة";
                    $report_title=" تقرير المركبات المخالفة من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->whereBetween('entryDate',[$start_at,$end_at])->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
             break;
        case 7:
            $report_title="تقرير المركبات التي تم تمديدها";
            if($request->start_at =='' && $request->end_at==''){
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('increase',1)->get();
                    return view('reports.report', compact('report','report_title','Search'));

         } else {
                    $report_title=" تقرير المركبات التي تم تمديدها من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                    $start_at =  date($request->start_at);
                    $end_at =  date($request->end_at);
                    $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('increase',1)->get();
                    return view('reports.report', compact('report','report_title','Search'));

            }
             break;
             case 8:
                $report_title="تقرير المركبات التي تم تخليصها";
                if($request->start_at =='' && $request->end_at==''){
                        $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('takhlees',1)->get();
                        return view('reports.report', compact('report','report_title','Search'));
    
             } else {
                        $report_title=" تقرير المركبات التي تم تخليصها من تاريخ ".$request->start_at.' الى '.$request->end_at ;
                        $start_at =  date($request->start_at);
                        $end_at =  date($request->end_at);
                        $report = Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('takhlees',1)->get();
                        return view('reports.report', compact('report','report_title','Search'));
    
                }
                 break;
        default:
        $Search=array(
            'type'=>1,
            'start_at'=>"",
            'end_at'=>"",
    
       );
              return view('reports.report', compact('report','report_title','Search'));
      

    }
    
  //  $report = Emportcars::all();
}
///////////////////////////////////////////////////////////////////////
public function customer(Request $request){
    
    
  
    $report=array();
    $report_title="";
    $Search=array(
        'type'=>1,
        'start_at'=>"",
        'end_at'=>"",

   );
    return view('reports.report', compact('report','report_title','Search'));
}
  ///////////////////////////////////////////////////////////////////////
  public function cars($id)
  {
      //$customers = Customers::findOrFail($id);
      $customers = Emportcars::with(['car.vehicle','customer.guarantor'])->findOrFail($id);

      return view('reports.cars', compact('customers'));
  }
    ///////////////////////////////////////////////////////////////////////
    public function luggages($id)
    {
       // $customers = Customers::findOrFail($id);
        $customers = Emportcars::with(['car.vehicle','customer:name,passport'])->findOrFail($id);

        return view('reports.luggages', compact('customers'));
    }
//////////////////////////////////////////////////////////////////////////////
public function intarnalCars()
{
        $Date=date('Y-m-d'); 
        $newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));

        $intarnalCars = Emportcars::where('entryDate', '<=',  $newdate  )->where('status', 1  )->get();

        //  return $newdate;

        return view('reports.intarnalCars', compact('intarnalCars'));
}

/////////////////////////////////////////////////////////////////////////////////////////
public function leavingCars()
{
   

  //   $Date=date('Y-m-d'); 
  //  $newdate=date('Y-m-d', strtotime($Date. ' - 7 days'));
    $leavingCars = Emportcars::where('status', 2 )->get();


   // $leavingCars = Emportcars::where('status', 1  )->orwhere('status', 2  )->get();

    return view( 'reports.leavingCars', compact('leavingCars'));
}

 /////////////////////////////////////////////////////////////////////////////////////////
 public function traheel()
 {


    $tarheel = Emportcars::where('exitDate', '<',  date('Y-m-d')  )->where('status',  4  )->get();
   // return view('reports.traheel', compact('tarheel'));
    return view('reports.tarheel', compact('tarheel'));

     
}
  /////////////////////////////////////////////////////////////////////////////////////////
  public function alerts()
  {
 
 
     $alerts = Emportcars::with('myalerts')->where('alerts',  1 )->get();
     return  view('reports.alerts', compact('alerts'));
 
      
 }  
   /////////////////////////////////////////////////////////////////////////////////////////
   public function takhlees()
   {
  
  
      $takhlees = Emportcars::with('mytakhlees')->where('takhlees',  1  )->get();
      return view('reports.takhlees', compact('takhlees'));
  
       
  }
///////////////////////////////////////////////////////////////////////

    /**
     * Display the specified emportcars.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show2($id)
    {
        $emportcars = Emportcars::with('customer','ship','shippingport','creator','updater')->findOrFail($id);

        return view('emportcars.show', compact('emportcars'));
    }



}
