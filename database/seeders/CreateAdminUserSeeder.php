<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\SerialNumber;


class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
        $users = User::where('roles_name',"superAdmin")->count();
 if($users==0){
         $user = User::create([
        'name' =>'salma ibrahim',
        'username' => 'superAdmin', 
        'email' => 'clickyardit@gmail.com',
        'password' => bcrypt('123456'),
        'roles_name' => "superAdmin",
        'address' =>'السودان - الخرطوم',
        'tel'=>'090xxxxxxxx',
        'country' =>'السودان',
        'Status' => 'مفعل',
        ]);
  
        $role = Role::create(['name' => 'superAdmin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
 
        Role::create(['name' => 'agent']);
        Role::create(['name' => 'extoffice']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'customer']);
}
      SerialNumber::create([
                'serialNo' => 0,
                'voucherNo' => 0
        ]);

        \App\Models\Amounts::create([
                'carnet' =>10000,
                'portsudan' => 5000,
                'increase' => 30000,
                'letter' => 2000,
                'moanye' => 5000,
                'created_by'=>\App\Models\User::pluck('name')->random()
        ]);


}
}