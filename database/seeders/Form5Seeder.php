<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Form5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("form5s")->delete();

        DB::table("form5s")->insert([
            0 => [
                "form9s_id"=> 1,
                "province_id"=> 1,
                "details"=> "بـــــه اساس فرمایش نـــمــــــــبر فــــــــــــــــــــوق وحــــــــکـــم  ریاســت محــتــــــــــــــرم مـــــــــالـــی  و اداری  یـــــــک  پایه  کمپیوتر  از  تحـويلی محـترم محمد نادر  در جمع محمد خـــــالد ملکزی فرزند عبدالهادی کارمند بخش عـــــــربی   بـــــــعـــد از ويــــزه مـــــــــديريت محــــترم كــــنـــترول قــــابل تــــــــوزيع اسـت.",
                "distribution_warehouse"=> "محمد نادر متعمد تخنیکی تلویزیون ",
                "distribution_date" => "1403/5/3",

            ],
        ]);
    }
}
