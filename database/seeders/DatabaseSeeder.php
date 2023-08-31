<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
//
//         User::factory()->create([
//             'name' => 'Enes Karakuş',
//             'email' => 'mail.eneskarakus@gmail.com',
//                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
//         ]);

        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            SalarySeeder::class,
            EmployeeSeeder::class,
            PermitTypeSeeder::class,
            PermitStatusSeeder::class,
        ]);
    }
}
