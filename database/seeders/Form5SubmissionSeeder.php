<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Form5SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("form5_submission")->delete();

        DB::table("form5_submission")->insert([
            0 => [
                "form5_id" => 1,
                "submission_id" => 1,
            ],
            1 => [
                "form5_id" => 1,
                "submission_id" => 2,
            ],
        ]);
    }
}
