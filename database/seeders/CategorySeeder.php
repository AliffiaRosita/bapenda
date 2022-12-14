<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
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
				'name' => 'Pemerintahan',
				'slug' =>'pemerintahan',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Umum',
				'slug' =>'umum',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Sosial',
				'slug' =>'sosial',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Pendidikan',
				'slug' =>'pendidikan',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Pelatihan',
				'slug' =>'pelatihan',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Lingkungan',
				'slug' =>'lingkungan',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Agama',
				'slug' =>'agama',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Wisata',
				'slug' =>'wisata',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Politik',
				'slug' =>'politik',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Hukum',
				'slug' =>'hukum',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Seni Budaya',
				'slug' =>'seni-budaya',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Hiburan',
				'slug' =>'hiburan',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
		];
        DB::table('categories')->insert($data);
    }
}
