<?php

use Illuminate\Database\Seeder;

class ObjectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objectives = ['visit my website', 'purchase'];
        $dataInsert =[];
            foreach($objectives as $objective){
                $dataInsert[] = [
                    'name'=>$objective
                ];
            }
        DB::table('objectives')->insert($dataInsert);
    }
}
