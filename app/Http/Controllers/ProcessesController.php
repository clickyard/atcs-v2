<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Vehicles;
use App\Models\Customers;
use App\Models\Guarantors;
use App\Models\Emportcars;
use App\Models\Ships;
use App\Models\Shippingports;

use App\Models\Leavingcars;
use App\Models\Increases;
use App\Models\Traheel_files;
use App\Models\Takhlees;
use App\Models\Alerts;
use App\Models\Revenues;
use App\Models\Amounts;
use App\Models\SerialNumber;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Exception;

class ProcessesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $emportcarsObjects = Emportcars::with('car','customer','ship','shippingport','shippingport')->paginate(25);
        //$emportcarsObjects = Emportcars::all();

        return view('processes.index', compact('emportcarsObjects'));
    }
 ////////////////////////////////////////////////////////////////////////////////////
 public function letters($type)
 {
    switch ($type) {

        case 1:
            $title=" إذن دخول";
            $processes= Emportcars::where('status', 0  )->get();
            //return json_encode($data);
            return view('processes.letters', compact('oneCustomer','customerlist','cars','carnet','type','title'));

        break;
        case 2:
            $title="مغادرة";
            $processes = Leavingcars::latest()->first();
            $emportcar= Emportcars::where('id', $processes->emp_id )->with(['customer','car'])->first();
            //return json_encode($data);
            return view('processes.letters', compact('processes','type','title','emportcar'));
            break; 
        case 3:
            $title="تمديد";
            $processes = Increases::latest()->first();
            $emportcar= Emportcars::where('id', $processes->emp_id )->with(['customer','car'])->first();
            return view('processes.letters', compact('processes','type','title','emportcar'));
            break;
        case 4:
            $title="بلاغ عن مخالفة";

            $processes = Alerts::latest()->first();
            $emportcar= Emportcars::where('id', $processes->emp_id )->with(['customer','car'])->first();
            return view('processes.letters', compact('processes','type','title','emportcar'));
            break; 
        case 5:
                $title="تخليص";

                $processes = Takhlees::latest()->first();
               $emportcar= Emportcars::where('id', $processes->emp_id )->with(['customer','car'])->first();
                //return $processes;
                return view('processes.letters', compact('processes','type','title','emportcar'));
                 break;
        case 6:
                    $title=" ترحيل ";
    
                    $processes = Emportcars::where('status', 3 )->get();
                    //return $processes;
                    return view('processes.letters', compact('processes','type','title'));
                     break;                  
      
        default:
            //  return $processes;
            return view('processes.letters', compact('customerlist','cars','carnet','processes','type','title'));

}
       $intarnalCars = Emportcars::where('status' ,'!=' , 2 )->where('status','!=',  4 )->get(); 
       return view('processes.letters', compact('intarnalCars'));
 }
