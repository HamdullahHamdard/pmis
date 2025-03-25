<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("days")->delete();

        DB::table("days")->insert([
            0 => [
                "name" => "1",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "2",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "3",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "4",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            4 => [
                "name" => "5",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            5 => [
                "name" => "6",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            6 => [
                "name" => "7",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            7 => [
                "name" => "8",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            8 => [
                "name" => "9",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            9 => [
                "name" => "10",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            10 => [
                "name" => "11",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            11 => [
                "name" => "12",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            12 => [
                "name" => "13",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            13 => [
                "name" => "14",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            14 => [
                "name" => "15",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            15 => [
                "name" => "16",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            16 => [
                "name" => "17",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            17 => [
                "name" => "18",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            18 => [
                "name" => "19",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            19 => [
                "name" => "20",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            20 => [
                "name" => "21",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            21 => [
                "name" => "22",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            22 => [
                "name" => "23",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            23 => [
                "name" => "24",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            24 => [
                "name" => "25",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            25 => [
                "name" => "26",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            26 => [
                "name" => "27",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            27 => [
                "name" => "28",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            28 => [
                "name" => "29",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            29 => [
                "name" => "30",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            30 => [
                "name" => "31",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
