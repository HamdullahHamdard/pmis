<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departments")->delete();

        DB::table("departments")->insert([
            0 => [
                "name" => "ریاست عمومی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "ریاست تخنیکی رادیوتلویزیون",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            2 => [
                "name" => "ریاست نشرات تلویزیون",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "ریاست نشرات رادیو",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            4 => [
                "name" => "ریاست مالی و اداری",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            5 => [
                "name" => "ریاست تولید برنامه های هنری و ادبی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            6 => [
                "name" => "ریاست تلویزیون معارف",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            7 => [
                "name" => "ریاست  ترنم",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            8 => [
                "name" => "ریاست  دیجیتال میدیا",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            9 => [
                "name" => "آمریت تکنالوژی معلوماتی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            10 => [
                "name" => "آمریت هماهنگی ولایات",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            11 => [
                "name" => "آمریت منابع بشری",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            12 => [
                "name" => "آمریت تفتیش داخلی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            13 => [
                "name" => "آمریت خلاقیت و ارزیابی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            14 => [
                "name" => "آمریت پلان و پالیسی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            15 => [
                "name" => "آمریت بازاریابی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
