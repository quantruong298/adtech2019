<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flags = ['available', 'deleted', 'suspended'];
        $dataInsert = [];
        foreach ($flags as $flag){
            $dataInsert[]=[
                'flag_name'=>$flag
            ];
        }
        DB::table('flags')->insert($dataInsert);
    }
}
