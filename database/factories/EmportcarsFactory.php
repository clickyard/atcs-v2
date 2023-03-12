<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emportcars>
 */
class EmportcarsFactory extends Factory
{
    
    protected $model = \App\Models\Emportcars::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $issdat=$this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('Y-m-d');
        $expdate=date('Y-m-d', strtotime($issdat. ' + 12 month'));
        $entdate=$this->faker->dateTimeBetween( $issdat, $expdate)->format('Y-m-d');
        return [
                'ship_id' => \App\Models\Ships::pluck('id')->random(),
                'port_id' => \App\Models\Shippingports::pluck('id')->random(),
                'portAccess_id' => \App\Models\Shippingports::pluck('id')->random(),
                'carnetNo' => $this->faker->unique()->text(10),
                'destination' => $this->faker->text($maxNbChars = 10),
                'shippingAgent' => $this->faker->text($maxNbChars = 6),
                'deliveryPerNo' =>  $this->faker->numerify('####'),
                'issueDate' => $issdat,
                'expiryDate' =>  $expdate,
                'entryDate' => $entdate,
                'exitDate' => date('Y-m-d', strtotime($entdate. ' + 3 month')),
                'allow_increase'  =>1,
                'increase'    => 0,
                'duration'   => 3,
                'status'   => 0,
                'alerts'   => 0,
                'takhlees'   => 0,
                'status_value'   => 'واصلة',
                'car_id'=>\App\Models\Cars::latest()->first()->id,
                'created_by'   => \App\Models\User::pluck('name')->random()
        ];
         
    }
}
