<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignPerformancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_performances')->truncate();
        DB::table('campaign_performance_detail')->truncate();
        $faker = Faker\Factory::create();
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $campaigns = DB::table('ad_groups_performances')
            ->groupBy('campaign_id')->select('campaign_id','campaign_name')->get();
        $dataPerformancesInsert=[];
        $dataPerformanceDetailInsert=[];
        foreach ($campaigns as $campaign){
            $reportDates = DB::table('ad_groups_performances')
                ->where('campaign_id','=',$campaign->campaign_id)
                ->groupBy('report_datetime')
                ->select('report_datetime')->get()->pluck('report_datetime')->toArray();
            foreach ($reportDates as $reportDate){
                $dataPerformancesInsert[]=[
                    'campaign_id'=>$campaign->campaign_id,
                    'campaign_name'=>$campaign->campaign_name,
                    'report_datetime'=>$reportDate,
                    'flag_id'=>$faker->randomElement($flags)
                ];
                $reports = DB::table('ad_groups_performances')
                    ->join('ad_groups_performance_detail','ad_groups_performances.id','=','ad_groups_performance_detail.id')
                    ->where('report_datetime','=',$reportDate)
                    ->where('campaign_id','=',$campaign->campaign_id);
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
        DB::table('campaign_performances')->insert($dataPerformancesInsert);
        DB::table('campaign_performance_detail')->insert($dataPerformanceDetailInsert);
    }
}
