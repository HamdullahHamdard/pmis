<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("employee_shifts")->delete();

        DB::table("employee_shifts")->insert([
            0 => [
                "name" => "ټوله ورځ",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "له سهاره تر غرمه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "له غرمه تر ماښامه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "ټوله شپه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
