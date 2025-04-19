<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("submissions")->delete();

        DB::table("submissions")->insert([
            0 => [
                "employee_id" => "1",
                "item_id" => "1",
                "total" => "80",
                "department_id" => 1,
                "details" => "This is is si s",
                "province_id" => 1,
                "is_returned" => false,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "employee_id" => "1",
                "item_id" => "2",
                "total" => "5",
                "department_id" => 2,
                "province_id" => 1,
                "details" => "کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند",

                "is_returned" => false,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
