<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Category::factory(5)->create();
    }
}
