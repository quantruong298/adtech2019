<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsPerformancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $dataInsert=[];
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $ads = DB::table('ads')
            ->join('ads_detail','ads.id','=','ads_detail.id')
            ->select('ads.id','ads.campaign_id','ads.ad_group_id','ads_detail.period_from','ads_detail.std_bidding_amount')
            ->get()->toArray();
        $dataPerformancesInsert=[];
        $dataPerformanceDetailInsert=[];
        foreach ($ads as $ad){
            $reportDate = new DateTime($ad->period_from);
            $impression = 0;
            $clicks = 0;
            $views = 0;
            $skips =0;
            for ($i=0;$i<10;$i++){
                $impression+=$impressionEachDay = rand(0,100);
                $dataPerformancesInsert[]=[
                  'campaign_id'=>$ad->campaign_id,
                  'ad_group_id'=>$ad->ad_group_id,
                  'ads_id'=>$ad->id,
                  'report_datetime'=>$reportDate->add(new DateInterval('P1D'))->format('Y-m-d'),
                  'flag_id'=>$faker->randomElement($flags)
                ];
                $cost = $ad->std_bidding_amount*$impression;
                $clicks +=  rand(0,$impressionEachDay);
                $views += rand(0,$impressionEachDay);
                $skips += rand(0,$impressionEachDay);
                $dataPerformanceDetailInsert[]=[
                   'actual_impressions' =>$impression,
                   'actual_cost' =>$cost,
                   'actual_clicks' =>$clicks,
                   'actual_views' =>$views,
                   'actual_25per_completions' =>25,
                   'actual_50per_completions' =>50,
                   'actual_75per_completions' =>75,
                   'actual_100per_completions' =>100,
                   'actual_sum_of_skips'=>$skips
                ];
            }
        }
        foreach (array_chunk($dataPerformancesInsert,1000) as $chunk){
            DB::table('ads_performances')->insert($chunk);
        }
        foreach (array_chunk($dataPerformanceDetailInsert,1000) as $chunk){
            DB::table('ads_performance_detail')->insert($chunk);
        }
    }
}
