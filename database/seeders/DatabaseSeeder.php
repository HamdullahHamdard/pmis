<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UsableType;
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

        $this->call(ProvinceSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(MonthSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SubDepartmentSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(EmployeeShiftSeeder::class);
        $this->call(EmployeeTypeSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(SubmissionSeeder::class);
        $this->call(UsableTypeSeeder::class);
        $this->call(UsableSeeder::class);
        $this->call(UsableSubmissionSeeder::class);
        $this->call(Form9Seeder::class);
        $this->call(UsableSubmissionSeeder::class);
        $this->call(Form5Seeder::class);
        $this->call(Form5SubmissionSeeder::class);
        $this->call(Form9ItemSeeder::class);
    }
}
