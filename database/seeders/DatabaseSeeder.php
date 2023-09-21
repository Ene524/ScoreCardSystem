<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use App\Models\PermitStatus;
use App\Models\PermitType;
use App\Models\Position;
use App\Models\Salary;
use App\Models\User;
use App\Models\WorkdayType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        #region deleteAllTables
        Schema::disableForeignKeyConstraints();
        DB::table('departments')->truncate();
        DB::table('positions')->truncate();
        DB::table('permit_types')->truncate();
        DB::table('permit_statuses')->truncate();
        DB::table('salaries')->truncate();
        Schema::enableForeignKeyConstraints();
        #endregion

        #region Users
        if (User::count() == 0) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]);
        }
        #endregion
        #region Departments
        $dataDepartments = array(
            array('name' => 'Satış', 'description' => 'Satış', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Pazarlama', 'description' => 'Pazarlama', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Teknik', 'description' => 'Teknik', 'created_at' => now(), 'updated_at' => now()),
        );
        Department::insert($dataDepartments);
        #endregion
        #region Positions
        $dataPositions = array(
            array('name' => 'Müşteri Temsilcisi', 'description' => 'Müşteri Temsilcisi', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Takım Koçu', 'description' => 'Takım Koçu', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Takım Lideri', 'description' => 'Takım Lideri', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Yönetici', 'description' => 'Yönetici', 'created_at' => now(), 'updated_at' => now()),
        );
        Position::insert($dataPositions);
        #endregion
        #region PermitTypes
        $dataPermitTypes = array(
            array('name' => 'Ücretsiz İzin', 'description' => 'İzin', 'day'=>1,'status'=>1, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Evlilik İzni', 'description' => 'İzin', 'day'=>3,'status'=>1, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Yıllık İzin', 'description' => 'İzin', 'day'=>14,'status'=>1, 'created_at' => now(), 'updated_at' => now()),
        );
        PermitType::insert($dataPermitTypes);
        #endregion
        #region PermitTypeStatuses
        $dataPermitTypeStatuses = array(
            array('name' => 'Onay Bekliyor', 'description' => 'Onay Bekliyor', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Onaylandı', 'description' => 'Onaylandı', 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Reddedildi', 'description' => 'Reddedildi', 'created_at' => now(), 'updated_at' => now()),
        );
        PermitStatus::insert($dataPermitTypeStatuses);
        #endregion
        #region Salaries
        $dataSalaries = array(
            array('name' => 'Maaş1', 'description' => 'Maaş1', 'amount' => 5000, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Maaş2', 'description' => 'Maaş2', 'amount' => 10000, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Maaş3', 'description' => 'Maaş3', 'amount' => 15000, 'created_at' => now(), 'updated_at' => now()),

        );
        Salary::insert($dataSalaries);
        #endregion
        #region Roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Standart-User']);
        #endregion
        #region ModelHasRoles
        $user = User::where('email', 'admin@admin.com')->first();
        $user->assignRole('Admin');
        #endregion

        #region WorkdayTypes
        $dataWorkdayTypes = array(
            array('name' => 'Standart Vardiya', 'description' => 'Standart Mesai', 'hourly_wage' => 50, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Ek Mesai', 'description' => 'Ek Mesai', 'hourly_wage' => 100, 'created_at' => now(), 'updated_at' => now()),
        );
        WorkdayType::insert($dataWorkdayTypes);


        /*
        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            SalarySeeder::class,
            EmployeeSeeder::class,
            PermitTypeSeeder::class,
            PermitStatusSeeder::class,
        ]);
        */
    }
}
