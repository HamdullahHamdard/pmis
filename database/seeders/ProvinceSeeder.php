<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table("provinces")->delete();

        DB::table("provinces")->insert([
            0 => [
                "name" => "بدخشان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "بادغیس",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "بغلان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "بلخ",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            4 => [
                "name" => "بامیان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            5 => [
                "name" => "فراه",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            6 => [
                "name" => "فاریاب",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            7 => [
                "name" => "غزنی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            8 => [
                "name" => "غور",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            9 => [
                "name" => "هلمند",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            10 => [
                "name" => "هرات",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            11 => [
                "name" => "جوزجان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            12 => [
                "name" => "کابل",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            13 => [
                "name" => "کندهار",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            14 => [
                "name" => "کاپیسا",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            15 => [
                "name" => "خوست",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            16 => [
                "name" => "کنر",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            17 => [
                "name" => "کندز",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            18 => [
                "name" => "لغمان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            19 => [
                "name" => "لوگر",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            20 => [
                "name" => "ننگرهار",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            21 => [
                "name" => "نیمروز",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            22 => [
                "name" => "نورستان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            23 => [
                "name" => "پکتیکا",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            24 => [
                "name" => "پکتیا",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            25 => [
                "name" => "پروان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            26 => [
                "name" => "پنجشیر",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            27 => [
                "name" => "سمنگان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            28 => [
                "name" => "سرپل",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            29 => [
                "name" => "تخار",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            30 => [
                "name" => "ارزکان",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            31 => [
                "name" => "وردک",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            32 => [
                "name" => "زابل",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            33 => [
                "name" => "دایکندی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
