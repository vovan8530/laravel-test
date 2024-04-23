<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Tag::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Tag::factory(20)->create();
    }
}
