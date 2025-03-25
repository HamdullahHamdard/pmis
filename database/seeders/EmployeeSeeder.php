<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("employees")->delete();

        DB::table("employees")->insert([
            0 => [
                "name" => "ننگیالی ستومان",
                "position" => "سافټ ویر انجنیر",
                "employment_id" => "345",
                "employee_type_id" => "2",
                "employee_shift_id" => "1",
                "province_id" => "13",
                "contact" => "0781999777",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "محمد عمر",
                "position" => "انجنیر برق",
                "employment_id" => "75",
                "employee_type_id" => "1",
                "employee_shift_id" => "1",
                "province_id" => "1",
                "contact" => "0789789789",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "امیر محمد",
                "position" => "مدیر مالی",
                "employment_id" => "53",
                "employee_type_id" => "1",
                "employee_shift_id" => "1",
                "province_id" => "19",
                "contact" => "0987654321",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
