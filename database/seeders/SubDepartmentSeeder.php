<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sub_departments")->delete();

        DB::table("sub_departments")->insert([
            0 => [
                "name" => "آمریت دفتر",
                "department_id" => "1",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "آمریت فرستنده ها",
                "department_id" => "2",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
