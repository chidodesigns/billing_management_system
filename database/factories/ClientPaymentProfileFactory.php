<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientPaymentProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $clients = Client::all();

        return [
            'client_id' => $clients->random(1)->pluck('id')->first(),
            'client_name' => $clients->random(1)->pluck('company'),
            'recurrence_type' => 'monthly',
            'recurrence_date' => $this->faker->dateTime(),
            'invoiced' => 'Advanced',
            'direct_debit' => 'yes',
            'payment_terms' => $this->faker->randomFloat($nbMaxDecimals = 0, $min = 0, $max = 30)
        ];
    }
}
