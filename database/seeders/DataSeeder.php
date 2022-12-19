<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Data;
use Carbon\Carbon;

class DataSeeder extends Seeder
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
				'title' => 'Data Objek Pajak Kendaraaan Bermotor',
				'slug' =>SlugService::createSlug(Data::class,'slug','Data Objek Pajak Kendaraaan Bermotor'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Target & Realisasi Penerimaan Retribusi Daerah',
				'slug' =>SlugService::createSlug(Data::class,'slug','Target & Realisasi Penerimaan Retribusi Daerah'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Target & Realisasi Pendapatan Daerah',
				'slug' =>SlugService::createSlug(Data::class,'slug','Target & Realisasi Pendapatan Daerah'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
		];

        $datafiles = [
            [
                'title' => 'Potensi Kendaraan Bermotor 2018',
                'file'=>'data-file/potensi-2018.pdf',
                'data_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Potensi Kendaraan Bermotor 2019',
                'file'=>'data-file/potensi-2019.pdf',
                'data_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Potensi Kendaraan Bermotor 2020',
                'file'=>'data-file/potensi-2020.pdf',
                'data_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Potensi Kendaraan Bermotor 2021',
                'file'=>'data-file/potensi-2021.pdf',
                'data_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Potensi Kendaraan Bermotor 2022',
                'file'=>'data-file/potensi-2022.pdf',
                'data_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
        ];
        DB::table('data')->insert($data);
        DB::table('data_files')->insert($datafiles);
    }
}
