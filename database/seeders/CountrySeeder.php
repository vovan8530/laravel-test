<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Country::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Country::factory(5)->create();
    }
}
