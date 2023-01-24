<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Custrefrances>
 */
class CustrefrancesFactory extends Factory
{
   
    protected $model = \App\Models\Custrefrances::class;
   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $country= \App\Models\Countries::where('code' ,'SD')->first()->id;

        return [
            //

                'cname' =>  $this->faker->text($maxNbChars = 20),
                'ccountry_id' => $country,
                'cstate_id' =>  \App\Models\States::where('country_id', $country)->pluck('id')->random(),
                'ccity' => $this->faker->text($maxNbChars = 20),
                'cblock' => $this->faker->text($maxNbChars = 20),
                'chouseNo' => $this->faker->text($maxNbChars = 6),
                'cstreet' => $this->faker->text($maxNbChars = 50),
                'cwork_address' => $this->faker->text($maxNbChars = 100),
                'ctel' => $this->faker->numerify('##########'),
                'customer_id'=>\App\Models\Customers::latest()->first()->id,
                'created_by'   => \App\Models\User::pluck('name')->random()

        ];
    }
}
