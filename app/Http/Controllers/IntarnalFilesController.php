<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Emportcars;
use App\Models\Intarnal_files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\SerialNumber;

class IntarnalFilesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the intarnal files.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $intarnalFilesObjects = Intarnal_files::with('emp')->paginate(25);

        return view('intarnal_files.index', compact('intarnalFilesObjects'));
    }

    /**
     * Show the form for creating a new intarnal files.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $emps = Emp::pluck('id','id')->all();
        
        return view('intarnal_files.create', compact('emps'));
    }

    /**
     * Store a new intarnal files in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

       // return  $request;
      //  try {
            
            $data = $this->getData($request);

            if($request->file()){
                $file= $request->file('file_name');
                $filename=$request->serialNo.'_'.date('YmdHi');
                $guessExtension = $request->file('file_name')->guessExtension();
               // $filename=$request->serialNo.'_'. $request->file('file_name')->getClientOriginalName();
               $newName=$filename.'.'.$guessExtension;
                $filePath = $request->file('file_name')->storeAs('intarnal_files', $newName, 'uploads');
             //   $data['file_path'] = '/storage/app/uploads/'.$filePath;
                $data['file_name']= $newName;
               //return   $data['file_path']; 
            }

          //  $data->save();
          $no=SerialNumber::firstOrFail();
          $seri=$no->serialNo+1;
           $serialNo=$seri."/ن/س/ر/".date("Y").'/'.date("m");
           $data['serialNo']=$serialNo;

            Intarnal_files::create($data);


            SerialNumber::where('id', $no->id)->update([
                'serialNo' => $no->serialNo+1,
           ] );

            $data_emp['status'] = 1;
            $data_emp['status_value'] = 'بالداخل';
            $data_emp['entryDate'] = $request->entryDate;  
            $data_emp['exitDate'] = $request->exitDate;  
            $data_emp['updated_by'] = Auth::user()->name;      
          Emportcars::where('id',$request->emp_id)->update($data_emp); 
       // return  $data;

            return redirect()->route('process')
                ->with('success_message', trans('intarnal_files.model_was_added'));
      //  }
        // catch (Exception $exception) {

         //   return back()->withInput()
         //       ->withErrors(['unexpected_error' => trans('intarnal_files.unexpected_error')]);
      //  }
    }
    public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }

    /**
     * Display the specified intarnal files.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $intarnalFiles = Intarnal_files::with('emp')->findOrFail($id);

        return view('intarnal_files.show', compact('intarnalFiles'));
    }

    /**
     * Show the form for editing the specified intarnal files.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $intarnalFiles = intarnal_files::findOrFail($id);
        $emps = Emportcars::pluck('id','id')->all();

        return view('intarnal_files.edit', compact('intarnalFiles','emps'));
    }

    /**
     * Update the specified intarnal files in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $intarnalFiles = Intarnal_files::findOrFail($id);
            $intarnalFiles->update($data);

            return redirect()->route('intarnal_files.index')
                ->with('success_message', trans('intarnal_files.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('intarnal_files.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified intarnal files from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $intarnalFiles = Intarnal_files::findOrFail($id);
            $intarnalFiles->delete();

            return redirect()->route('intarnal_files.index')
                ->with('success_message', trans('intarnal_files.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('intarnal_files.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'emp_id' => 'required',
          //  'serialNo' => 'required|string|min:1',
            'entryDate' => 'required',
           // 'expiryDuration' => 'required|string|min:1|max:255',
            'exitDate' => 'required',
            'file_name' => 'required',
          // 'file_path' => 'required|string|min:1|max:255', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
