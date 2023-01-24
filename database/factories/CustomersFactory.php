<?php

namespace Database\Factories;
use  App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    use HasFactory;


    protected $model = Customers::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    public function definition()
    {

        $country= \App\Models\Countries::pluck('id')->random();
        return [
            //

                'name' =>  $this->faker->text($maxNbChars = 20),
                'nationalityNo' => $this->faker->unique()->numberBetween(1, 10000),
                'passport' => $this->faker->unique()->numberBetween(1, 10000),
                'passportDate' => $this->faker->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
                'residenceNo' => $this->faker->unique()->numberBetween(1, 10000),
                'residenceDate' => $this->faker->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
                'country_id' => $country,
                'state_id' =>  \App\Models\States::where('country_id', $country)->get()->random()->id,
                'city' => $this->faker->text($maxNbChars = 20),
                'block' => $this->faker->text($maxNbChars = 20),
                'houseNo' => $this->faker->text($maxNbChars = 6),
                'street' => $this->faker->text($maxNbChars = 50),
                'work_address' => $this->faker->text($maxNbChars = 100),
                'tel' => $this->faker->numerify('##########'),
                'tel2' =>  $this->faker->numerify('##########'),
                'email' =>  $this->faker->unique()->safeEmail,
                'whatsup' =>  $this->faker->numerify('##########'),
                'processType'=>'emp',
                'created_by'   => \App\Models\User::pluck('name')->random()

        ];
    }



    public function getdateformate($date){


        return date('Y-m-d', $date);
    }
}
