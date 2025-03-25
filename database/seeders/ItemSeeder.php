<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("items")->delete();

        DB::table("items")->insert([
            0 => [
                "name" => "کمپیوتر HP Z4 Workstation",
                "total" => "80",
                "unit_id" => "1",
                "m7number" => "فرم م۷ ثبت ۱۲۳۴",
                "details" =>
                    "کمپیوتر HP Z4 Workstation همرا با کیبورد لین دار و موس لین دار.",
                "in_stock" => "10",
                "category_id" => "1",
                "purchase_price" => "800",
                "currency_id" => "2",
                "item_stock_number" => "A003",
                "province_id" => 1,
                "purchaseYear_id" => 30,
                "purchaseMonth_id" => 8,
                "purchaseDay_id" => 18,
                "images" => "hpz4.jpg",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "پرنتر HP Laserjet MFP80 رنگه",
                "total" => "5",
                "unit_id" => "1",
                "m7number" => "فرم م۷ ثبت ۱۲۳۴",
                "details" =>
                    "پرنتر HP Laserjet MFP80 رنگه",
                "in_stock" => "5",
                "category_id" => "1",
                "purchase_price" => "40000",
                "currency_id" => "1",
                "item_stock_number" => "A004",
                "province_id" => 19,
                "purchaseYear_id" => 31,
                "purchaseMonth_id" => 6,
                "purchaseDay_id" => 24,
                "images" => "hp-printer.png",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
