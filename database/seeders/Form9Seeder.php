<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Form9Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("form9s")->delete();

        DB::table("form9s")->insert([
            0 => [
                'department_id' => 1,
                'employee_id' => 1,
                // 'requested_management'=> "مدیریت عمومی ترانسپورت",
                'form_date' => "1403/05/22",
                // 'first_details' => "کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند",
                // 'second_details' => "کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند، کارمندانی که این جنس را تسلیم شده اند",
                // 'manager_name' => "عبدالبشیر",


            ],
        ]);


    }
}
