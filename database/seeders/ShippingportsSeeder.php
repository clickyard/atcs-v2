<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = \App\Models\Shippingports::count();
        $creatby=\App\Models\User::all()->random()->name;
        if($count==0){
          \App\Models\Shippingports::create([
                'name'=>"ميناء بورتسودان",
                'created_by'=> $creatby
            ]);
            \App\Models\Shippingports::create([
                'name'=>"ميناء جدة",
                'created_by'=> $creatby
            ]);
            \App\Models\Shippingports::create([
                'name'=>"ميناء سواكن",
                'created_by'=> $creatby
            ]);
        }
}
}
