<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Form9ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("form9_item")->delete();

        DB::table("form9_item")->insert([
            0 => [
                "form9_id" => 1,
                "item_id" => 1,
                "quantity" => 3,
            ],
            1 => [
                "form9_id" => 1,
                "item_id" => 2,
                "quantity" => 2,
            ],
        ]);
    }
}
