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
				'url' => 'https://www.youtube.com/watch?v=0Oyy6_7YT1E',
				'thumbnail' => 'news-thumbnail/thumbnail1.jpg',
				'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SIMPATOR, CEK PAJAK KENDARAAN MAKIN MUDAH, INOVASI BAPENDA KEDEPANKAN TRANSPARANSI',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','SIMPATOR, CEK PAJAK KENDARAAN MAKIN MUDAH, INOVASI BAPENDA KEDEPANKAN TRANSPARANSI'),
				'url' => 'https://www.youtube.com/watch?v=ezYredi2bYQ',
				'thumbnail' => 'news-thumbnail/thumbnail2.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'INOVASI SAMSAT PANGKAS WAKTU HEMAT BIAYA',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','INOVASI SAMSAT PANGKAS WAKTU HEMAT BIAYA'),
				'url' => 'https://www.youtube.com/watch?v=rg9gfPVcMYo',
				'thumbnail' => 'news-thumbnail/thumbnail3.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'LAYANAN E-SAMSAT BAPENDA DAN BANKALTIMTARA',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','LAYANAN E-SAMSAT BAPENDA DAN BANKALTIMTARA'),
				'url' => 'https://www.youtube.com/watch?v=Ri0Kp_alBF0',
				'thumbnail' => 'news-thumbnail/thumbnail4.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'Samsat Delivery Pos (SADELPOS)',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','Samsat Delivery Pos (SADELPOS)'),
				'url' => 'https://www.youtube.com/watch?v=QPGTeHPHSQU',
				'thumbnail' => 'news-thumbnail/thumbnail5.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-SAMSAT BHABINKAMBTIBMAS',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-SAMSAT BHABINKAMBTIBMAS'),
				'url' => 'https://www.youtube.com/watch?v=qEzS_0jYs1o',
				'thumbnail' => 'news-thumbnail/thumbnail6.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-Samsat LinkAja!',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-Samsat LinkAja!'),
				'url' => 'https://www.youtube.com/watch?v=sm1Jn83iK4I',
				'thumbnail' => 'news-thumbnail/thumbnail7.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-Samsat Dalam Genggaman Bhabin',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-Samsat Dalam Genggaman Bhabin'),
				'url' => 'https://www.youtube.com/watch?v=hfJTX_b_QJU',
				'thumbnail' => 'news-thumbnail/thumbnail8.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'SIMPATOR (Sistem Informasi Monitoring Pajak Kendaraan Bermotor)',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','SIMPATOR (Sistem Informasi Monitoring Pajak Kendaraan Bermotor)'),
				'url' => 'https://www.youtube.com/watch?v=D4mZw4WVb18',
				'thumbnail' => 'news-thumbnail/thumbnail9.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],
			[
				'title' => 'E-Samsat Dalam Genggaman Bhabinkamtibmas',
				'desc' => '',
				'slug' => SlugService::createSlug(NewsVideo::class,'slug','E-Samsat Dalam Genggaman Bhabinkamtibmas'),
				'url' => 'https://www.youtube.com/watch?v=9yi9iMbptoc',
				'thumbnail' => 'news-thumbnail/thumbnail10.jpg',
                'user_id' => 1,
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now()
			],

        ];
        DB::table('news_videos')->insert($data);
    }
}
