<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignBudgetTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['In Total','Monthly','Unlimited'];
        $dataInsert=[];
        foreach ($types as $type){
            $dataInsert[]=[
                'name'=>$type
            ];
        }
        DB::table('campaign_budget_types')->insert($dataInsert);
    }
}
