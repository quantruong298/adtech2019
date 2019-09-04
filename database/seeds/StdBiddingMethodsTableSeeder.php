<?php

use Illuminate\Database\Seeder;

class StdBiddingMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('std_bidding_methods')->truncate();
        $biddingMethodType=['Cost Per 1000 Impressions','Cost Per Click'];
        $biddingMethodCode=['cpm','cpc'];
        $dataInsert=[];
        for($i=0;$i<sizeof($biddingMethodType);$i++){
            $dataInsert[]=[
                'name'=>$biddingMethodType[$i],
                'code'=>$biddingMethodCode[$i],
            ];
        }
        DB::table('std_bidding_methods')->insert($dataInsert);
    }
}
