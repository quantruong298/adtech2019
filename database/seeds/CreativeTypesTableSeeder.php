<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreativeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=['Image','Video','GIF'];
        $dataInsert=[];
        foreach ($types as $type){
            $dataInsert[]=[
                'name'=>$type,
            ];
        }
        DB::table('creative_types')->insert($dataInsert);
    }
}
