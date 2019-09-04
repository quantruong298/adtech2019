<?php

use Illuminate\Database\Seeder;

class DeliveryStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Active','Not Delivering','Paused'];
        $dataInsert=[];
        foreach ($statuses as $status){
            $dataInsert[]=[
                'name'=>$status,
            ];
        }
        DB::table('delivery_statuses')->insert($dataInsert);
    }
}
