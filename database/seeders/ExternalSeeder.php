<?php

namespace Database\Seeders;

use App\Models\External;
use Illuminate\Database\Seeder;

class ExternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        External::factory()->count(1000)->create();
    }
}
