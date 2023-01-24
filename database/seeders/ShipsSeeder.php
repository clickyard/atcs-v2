<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = \App\Models\Ships::count();
        $creatby=\App\Models\User::all()->random()->name;
        if($count==0){
          \App\Models\Ships::create([
                'name'=>"سفينة باعبودة",
                'created_by'=>  $creatby
            ]);
       
        }
    }
}
