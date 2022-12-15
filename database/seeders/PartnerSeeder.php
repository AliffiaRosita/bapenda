<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PartnerSeeder extends Seeder
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
				'name' => 'simpator (sistem informasi monitoring pajak kendaraan bermotor)',
				'url' => 'http://simpator.kaltimprov.go.id/',
				'logo' => 'partner/simpator.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Lapor (layanan aspirasi dan pengduan online rakyat)',
				'url' => 'https://www.lapor.go.id/',
				'logo' => 'partner/lapor.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'LKPP (Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah)',
				'url' => 'http://www.lkpp.go.id/v3/',
				'logo' => 'partner/lkpp.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'PPID',
				'url' => 'https://ppid.kaltimprov.go.id/',
				'logo' => 'partner/ppid.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'LPSE',
				'url' => 'https://lpse.kaltimprov.go.id/eproc4',
				'logo' => 'partner/lpse.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'Portal Kaltim',
				'url' => 'https://kaltimprov.go.id/',
				'logo' => 'partner/portalkaltim.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'name' => 'BPK RI',
				'url' => 'https://www.bpk.go.id/',
				'logo' => 'partner/bpk.png',
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
        ];
        DB::table('partners')->insert($data);
    }
}
