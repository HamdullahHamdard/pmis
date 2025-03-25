<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsableSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("usable_submissions")->delete();

        DB::table("usable_submissions")->insert([
            0 => [
                "department_id" => "3",
                "item_id" => "1",
                "total" => "2",
                "usable_type_id" => "1",
                "province_id" => 1,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "department_id" => "5",
                "item_id" => "2",
                "total" => "5",
                "usable_type_id" => "2",
                "province_id" => 1,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "department_id" => "10",
                "item_id" => "3",
                "total" => "100",
                "usable_type_id" => "3",
                "province_id" => 1,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
