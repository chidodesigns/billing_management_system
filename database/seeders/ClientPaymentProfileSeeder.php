<?php

namespace Database\Seeders;

use App\Models\ClientPaymentProfile;
use Illuminate\Database\Seeder;

class ClientPaymentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientPaymentProfile::factory()->times(10)->create();
    }
}
