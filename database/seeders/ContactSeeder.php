<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email'=>"bapenda@kaltimprov.go.id",
            'phone_number'=>"(0541) 734969",
            'address'=>"Jl. Mayjend. M.T Haryono, Samarinda",
            'facebook'=>"https://www.facebook.com/bapenda.prov.kaltim/",
            'twitter'=>'https://twitter.com/BapendaKaltim/',
            'instagram'=>'https://www.instagram.com/bapendakaltim/',
            'youtube'=>'https://www.youtube.com/@bapendaprov.kaltim3600',
        ];
        DB::table('contacts')->insert($data);
    }
}
