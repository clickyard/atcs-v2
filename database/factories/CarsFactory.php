<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
  
    protected $model = \App\Models\Cars::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $car= \App\Models\Vehicles::pluck('id')->random();

        return [
            //
            'veh_id' => $car,
            'mark_id' => \App\Models\Car_marks::where('veh_id', $car)->pluck('id')->random(),
            'place_id' => \App\Models\Countries::pluck('id')->random(),
            'plateNo' => $this->faker->text($maxNbChars = 20),
            'valueUsd' => $this->faker->numerify('#####'),
            'machineNo' => $this->faker->text(10),
            'chassisNo' => $this->faker->text(10),
            'color' => $this->faker->text($maxNbChars = 5),
            'year' => $this->faker->date('Y'),
            'customer_id'=>\App\Models\Customers::latest()->first()->id,
            'created_by'   => \App\Models\User::pluck('name')->random()

        ];
    }
}
