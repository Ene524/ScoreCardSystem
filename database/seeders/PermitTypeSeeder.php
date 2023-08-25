<?php

namespace Database\Seeders;

use App\Models\PermitType;
use Illuminate\Database\Seeder;

class PermitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PermitType::factory()->count(10)->create();
    }
}
