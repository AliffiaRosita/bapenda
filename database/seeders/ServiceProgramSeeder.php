<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\ServiceProgram;
use App\Models\ServiceList;
use Carbon\Carbon;

class ServiceProgramSeeder extends Seeder
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
				'title' => 'Kota Samarinda',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kota Samarinda'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kota Bontang',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kota Bontang'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kota Balikpapan',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kota Balikpapan'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kabupaten Kubar',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kabupaten Kubar'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kabupaten Paser',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kabupaten Paser'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kabupaten Penajam Paser Utara',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kabupaten Penajam Paser Utara'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kabupaten Kutim',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kabupaten Kutim'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kabupaten Kukar',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kabupaten Kukar'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Kabupaten Berau',
				'desc' => '',
				'slug' => SlugService::createSlug(ServiceProgram::class,'slug','Kabupaten Berau'),
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];

        $dataList = [
            [
				'title' => 'Struktur Organisasi UPTD PPRD Samarinda',
				'slug' => SlugService::createSlug(ServiceList::class,'slug','Struktur Organisasi UPTD PPRD Samarinda'),
                'type'=>'article',
                'service_program_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
            [
				'title' => 'Maklumat Pelayanan UPTD PPRD Samarinda',
                'type'=>'article',
				'slug' => SlugService::createSlug(ServiceList::class,'slug','Maklumat Pelayanan UPTD PPRD Samarinda'),
                'service_program_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
            [
				'title' => 'Rekapitulasi Pengaduan UPTD PPRD Samarinda',
                'type'=>'file',
				'slug' => SlugService::createSlug(ServiceList::class,'slug','Rekapitulasi Pengaduan UPTD PPRD Samarinda'),
                'service_program_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
            [
				'title' => 'SKM dan SIPP UPTD PPRD Samarinda',
                'type'=>'file',
				'slug' => SlugService::createSlug(ServiceList::class,'slug','SKM dan SIPP UPTD PPRD Samarinda'),
                'service_program_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
            [
				'title' => 'Indeks Kepuasan Masyarakat UPTD PPRD Samarinda',
                'type'=>'article',
				'slug' => SlugService::createSlug(ServiceList::class,'slug','Indeks Kepuasan Masyarakat UPTD PPRD Samarinda'),
                'service_program_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
            [
				'title' => 'Forum Konsultasi Publik',
                'type'=>'file',
				'slug' => SlugService::createSlug(ServiceList::class,'slug','Forum Konsultasi Publik'),
                'service_program_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];
        $dataArticles = [
            [
                'desc'=>'',
                'service_list_id'=>1,
                'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'desc'=>'',
                'service_list_id'=>2,
                'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'desc'=>'',
                'service_list_id'=>5,
                'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
        ];
        DB::table('service_programs')->insert($data);
        DB::table('service_lists')->insert($dataList);
        DB::table('service_articles')->insert($dataArticles);
    }
}
