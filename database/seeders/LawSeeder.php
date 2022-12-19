<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Law;
use Carbon\Carbon;

class LawSeeder extends Seeder
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
				'title' => 'Peraturan Gubernur',
				'slug' =>SlugService::createSlug(Law::class,'slug','Peraturan Gubernur'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SK Gubernur',
				'slug' =>SlugService::createSlug(Law::class,'slug','SK Gubernur'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SK Sekretariat Daerah',
				'slug' =>SlugService::createSlug(Law::class,'slug','SK Sekretariat Daerah'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Peraturan Daerah',
				'slug' =>SlugService::createSlug(Law::class,'slug','Peraturan Daerah'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'UU/PERPRES/PMK',
				'slug' =>SlugService::createSlug(Law::class,'slug','UU/PERPRES/PMK'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SK Kepala Badan',
				'slug' =>SlugService::createSlug(Law::class,'slug','SK Kepala Badan'),
                'type'=>'file',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
		];

        $datafiles = [
            [
                'title' => 'PERATURAN GUBERNUR NOMOR 10 TAHUN 2022 TENTANG PERUBAHAN ATAS PERGUB KALTIM NOMOR 33 TAHUN 2015 TENTANG TATA CARA PENGEMBALIAN KELEBIHAN PEMBAYARAN PAJAK DAERAH',
                'file'=>'law-file/law1-1.pdf',
                'law_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'PERATURAN GUBERNUR NOMOR 10 TAHUN 2011 TENTANG PETUNJUK PELAKSANAAN PEMUNGUTAN PAJAK AIR PERMUKAAN',
                'file'=>'law-file/law1-2.pdf',
                'law_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'PERGUB NOMOR 1 TAHUN 2019 TENTANG PEMBEBASAN SANKSI ADMINISTRASI PKB ALAT BERAT/BESAR DAN BBNKB ALAT BERAT/BESAR',
                'file'=>'law-file/law1-3.pdf',
                'law_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'PERGUB NOMOR 47 TAHUN 2019 TENTANG PERUBAHAN KEDUA ATAS PERATURAN GUBERNUR KALTIM NOMOR 10 TAHUN 2011 TENTANG PETUNJUK PELAKSANAAN PEMUNGUTAN PAJAK AIR PERMUKAAN',
                'file'=>'law-file/law1-4.pdf',
                'law_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'PERGUB NOMOR 50 TAHUN 2019 TENTANG NILAI JUAL KENDARAAN BERMOTOR DAN NILAI JUAL UBAH BENTUK ATAS DASAR PENGENAAN PKB DAN BBNKB',
                'file'=>'law-file/law1-5.pdf',
                'law_id'=>1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK GUBERNUR NOMOR 970/K.203/2022 TENTANG PEMBENTUKAN TIM ANALISA PELAYANAN PAJAK DAERAH BADAN PENDAPATAN DAERAH KALTIM',
                'file'=>'law-file/law2-1.pdf',
                'law_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK GUBERNUR NOMOR 660.2/K.200/2022 TENTANG PEMBEBASAN SANKSI ADMINISTRASI PAJAK KENDARAAN BERMOTOR PADA PASAR RAMADAN GEDUNG OLAHRAGA SEGIRI SAMARINDA',
                'file'=>'law-file/law2-2.pdf',
                'law_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK GUBERNUR NOMOR 970/K.10/2022 TENTANG JASA TENAGA SAMSAT BHAYANGKARA PEMBINA KEAMANAN DAN KETERTIBAN MASYARAKAT UNTUK PEMUNGUTAN PAJAK KENDARAAN BERMOTOR DI WILAYAH KALIMANTAN TIMUR',
                'file'=>'law-file/law2-3.pdf',
                'law_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK GUBERNUR NOMOR 970/K.145/2022 TENTANG PEMBENTUKAN TIM PENYUSUNAN DOKUMEN STANDAR PELAYANAN PUBLIK DAN SURVEI KEPUASAN MASYARAKAT PADA BADAN PENDAPATAN DAERAH PROV KALTIM',
                'file'=>'law-file/law2-4.pdf',
                'law_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK GUBERNUR NOMOR 970/K.24/2022 TENTANG PEMBENTUKAN TIM PENYUSUN DAN PEMBAHAS RANCANGAN PERATURAN DAERAH PROVINSI KALIMANTAN TIMUR TENTANG RETRIBUSI PENGGUNAAN TENAGA KERJA ASING',
                'file'=>'law-file/law2-5.pdf',
                'law_id'=>2,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK SEKDA NOMOR 800/0713/2022 TENTANG PEMBENTUKAN TIM OPTIMALISASI PENDAPATAN DAERAH MELALUI PENYEMPURNAAN TATA KELOLA PADA SEKTOR PERIKANAN',
                'file'=>'law-file/law3-1.pdf',
                'law_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK SEKDA NOMOR 970/0714/2022 TENTANG PEMBENTUKAN TIM KEGIATAN PEMBAHASAN PENETAPAN POTENSI PBBKB',
                'file'=>'law-file/law3-2.pdf',
                'law_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK SEKDA NOMOR 970/2244/2022 TENTANG PEMBENTUKAN TIM PENILAIAN RISIKO PADA BAPENDA PROV KALTIM',
                'file'=>'law-file/law3-3.pdf',
                'law_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK SEKDA NOMOR 970/6042/2022 TENTANG PEMBENTUKAN TIM KEGIATAN OPTIMALISASI BAGI HASIL PAJAK DAN BUKAN PAJAK',
                'file'=>'law-file/law3-4.pdf',
                'law_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK SEKDA NOMOR 974/1246/2022 TENTANG PEMBENTUKAN TIM OPTIMALISASI RETRIBUSI DAERAH',
                'file'=>'law-file/law3-5.pdf',
                'law_id'=>3,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK KABAN KERINGANAN SANKSI ADMINISTRASI PBBKB PT TITU PERKASA ENERGI',
                'file'=>'law-file/law6-1.pdf',
                'law_id'=>6,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK KABAN TENTANG PEMBENTUKAN PANITIA PELAKSANAAN KEGIATAN INFORMASI PELAYANAN PKB DALAM RANGKA KALTIM EXPO 2022',
                'file'=>'law-file/law6-2.pdf',
                'law_id'=>6,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK KABAN TENTANG PEMBAYARAN SECARA ANGSURAN PAJAK AIR PERMUKAAN PT SEGARA TIMBER',
                'file'=>'law-file/law6-3.pdf',
                'law_id'=>6,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK KABAN TENTANG PEMBENTUKAN TIM PENYUSUNAN RENJA TAHUN 2023 BAPENDA PROV KALTIM',
                'file'=>'law-file/law6-4.pdf',
                'law_id'=>6,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
            [
                'title' => 'SK KABAN TENTANG PENETAPAN INOVASI PELAYANAN PAJAK DAERAH PADA BAPENDA PROV KALTIM',
                'file'=>'law-file/law6-5.pdf',
                'law_id'=>6,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
            ],
        ];
        DB::table('laws')->insert($data);
        DB::table('law_files')->insert($datafiles);
    }
}
