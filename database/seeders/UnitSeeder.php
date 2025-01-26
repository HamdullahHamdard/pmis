<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("units")->delete();

        DB::table("units")->insert([
            0 => [
                "name" => "عدد",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "پایه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "قطی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "کیلو",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            4 => [
                "name" => "سیر",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            5 => [
                "name" => "گرام",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            6 => [
                "name" => "جوره",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            7 => [
                "name" => "جلد",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            8 => [
                "name" => "سیت",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            9 => [
                "name" => "متر",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            10 => [
                "name" => "درجن",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            11 => [
                "name" => "حلقه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            12 => [
                "name" => "کلچه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            13 => [
                "name" => "بوتل",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            14 => [
                "name" => "گده",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            15 => [
                "name" => "رول",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            16 => [
                "name" => "لیتر",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
