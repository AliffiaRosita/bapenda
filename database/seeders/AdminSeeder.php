<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        for ($i=1; $i <= 1; $i++) {
            $data[$i]=
                [
                    'name' => "Admin",
                    'img'=>'',
                    'user_id'=> $i,

                ];
        }
        DB::table('admins')->insert($data);
    }
}
