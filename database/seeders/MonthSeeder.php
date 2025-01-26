<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("months")->delete();

        DB::table("months")->insert([
            0 => [
                "name" => "حمل",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "ثور",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "جوزا",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "سرطان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            4 => [
                "name" => "اسد",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            5 => [
                "name" => "سنبله",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            6 => [
                "name" => "میزان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            7 => [
                "name" => "عقرب",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            8 => [
                "name" => "قوس",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            9 => [
                "name" => "جدی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            10 => [
                "name" => "دلو",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            11 => [
                "name" => "حوت",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
