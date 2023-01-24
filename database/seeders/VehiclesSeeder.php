<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = \App\Models\Vehicles::count();
        $creatby=\App\Models\User::all()->random()->name;

        if($count==0){
          $veh=  \App\Models\Vehicles::create([
                'name'=>"هيونداي",
                'created_by'=>  $creatby
            ]);
                    \App\Models\Car_marks::create([
                        'name'=>"توسان",
                        'veh_id'=> $veh->id,
                        'created_by'=>  $creatby
                    ]); 
                    \App\Models\Car_marks::create([
                        'name'=>"كريتا جراند",
                        'veh_id'=> $veh->id,
                        'created_by'=>  $creatby
                    ]); 
                \App\Models\Car_marks::create([
                        'name'=>"سنتافي",
                        'veh_id'=> $veh->id,
                        'created_by'=>  $creatby
                    ]);
            $veh=  \App\Models\Vehicles::create([
                'name'=>"تايوتا",
                'created_by'=>  $creatby
            ]);  
                \App\Models\Car_marks::create([
                    'name'=>"يارس",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]); 
                \App\Models\Car_marks::create([
                    'name'=>"كامري",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]); 
                \App\Models\Car_marks::create([
                    'name'=>"هايلوكس",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]); 
                \App\Models\Car_marks::create([
                    'name'=>"برادو",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]);  
                \App\Models\Car_marks::create([
                    'name'=>"RAV4 GLE",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]); 
                \App\Models\Car_marks::create([
                    'name'=>"XLE رايز",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]); 
                \App\Models\Car_marks::create([
                    'name'=>"فورتشنر",
                    'veh_id'=> $veh->id,
                    'created_by'=>  $creatby
                ]); 
              
        }
    }
}
