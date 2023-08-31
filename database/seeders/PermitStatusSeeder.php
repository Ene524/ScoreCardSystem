<?php

namespace Database\Seeders;

use App\Models\PermitStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermitStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PermitStatus::factory()->count(10)->create();
    }
}
