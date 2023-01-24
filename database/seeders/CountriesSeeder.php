<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = \App\Models\Countries::count();
        $creatby=\App\Models\User::all()->random()->name;
        if($count==0){
          $Country=  \App\Models\Countries::create([
                'name'=>"السودان",
                'code'=>"SD",
                'status'=>'مفعل',
                'value_status'=>1, 
                'created_by'=>  $creatby
            ]);
         \App\Models\States::create([
                'name'=>"الخرطوم",
                'country_id'=>$Country->id,
                'created_by'=> $creatby
            ]);
            \App\Models\States::create([
                'name'=>"بحري",
                'country_id'=>$Country->id,
                'created_by'=> $creatby
            ]);
            \App\Models\States::create([
                'name'=>"امدرمان",
                'country_id'=>$Country->id,
                'created_by'=>  $creatby
            ]);
/////////////////////////////////////////////////////////////////////////////////////
            $Country2=  \App\Models\Countries::create([
                'name'=>"السعودية",
                'code'=>"SA",
                'status'=>'مفعل',
                'value_status'=>1, 
                'created_by'=> $creatby
            ]);

          \App\Models\States::create([
                'name'=>"جدة",
                'country_id'=>$Country2->id,
                'created_by'=>  $creatby
            ]);
            \App\Models\States::create([
                'name'=>"الرياض",
                'country_id'=>$Country2->id,
                'created_by'=>  $creatby
            ]);
            \App\Models\States::create([
                'name'=>"المدينة",
                'country_id'=>$Country2->id,
                'created_by'=>  $creatby
            ]);
            \App\Models\States::create([
                'name'=>"الدمام",
                'country_id'=>$Country2->id,
                'created_by'=>  $creatby
            ]);
          
        }
    }
}
