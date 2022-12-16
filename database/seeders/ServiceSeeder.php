<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
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
				'title' => 'SAMSAT ONLINE',
				'desc' => 'Layanan Samsat Online merupakan sistem administrasi terpadu yang melayani pengesahan STNK dan pembayaran PKB serta SWDKLLJ melalui transaksi elektronik.',
				'icon' => 'service-images/mobile.png',
				'url' => 'http://simpator.kaltimprov.go.id/',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SAMSAT CORNER / MALL',
				'desc' => 'Samsat Corner merupakan inovasi pada pelayanan publik khususnya pelayanan pembayaran PKB / pengesahan STNK satu tahun dimana Wajib Pajak diberikan kemudahan dan kepastian tentang sistem dan prosedur layanan.',
				'icon' => 'service-images/mall.png',
				'url' => 'http://simpator.kaltimprov.go.id/',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SAMSAT DRIVE THRU',
				'desc' => 'Layanan ini memberi fasilitas lebih spesial berupa loket pelayanan Samsat yang diletakkan di jalan-jalan strategis sehingga para wajib pajak  tidak perlu turun dari kendaraan, waktu proses hanya sekitar 5 hingga 10 menit.',
				'icon' => 'service-images/drive-thru.png',
				'url' => 'http://simpator.kaltimprov.go.id/',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SAMSAT MOBIL/KELILING',
				'desc' => 'Layanan pengesahan STNK setiap tahun, pembayaran PKB dan SWDKLLJ dengan metode jemput bola dengan mendatangi pemilik kendaraan/Wajib Pajak yang jauh dari pusat pelayanan Samsat.',
				'icon' => 'service-images/mobil-keliling.png',
				'url' => 'http://simpator.kaltimprov.go.id/',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];
        DB::table('services')->insert($data);
    }
}
