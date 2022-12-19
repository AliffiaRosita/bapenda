<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Profile;
use Carbon\Carbon;

class ProfileSeeder extends Seeder
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
				'title' => 'Kepala Bapenda',
				'desc' => '',
				'slug' => SlugService::createSlug(Profile::class,'slug','Kepala Bapenda'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Visi & Misi',
				'desc' => '',
				'slug' => SlugService::createSlug(Profile::class,'slug','Visi & Misi'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Tentang Bapenda',
				'desc' => '',
				'slug' => SlugService::createSlug(Profile::class,'slug','Tentang Bapenda'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Struktur Organisasi',
				'desc' => '',
				'slug' => SlugService::createSlug(Profile::class,'slug','Struktur Organisasi'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];
        DB::table('profiles')->insert($data);
    }
}
