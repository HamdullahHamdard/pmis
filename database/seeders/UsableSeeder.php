<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("usables")->delete();

        DB::table("usables")->insert([
            0 => [
                "name" => "قلم خود کار",
                "usable_type_id" => "1",
                "unit_id" => "3",
                "details" =>
                    "قلم خود کار با رنگ های مختلف. هر قطی دارای ۱۲ قلم میباشد.",
                "total" => "20",
                "unit_price" => "90",
                "total_price" => "1800",
                "currency_id" => "1",
                "province_id" => 1,
                "purchaseYear_id" => 31,
                "purchaseMonth_id" => 12,
                "purchaseDay_id" => 21,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "چای الکوزی",
                "usable_type_id" => "2",
                "unit_id" => "3",
                "details" => "چای سبز و سیاه الکوزی",
                "total" => "100",
                "unit_price" => "150",
                "total_price" => "15000",
                "currency_id" => "1",
                "province_id" => 19,
                "purchaseYear_id" => 32,
                "purchaseMonth_id" => 2,
                "purchaseDay_id" => 27,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            3 => [
                "name" => "تیل پطرول",
                "usable_type_id" => "3",
                "unit_id" => "17",
                "details" => "تیل پطرول 92 از کمپنی احمد یار  ",
                "total" => "1000",
                "unit_price" => "80",
                "total_price" => "80000",
                "currency_id" => "1",
                "province_id" => 1,
                "purchaseYear_id" => 33,
                "purchaseMonth_id" => 5,
                "purchaseDay_id" => 18,
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
