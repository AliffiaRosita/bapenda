<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\NewsVideo;
use Carbon\Carbon;

class NewsVideoSeeder extends Seeder
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
				'title' => 'CEK KENDARAAN MAKIN MUDAH DENGAN SIMPATOR',
				'desc' => '<div>Sistem Informasi Monitoring Kendaraan Bermotor (Simpator) adalah inovasi dari Badan Pendapatan Daerah (Bapenda) Prov. Kaltim yang mengedepankan keterbukaan informasi publik.</div><div><br></div><div>Dengan mengakses simpator.kaltimprov.go.id wajib pajak dapat mengetahui segala informasi mengenai pajak kendaraan bermotor miliknya. Masyarakat juga bisa mendapatkan SMS Pengingat cukup mendaftarkan nomor handphone dan pelat kendaraan.</div><div><br></div><div>Tak hanya itu, wajib pajak juga bisa melihat realisasi penerimaan secara realtime, kapan saja dan di mana saja.</div>',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','CEK KENDARAAN MAKIN MUDAH DENGAN SIMPATOR'),
				'url' => 'https://www.youtube.com/embed/0Oyy6_7YT1E',
				'thumbnail' => 'news-images/thumbnail1.jpg',
				'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SIMPATOR, CEK PAJAK KENDARAAN MAKIN MUDAH, INOVASI BAPENDA KEDEPANKAN TRANSPARANSI',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','SIMPATOR, CEK PAJAK KENDARAAN MAKIN MUDAH, INOVASI BAPENDA KEDEPANKAN TRANSPARANSI'),
				'url' => 'https://www.youtube.com/embed/ezYredi2bYQ',
				'thumbnail' => 'news-images/thumbnail2.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'INOVASI SAMSAT PANGKAS WAKTU HEMAT BIAYA',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','INOVASI SAMSAT PANGKAS WAKTU HEMAT BIAYA'),
				'url' => 'https://www.youtube.com/embed/rg9gfPVcMYo',
				'thumbnail' => 'news-images/thumbnail3.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'LAYANAN E-SAMSAT BAPENDA DAN BANKALTIMTARA',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','LAYANAN E-SAMSAT BAPENDA DAN BANKALTIMTARA'),
				'url' => 'https://www.youtube.com/embed/Ri0Kp_alBF0',
				'thumbnail' => 'news-images/thumbnail4.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Samsat Delivery Pos (SADELPOS)',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','Samsat Delivery Pos (SADELPOS)'),
				'url' => 'https://www.youtube.com/embed/QPGTeHPHSQU',
				'thumbnail' => 'news-images/thumbnail5.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-SAMSAT BHABINKAMBTIBMAS',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-SAMSAT BHABINKAMBTIBMAS'),
				'url' => 'https://www.youtube.com/embed/qEzS_0jYs1o',
				'thumbnail' => 'news-images/thumbnail6.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-Samsat LinkAja!',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-Samsat LinkAja!'),
				'url' => 'https://www.youtube.com/embed/sm1Jn83iK4I',
				'thumbnail' => 'news-images/thumbnail7.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-Samsat Dalam Genggaman Bhabin',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-Samsat Dalam Genggaman Bhabin'),
				'url' => 'https://www.youtube.com/embed/hfJTX_b_QJU',
				'thumbnail' => 'news-images/thumbnail8.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SIMPATOR (Sistem Informasi Monitoring Pajak Kendaraan Bermotor)',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','SIMPATOR (Sistem Informasi Monitoring Pajak Kendaraan Bermotor)'),
				'url' => 'https://www.youtube.com/embed/D4mZw4WVb18',
				'thumbnail' => 'news-images/thumbnail9.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-Samsat Dalam Genggaman Bhabinkamtibmas',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-Samsat Dalam Genggaman Bhabinkamtibmas'),
				'url' => 'https://www.youtube.com/embed/9yi9iMbptoc',
				'thumbnail' => 'news-images/thumbnail10.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],

        ];
        DB::table('news_videos')->insert($data);
    }
}
