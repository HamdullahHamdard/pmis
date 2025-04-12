<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("years")->delete();

        DB::table("years")->insert([
            0 => [
                "name" => "1370",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "1371",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "1372",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "1373",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            4 => [
                "name" => "1374",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            5 => [
                "name" => "1375",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            6 => [
                "name" => "1376",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            7 => [
                "name" => "1377",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            8 => [
                "name" => "1378",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            9 => [
                "name" => "1379",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            10 => [
                "name" => "1380",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            11 => [
                "name" => "1381",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            12 => [
                "name" => "1382",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            13 => [
                "name" => "1383",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            14 => [
                "name" => "1384",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            15 => [
                "name" => "1385",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            16 => [
                "name" => "1386",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            17 => [
                "name" => "1387",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            18 => [
                "name" => "1388",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            19 => [
                "name" => "1389",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            20 => [
                "name" => "1390",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            21 => [
                "name" => "1391",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            22 => [
                "name" => "1392",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            23 => [
                "name" => "1393",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            24 => [
                "name" => "1394",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            25 => [
                "name" => "1395",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            26 => [
                "name" => "1396",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            27 => [
                "name" => "1397",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            28 => [
                "name" => "1398",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            29 => [
                "name" => "1399",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            30 => [
                "name" => "1400",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            31 => [
                "name" => "1401",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            32 => [
                "name" => "1402",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            33 => [
                "name" => "1403",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            34 => [
                "name" => "1404",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
