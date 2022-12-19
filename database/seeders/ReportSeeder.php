<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Report;
use Carbon\Carbon;

class ReportSeeder extends Seeder
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
				'title' => 'Rencana Strategis',
				'slug' =>SlugService::createSlug(Report::class,'slug','Rencana Strategis'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Rencana Kerja',
				'slug' =>SlugService::createSlug(Report::class,'slug','Rencana Kerja'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Perjanjian Kinerja',
				'slug' =>SlugService::createSlug(Report::class,'slug','Perjanjian Kinerja'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Indikator Kinerja Utama',
				'slug' =>SlugService::createSlug(Report::class,'slug','Indikator Kinerja Utama'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'LHKPN',
				'slug' =>SlugService::createSlug(Report::class,'slug','LHKPN'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Laporan Keuangan',
				'slug' =>SlugService::createSlug(Report::class,'slug','Laporan Keuangan'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'LKJIP',
				'slug' =>SlugService::createSlug(Report::class,'slug','LKJIP'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SPP-SPM',
				'slug' =>SlugService::createSlug(Report::class,'slug','SPP-SPM'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
		];

        $datafiles = [
            [
                'title' => 'Renstra Perubahan 2019-2023',
                'file'=>'report-file/report1-1.pdf',
                'report_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Rencana Kerja Tahun 2021',
                'file'=>'report-file/report2-1.pdf',
                'report_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Rencana Kerja Tahun 2022',
                'file'=>'report-file/report2-2.pdf',
                'report_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'REVIEW PERJANJIAN KINERJA 2021',
                'file'=>'report-file/report3-1.pdf',
                'report_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'Perjanjian Kinerja 2021',
                'file'=>'report-file/report3-2.pdf',
                'report_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'IKU 2021',
                'file'=>'report-file/report4-1.pdf',
                'report_id'=>4,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'LHKPN Kepala Badan Tahun 2021',
                'file'=>'report-file/report5-1.pdf',
                'report_id'=>5,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'LHKPN Kepala Badan Tahun 2020',
                'file'=>'report-file/report5-2.pdf',
                'report_id'=>5,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'LKJIP 2021',
                'file'=>'report-file/report7-1.pdf',
                'report_id'=>7,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SPP-SPM UPTD SAMARINDA',
                'file'=>'report-file/report8-1.pdf',
                'report_id'=>8,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
        ];
        DB::table('reports')->insert($data);
        DB::table('report_files')->insert($datafiles);
    }
}