////////////////////////////////////////////////////////////////////////////////////
public function process( )
{
   // $customerlist=Emportcars::with(['customer:name','mycars:id,plateNo'])->get(); 
    $customers=null;

    return view('processes.processes', compact('customers'));                   

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function Search_process(Request $request)
{
    
    $emp_id=$request->carnet;
  //  $customerlist=Emportcars::with(['customer:name','mycars:id,plateNo'])->get(); 
  //  $customers= Emportcars::with(['customer:name','car.Vehicle:id,name'])->findOrFail($emp_id);
    $customers= Emportcars::where('carnetNo',$request->carnet)->with(['customer:name','car.Vehicle:id,name'])->firstOrFail();


 return view('processes.processes', compact('customers'));

/*
   switch ($type) {

            case 1:
                $title=" إذن دخول";
                $processes= Emportcars::where('status', 0  )->get();
                //return json_encode($data);
                return view('processes.datatable', compact('oneCustomer','customerlist','cars','carnet','type','title'));

            break;
            case 2:
                $title="  تمديد";

                $processes = Emportcars::where('status', 1  )->get();
                //return json_encode($data);
                return view('processes.datatable', compact('processes','type','title'));
                break; 
            case 3:
                $title="تخليص";

                $processes = Emportcars::where('status', 2  )->get();
                //return json_encode($processes);
                return view('processes.datatable', compact('processes','type','title'));
                break;
            case 4:
                $title="مغادرة";

                $processes = Emportcars::where('status', 3 )->get();
                //return $processes;
                return view('processes.datatable', compact('processes','type','title'));
                 break; 
            case 5:
                    $title="ترحيل";
    
                    $processes = Emportcars::where('status', 3 )->get();
                    //return $processes;
                    return view('processes.datatable', compact('processes','type','title'));
                     break;
            case 5:
                        $title="تبليغ عن مخالفة";
        
                        $processes = Emportcars::where('status', 3 )->get();
                        //return $processes;
                        return view('processes.datatable', compact('processes','type','title'));
                         break;                  
          
            default:
                //  return $processes;
                return view('processes.processes', compact('customerlist','cars','carnet','processes','type','title'));
  
    }
    */
}
public function markibat( Request $request)
{
    // $Date=date('Y-m-d'); 
    //  $newdate=date('Y-m-d', strtotime($Date. ' - 15 days'));

    
    //  return $newdate;
    $processes=array();
    $title="";
    $type =$request->type;

  //return $type;

   switch ($type) {

            case 1:
                $title="مركبات واصلة";
                $processes=Emportcars::with(['car:id,chassisNo,customer_id','customer:name'])->where('status', 0  )->get();
              //  return json_encode($processes);
                return view('processes.markibat', compact('processes','type','title'));

            break;
            case 2:
                $title=" مركبات بالداخل";

                $processes = Emportcars::with(['Customer','Car'])->where('status', 1  )->get();
                //return json_encode($data);
                return view('processes.markibat', compact('processes','type','title'));
                break; 
            case 3:
                $title="مركبات بالداخل ومتبقي المدة لها اقل من 15يوم";

                $processes = Emportcars::with(['customer','Car'])->where('status', 2  )->get();
                //return json_encode($processes);
                return view('processes.markibat', compact('processes','type','title'));
                break;
            case 4:
                $title="مركبات متخلفة عن المغادرة ";

                $processes = Emportcars::with(['customer','Car'])->where('status', 3 )->get();
                //return $processes;
                return view('processes.markibat', compact('processes','type','title'));
                 break;  
          
            default:
                //  return $processes;
                return view('processes.markibat', compact('processes','type','title'));
  
    }
}
    public function beforeintarnalCars()
    {
        // $Date=date('Y-m-d'); 
        //  $newdate=date('Y-m-d', strtotime($Date. ' - 15 days'));

        $processes = array();
        
        //  return $newdate;
        $type ="";
        $title="";
    
      
        return view('processes.markibat', compact('processes','type','title'));
    }
////////////////////////////////////////////////////////////////////////////////////

public function afterintarnalCars()
{
    $Date=date('Y-m-d'); 
    $newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));

    $intarnalCars = Emportcars::where('status', 1  )->where('exitDate', '<=',  $newdate  )->orwhere('exitDate', '>=',  $newdate  )->where('status', 1  )->get();
   
  //  return $newdate;

    return view('processes.afterintarnalCars', compact('intarnalCars'));
}    
////////////////////////////////////////////////////////////////////////////////////

