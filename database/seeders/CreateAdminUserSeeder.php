<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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
        'name' => 'super Admin', 
        'email' => 'clickyardit@gmail.com',
        'password' => bcrypt('123456'),
        'roles_name' => ["superAdmin"],
        'Status' => 'مفعل',
        ]);
  
        $role = Role::create(['name' => 'superAdmin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
 
        Role::create(['name' => 'seudiAdmin']);
        Role::create(['name' => 'seudiUser']);
        Role::create(['name' => 'sawakinAdmin']);
        Role::create(['name' => 'sawakinUser']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'customer']);
}
}
}