<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $media = ['Google','Facebook','Instagram','Zalo'];
        $dataInsert=[];
        foreach ($media as $m){
            $dataInsert[]=[
                "name"=>$m
            ];
        }
        DB::table('media')->insert($dataInsert);

    }
}
