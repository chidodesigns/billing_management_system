<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(10)->create();

        DB::table('users')->insert([
            'name' => 'Chido Ukaigwe',
            'email' => 'chidodesigns@gmail.com',
            'password' => Hash::make('1234567890'),
        ]);
    }
}
