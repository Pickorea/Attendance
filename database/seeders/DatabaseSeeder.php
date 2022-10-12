<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

              
        $this->call(WorkingDaySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(LeaveCategorySeeder::class);
       
        $this->call(HolidaySeeder::class);
        $this->call(SalaryLevelSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}
