<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        User::factory()->create();
        User::factory()->create();
        User::factory()->create();
        User::factory()->create();
    }
}
