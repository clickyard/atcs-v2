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
         //   CreateAdminUserSeeder::class,
         //   PermissionTableSeeder::class,
          //  CountriesSeeder::class,
         //  VehiclesSeeder::class,
           // ShipsSeeder::class,
          //  ShippingportsSeeder::class,
        ]);

       // \App\Models\Customers::factory()->count(1)->create();
       // \App\Models\Custrefrances::factory()->count(2)->create();
       // \App\Models\Guarantors::factory()->count(1)->create();            
       // \App\Models\Cars::factory()->count(1)->create();
       // \App\Models\Emportcars::factory()->count(1)->create();
                        

    }
}
