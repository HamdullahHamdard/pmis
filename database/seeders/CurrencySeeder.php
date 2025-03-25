<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("currencies")->delete();

        DB::table("currencies")->insert([
            0 => [
                "name" => "افغانی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
            1 => [
                "name" => "دالر امریکايی",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
            ],
        ]);
    }
}
