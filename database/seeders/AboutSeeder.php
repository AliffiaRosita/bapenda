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
            'desc'=>"Dinas Pendapatan Daerah atau disingkat Dipenda.  Dengan tugas pokok antara lain memimpin dan mengkoordinir seluruh usaha dibidang pungutan dan Pendapatan Daerah berdasarkan ketentuan baik yang digariskan pemerintah Pusat maupun Pemerintah Daerah. Dispenda Provinsi Kalimantan Timur, kini memiliki peran dan posisi yang sangat  penting  dan strategis, seiring dengan tuntutan jaman , fungsi dan tugasnya pun bertambah berat. Kemudian diterbitkan Peraturan Daerah  Nomor 08 Tahun 2008 tentang Organisasi dan Tata Kerja Dinas Daerah,  Dinas Pendapatan merupakan unsur pelaksana urusan pemerintahan di bidang pendapatan daerah  dan mempunyai Tugas Pokok melaksanakan urusan pemerintahan daerah di bidang pajak daerah, retribusi dan pendapatan lain-lain, dana perimbangan, perencanaan, pembinaan dan pengawasan pendapatan.",
            'image'=>"about/default.png",
            'points'=>'[{"name":"Penyusunan kebijakan"},{"name":"Pelaksanaan Pelayanan umum"},{"name":"Pembinaan Teknis"},{"name":"Pembinaan Unit Pelaksana"},{"name":"Pengelolaan urusan Tata Usaha Dinas"}]',
        ];
        DB::table('abouts')->insert($data);
    }
}
