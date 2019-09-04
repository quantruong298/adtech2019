<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdGroupPerformancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ad_groups_performances')->truncate();
        DB::table('ad_groups_performance_detail')->truncate();
        $faker = Faker\Factory::create();
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $adGroups = DB::table('ads_performances')
            ->groupBy('ad_group_id')->select('campaign_id','ad_group_id')->get();
        $dataPerformancesInsert=[];
        $dataPerformanceDetailInsert=[];
        foreach ($adGroups as $adGroup){
            $reportDates = DB::table('ads_performances')
                ->where('ad_group_id','=',$adGroup->ad_group_id)
                ->groupBy('report_datetime')
                ->select('report_datetime')->get()->pluck('report_datetime')->toArray();

            foreach ($reportDates as $reportDate){
                $dataPerformancesInsert[]=[
                    'campaign_id'=>$adGroup->campaign_id,
                    'ad_group_id'=>$adGroup->ad_group_id,
                    'report_datetime'=>$reportDate,
                    'flag_id'=>$faker->randomElement($flags)
                ];
                $reports = DB::table('ads_performances')
                    ->join('ads_performance_detail','ads_performances.id','=','ads_performance_detail.id')
                    ->where('report_datetime','=',$reportDate)
                    ->where('ad_group_id','=',$adGroup->ad_group_id);
                $dataPerformanceDetailInsert[]=[
                    'actual_impressions' => $reports ->sum('actual_impressions'),
                    'actual_cost' => $reports ->sum('actual_cost'),
                    'actual_clicks' => $reports ->sum('actual_clicks'),
                    'actual_views' =>$reports ->sum('actual_views'),
                    'actual_25per_completions' => $reports ->sum('actual_25per_completions'),
                    'actual_50per_completions' =>$reports ->sum('actual_50per_completions'),
                    'actual_75per_completions' => $reports ->sum('actual_75per_completions'),
                    'actual_100per_completions' => $reports ->sum('actual_100per_completions'),
                    'actual_sum_of_skips'=>$reports->sum('actual_sum_of_skips')
                ];
            }
        }
        DB::table('ad_groups_performances')->insert($dataPerformancesInsert);
        DB::table('ad_groups_performance_detail')->insert($dataPerformanceDetailInsert);
    }
}
