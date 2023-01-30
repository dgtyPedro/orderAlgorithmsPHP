<?php

namespace Database\Seeders;

use App\Models\Root;
use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Root::factory()->count(1000)->create();
    }
}
