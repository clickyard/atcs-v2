<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guarantors>
 */
class GuarantorsFactory extends Factory
{
    protected $model = \App\Models\Guarantors::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $country= \App\Models\Countries::where('code' ,'!=','SD')->pluck('id')->random();
        return [
            //
            'gname' =>  $this->faker->text($maxNbChars = 20),
            'gcountry_id' => $country,
            'gstate_id' =>  \App\Models\States::where('country_id', $country)->pluck('id')->random(),
            'gcity' => $this->faker->text($maxNbChars = 20),
            'ghouseNo' => $this->faker->text($maxNbChars = 5),
            'gstreet' => $this->faker->text($maxNbChars = 50),
            'gwork_address' => $this->faker->text($maxNbChars = 100),
            'gtel' => $this->faker->numerify('##########'),
            'gtel2' => $this->faker->numerify('##########'),
            'gwhatsup' => $this->faker->numerify('##########'),
            'customer_id'=>\App\Models\Customers::latest()->first()->id,
            'created_by'   => \App\Models\User::pluck('name')->random()


        ];
    }
}
