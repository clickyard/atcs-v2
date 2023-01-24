<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emportcars;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        Emportcars::where('exitDate', '<',  date('Y-m-d')  )->where('status', 1  )->update([
                'status' => 3,
                'status_value' => 'متخلفة ',
        ]);

        
        $Date=date('Y-m-d'); 
        $newdate=date('Y-m-d', strtotime($Date. ' + 15 days'));

        $tody=date('Y-m-d');
        $emp = DB::table('Emportcars')
            ->selectRaw('count(*) as allcars')
            ->selectRaw("COUNT(case when status = '0'  then 1 end)  as beforeintarnal")
            ->selectRaw("COUNT(case when status = '1'  then 1 end)  as afterintarnal")
            ->selectRaw("COUNT(case when status = '1' AND exitDate <='$newdate' then 1 end)  as intarnalCars")
            ->selectRaw("COUNT(case when status = '2'  then 1 end)  as leaving")
            ->selectRaw("COUNT(case when status = '3' AND exitDate < '$tody' then 1 end)  as notleaving")
            ->selectRaw("COUNT(case when status = '4'  then 1 end)  as tarheel")
            ->selectRaw("COUNT(case when takhlees ='1' then 1 end )  as takhlees")
            ->selectRaw("COUNT(case when increase='1'  then 1 end )  as increase")
            ->first();

     return view('home',compact('emp') );
      //return view('temp.home');
      //return view('temp.index');
    }
}
