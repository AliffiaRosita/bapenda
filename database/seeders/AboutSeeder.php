<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title'=>"Tentang Kami",
            'sub_title'=>"Badan Pendapatan Daerah Provinsi Kalimantan Timur",
            'desc'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio odit ea labore? Ullam libero porro repudiandae eaque.",
            'image'=>"about/default.png",
            'points'=>'[{"name":"kelebihan"},{"name":"kekurangan"}]',
        ];
        DB::table('abouts')->insert($data);
    }
}
