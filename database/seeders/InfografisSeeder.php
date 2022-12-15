<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InfografisSeeder extends Seeder
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
				'img' => 'infographic-images/infografis-1.png',
				'caption' => 'Realisasi Penerimaan pajak daerah - Pajak air permukaan',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'img' => 'infographic-images/infografis-2.png',
				'caption' => 'Pajak kendaraan bermotor (PBBKB) tahun 2017 - 2021',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'img' => 'infographic-images/infografis-3.png',
				'caption' => 'Pajak Daerah - Pajak kendaraan bermotor tahun 2017 - 2021',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'img' => 'infographic-images/infografis-4.png',
				'caption' => 'Realisasi penerimaan pajak daerah 2017 - 2021 - Pajak Rokok',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'img' => 'infographic-images/infografis-5.png',
				'caption' => 'Biaya Balik Nama Kendaraan Bermotor tahun 2017-2021',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];
        DB::table('infographics')->insert($data);
    }
}
