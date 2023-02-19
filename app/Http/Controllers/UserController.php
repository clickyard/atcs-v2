<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Validator;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{

   // auth()->user()->assignRole(['owner', 'user']);
$data = User::orderBy('id','DESC')->paginate(10);
return view('users.show_users',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}


/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();

return view('users.Add_user',compact('roles'));

}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    
$this->validate($request, [
'name' => 'required',
'username' => 'required|unique:users',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password|min:3',
'roles_name' => 'required',
'country' => 'required',

]);

$input = $request->all();


$input['password'] = Hash::make($input['password']);

$user = User::create($input);
$user->assignRole($request->input('roles_name'));

return redirect()->route('users.index')
->with('success','تم اضافة المستخدم بنجاح');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('users.edit',compact('user','roles','userRole'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'username'=>'required|unique:users,username,'.$id,
'email' => 'required|email|unique:users,email,'.$id,
'country' => 'required',

//'password' => 'same:confirm-password',
'roles_name' => 'required'

]);
$input = $request->all();

$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('roles_name'));

return redirect()->route('users.index')
->with('success','تم تحديث معلومات المستخدم بنجاح');
}

public function updatepassword(Request $request, $id)
{

   $this->validate($request, [
      'password' => 'same:confirm-password',
      ]);
   $input = $request->all();

   if(!empty($input['password'])){
      $input['password'] = Hash::make($input['password']);
      }else{
      $input = Arr::except($input,array('password'));
      }
      $user = User::find($id);
      $user->update($input);

      return redirect()->route('users.edit',$id)
      ->with('success','تم تحديث كلمة المرور بنجاح');
}


public function profile()
{
   return view('users.profile');

} 
public function updateprofile(Request $request, $id)
{

   $this->validate($request, [

      'password' => 'same:confirm-password',
      ]);
   $input = $request->all();

   if(!empty($input['password'])){
      $input['password'] = Hash::make($input['password']);
      }else{
      $input = Arr::except($input,array('password'));
      }
      $user = User::find($id);
      $user->update($input);

      return redirect()->route('profile')
      ->with('success','تم تحديث  البيانات بنجاح');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
User::find($request->user_id)->delete();
return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
}



}