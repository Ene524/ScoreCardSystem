<?php

namespace Database\Seeders;

use App\Models\Workday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkdaySeeder extends Seeder
{

    public function run(): void
    {
        Workday::factory()->count(10)->create();
    }
}
