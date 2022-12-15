<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			[
				'img' => 'banner-images/banner1.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'img' => 'banner-images/banner2.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];
        DB::table('banners')->insert($data);
    }
}