public function intarnalCars()
{
    $Date=date('Y-m-d'); 
    $newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));

    $intarnalCars = Emportcars::where('exitDate', '<=',  $newdate  )->where('status', 1  )->get();
   
  //  return $newdate;

    return view('processes.intarnalCars', compact('intarnalCars'));
}        
 ////////////////////////////////////////////////////////////////////////////////////
        public function leavingCars()
        {
           

           //  $Date=date('Y-m-d'); 
          //  $newdate=date('Y-m-d', strtotime($Date. ' - 7 days'));
            $leavingCars = Emportcars::where('status', 2 )->get();


           // $leavingCars = Emportcars::where('status', 1  )->orwhere('status', 2  )->get();
  
            return view( 'processes.leavingCars', compact('leavingCars'));
        }

 ////////////////////////////////////////////////////////////////////////////////////
 public function notLeaving()
 {
    // $d=date('d')-15; 
    // $newdate=date('Y-m-'.$d);
            $data = Emportcars::where('exitDate', '<',  date('Y-m-d')  )->where('status', 1  )->update([
                    'status' => 3,
                    'status_value' => 'متخلفة ',
            ]);


            $tarheel = Emportcars::where('exitDate', '<',  date('Y-m-d')  )->where('status',  3  )->get();
            
        //  return $newdate;

            return view('processes.notLeaving', compact('tarheel'));
     
            
 }
 /////////////////////////////////////////////////////////////////////////////////////////
 public function traheel(Request $request)
 {   
     
         $attachment="";
         $attachment2="";
         if($request->file()){
             $file= $request->file('file_name');
             $file2= $request->file('file_name2');

             $filename='lett'.$request->serialNo.'_'.date('YmdHi');
             $filename2='recomnd'.$request->serialNo.'_'.date('YmdHi');

             $guessExtension = $request->file('file_name')->guessExtension();
             $newName=$filename.'.'.$guessExtension;

             $guessExtension2 = $request->file('file_name2')->guessExtension();
             $newName2=$filename2.'.'.$guessExtension2;

             $filePath = $request->file('file_name')->storeAs('traheel_files', $newName, 'uploads');
             $filePath2 = $request->file('file_name2')->storeAs('traheel_files', $newName2, 'uploads');

             
             $attachment = '/storage/app/uploads/' . $filePath;
             $attachment2 = '/storage/app/uploads/' . $filePath2;
          
         }

         Traheel_files::create([
             'serialNo' => $request->serialNo,
             'exitDate' => $request->exitDate,
             'traheel_file' =>$attachment,
             'attachment'=>$attachment2,
             'emp_id'=>$request->emp_id
         ]);

         Emportcars::where('id', $request->emp_id)->update([
            'status' => 4,
            'status_value' => 'تم ترحيلها ',
             'updated_by' => Auth::Id()
         ]);

         return redirect()->route('traheel')
         ->with('success_message','لقد تم ترحيل السيارة  بنجاح');


         
}
    
  ////////////////////////////////////////////////////////////////////////////////////
  public function increase()
  {
    $Date=date('Y-m-d'); 
    $newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));

        $increase = Emportcars::where('exitDate', '<=',  $newdate  )->where('status',  1 )->where('allow_increase',  true  )->orwhere('status',  3 )->get(); 
        return view('processes.increase', compact('increase'));
  }
  ////////////////////////////////////////////////////////////////////////////////////
  public function increas_letter($id)
  {
      
        $increase = Emportcars::findOrFail($id); 
        return view('processes.increas_letter', compact('increase'));
  }
    /////////////////////////////////// /////////////////////////////////////////////////
    public function update_increase(Request $request)
    {   
        
           /* $attachment="";
            if($request->file()){
                $file= $request->file('file_name');
                $filename='incr'.$request->serialNo.'_'.date('YmdHi');
                $guessExtension = $request->file('file_name')->guessExtension();
               // $filename=$request->serialNo.'_'. $request->file('file_name')->getClientOriginalName();
               $newName=$filename.'.'.$guessExtension;
                $filePath = $request->file('file_name')->storeAs('increase_files', $newName, 'uploads');
                $attachment = '/storage/app/uploads/' . $filePath;
             
            }*/
            $no=SerialNumber::firstOrFail();
            $seri=$no->serialNo+1;
             $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");
             Increases::create([
                'serialNo' => $serialNo,
                'voucher' => $no->voucherNo+1,
                'entryDate'=>$request->entryDate,
                'exitDate'=>$request->end_date,
                'signature' =>Auth::user()->name,
                'emp_id'=>$request->emp_id
            ]);

            $data = Emportcars::where('id', $request->emp_id)->update([
                'status' => 1,
                'status_value' => 'بالداخل ',
                'increase'=>1,
                'allow_increase' => $request->allow ,
                'duration' =>$request->dura,
                'exitDate'=>$request->end_date,
                'updated_by' => Auth::user()->name
            ]);

            $amount = Amounts::firstOrFail();
            $increase=($amount->increase);
    
            Revenues::where('emp_id',$request->emp_id)->update([
                'increase' =>$increase,
                'updated_by' => Auth::user()->name
            ]);

            SerialNumber::where('id', $no->id)->update([
                'serialNo' => $no->serialNo+1,
                'voucherNo' => $no->voucherNo+1,
           ] );
           return redirect()->route('letters', 3)
           ->with('success_message','تم التمديد لفترة اخرى بنجاح');

          //  $Customer = Customers::findOrFail($request->cus_id); 
          //  return view('processes.increas_letter', compact('Customer','serialNo'));

            /*  $emportcars = Emportcars::findOrFail($id);

                    $exDate= $emportcars->exitDate;
                    
                
                    $newDate = date('Y-m-d', strtotime("+3 months", strtotime($exDate)));
                // $six = date('Y-m-d', strtotime("+6 months", strtotime($exDate)));
                // $ten = date('Y-m-d', strtotime("+9 months", strtotime($exDate)));

                $allow=true;
                    $dura=  $emportcars->duration + 3;
                    if($dura == 3 ){
                        $allow=true;
                    //   $exitDate=$newDate;
                    }else if($dura  == 6){
                        $allow=true;
                    // $exitDate=$newDate;
                    }else{
                        $allow=false;
                        //$exitDate=$newDate;
                    }
            */
      //   $Customer = Customers::findOrFail($emportcars->cus_id);

         //   return view('emportcars.increas_letter', compact('Customer')) 

       // $increase = Emportcars::where('status',  1  )->where('allow_increase',  true  )->orwhere('status',  3 )->get(); 
       // return view('emportcars.increase', compact('increase'));
    }

  /////////////////////////////////////////////////////////////////////////////////////////////

    public function leavingCars_update(Request $request)
    {   
        
          /*  $attachment="";
            $attachment2="";
            if($request->file()){
                $file= $request->file('file_name');
                $file2= $request->file('file_name2');

                $filename='leav'.$request->serialNo.'_'.date('YmdHi');
                $filename2='insur'.$request->serialNo.'_'.date('YmdHi');

                $guessExtension = $request->file('file_name')->guessExtension();
                $newName=$filename.'.'.$guessExtension;

                $guessExtension2 = $request->file('file_name2')->guessExtension();
                $newName2=$filename2.'.'.$guessExtension2;

                $filePath = $request->file('file_name')->storeAs('leavingCars_files', $newName, 'uploads');
                $filePath2 = $request->file('file_name2')->storeAs('leavingCars_files', $newName2, 'uploads');

                
                $attachment = '/storage/app/uploads/' . $filePath;
                $attachment2 = '/storage/app/uploads/' . $filePath2;
             
            }*/
            $no=SerialNumber::firstOrFail();
            $seri=$no->serialNo+1;
             $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");
             Leavingcars::create([
                'serialNo' => $serialNo,
                'voucher' => $no->voucherNo+1,
                'entryDate'=>$request->entryDate,
                'exitDate'=>$request->exitDate,
                //'insurance_file'=>$attachment,
                'signature' =>Auth::user()->name,
                'emp_id'=>$request->emp_id
            ]);


            Emportcars::where('id', $request->emp_id)->update([
                'status' => 2,
                'status_value' => 'غادرت',
                'updated_by' =>Auth::user()->name,
            ]);

            SerialNumber::where('id', $no->id)->update([
                'serialNo' => $no->serialNo+1,
                'voucherNo' => $no->voucherNo+1,
           ] );
            return redirect()->route('letters', 2)
            ->with('success_message','لقد تمت مغادرة السيارة  بنجاح');

   
    }

 ////////////////////////////////////////////////////////////////////////////////////
 public function update_takhlees(Request $request)
 {
     
    $no=SerialNumber::firstOrFail();
            $seri=$no->serialNo+1;
     $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");

        Takhlees::create([
            'serialNo' => $serialNo,
            'voucher' => $request->voucher,
            'entryDate'=>Date('Y-m-d'),
            'signature' =>Auth::user()->name,
            'emp_id'=>$request->emp_id
        ]);
        Emportcars::where('id', $request->emp_id)->update([
            'takhlees' => true,
            'status' =>5,
            'status_value' => 'تم تخليصها',
            'updated_by' => Auth::user()->name
        ]);
        $amount = Amounts::firstOrFail();
        $takhlees=($amount->letter + $amount->moanye);

        Revenues::where('emp_id',$request->emp_id)->update([
            'takhlees' =>$takhlees,
            'updated_by' => Auth::user()->name
        ]);

        SerialNumber::where('id', $no->id)->update([
            'serialNo' => $no->serialNo+1,
            'voucherNo' => $no->voucherNo+1,
       ] );

       return redirect()->route('letters', 5) 
            ->with('success_message','لقد تمت عملية تخليص السيارة  بنجاح');

 }


 ////////////////////////////////////////////////////////////////////////////////////
 public function update_alerts(Request $request)
 {
    $attachment="";
    if($request->file()){
        $file= $request->file('file_name');
        $filename='alert'.$request->serialNo.'_'.date('YmdHi');
        $guessExtension = $request->file('file_name')->guessExtension();
    // $filename=$request->serialNo.'_'. $request->file('file_name')->getClientOriginalName();
    $newName=$filename.'.'.$guessExtension;
        $filePath = $request->file('file_name')->storeAs('alert_files', $newName, 'uploads');
        $attachment = '/storage/app/uploads/' . $filePath;
    
    }
    $no=SerialNumber::firstOrFail();
    $seri=$no->serialNo+1;
     $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");

    Alerts::create([
        'serialNo' => $serialNo,
        'title'=>$request->title,
        'desc' => $request->desc,
        'signature' =>Auth::user()->name,
       // 'attachment'=>$attachment,
        'emp_id'=>$request->emp_id
    ]);
    Emportcars::where('id', $request->emp_id)->update([
       'alerts' => true,       
        'updated_by' => Auth::user()->name
    ]);

    SerialNumber::where('id', $no->id)->update([
        'serialNo' => $no->serialNo+1,
   ] );
    return redirect()->route('letters', 4) 
        ->with('success_message','لقد تمت عملية البلاغ عن  السيارة المخالفة بنجاح');
 }











}
