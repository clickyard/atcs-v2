<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CreateAdminUserSeeder::class,
            PermissionTableSeeder::class,
            CountriesSeeder::class,
            VehiclesSeeder::class,
            ShipsSeeder::class,
            ShippingportsSeeder::class,
            ExcelsheetSeeder::class,
      
        ]);

/*
        \App\Models\Customers::factory()->count(1)->create();
        \App\Models\Custrefrances::factory()->count(2)->create();
        \App\Models\Guarantors::factory()->count(1)->create();            
        \App\Models\Cars::factory()->count(1)->create();
        \App\Models\Emportcars::factory()->count(1)->create();
     
       $amount=\App\Models\Amounts::firstOrFail();
       $emp=\App\Models\Emportcars::query()
                                    ->latest()
                                    ->first();

       \App\Models\Revenues::create([
              'carnetNo' => $emp->carnetNo,
              'emp_id' => $emp->id,
              'carnet' => $amount->carnet,
              'portsudan' => 0,
              'increase' => 0,
              'takhlees' => 0,
              'created_by' => \App\Models\User::pluck('name')->random()

          ]);                   
*/
    }
}
