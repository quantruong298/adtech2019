<?php

namespace App\Http\Controllers\api\v2\reporting;

use App\CampaignPerformance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use DateInterval;
use DateTime;
class CampaignPerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* CampaignPerformance::all();*/
        return Config::get('SQL.CampaignPerformanceIndex');
//        return DB::table('publisher_campaigns_performance')
//        ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
//        ->leftJoin('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','publisher_campaigns_status.campaign_id')
//        ->select(
//            'publisher_campaigns_performance.campaign_id',
//            'publisher_campaigns_status.delivery_status',
//            'publisher_campaigns.account_id','publisher_campaigns.media_id',
//            'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
//            'publisher_campaigns.period_to','publisher_campaigns.period_budget',
//            DB::raw("SUM(actual_clicks) as total_clicks ,
//                     SUM(actual_impressions) as total_views,
//                     SUM(actual_cost) as total_costs,
//                     SUM(actual_25per_completions) as total_25per_completions,
//                     SUM(actual_50per_completions) as total_50per_completions,
//                     SUM(actual_75per_completions) as total_75per_completions,
//                     SUM(actual_100per_completions) as total_100per_completions,
//                     SUM(actual_sum_of_skips) as total_skips
//                    "))
//        ->groupBy('campaign_id')->get();
    }

    public function showAccordingToDate($id,$fromDay=null,$toDay=null)
    {
        if ($fromDay!=null&&$toDay!=null){
            return Config::get('SQL.CampaignPerformanceShowDate1');
//            return DB::table('publisher_campaigns_performance')
//                ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
//                ->leftJoin('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','=','publisher_campaigns_status.campaign_id')
//                ->select(
//                    'publisher_campaigns_performance.campaign_id',
//                    'publisher_campaigns_status.delivery_status',
//                    'publisher_campaigns.account_id','publisher_campaigns.media_id',
//                    'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
//                    'publisher_campaigns.period_to','publisher_campaigns.period_budget',
//                    DB::raw("DATE(publisher_campaigns_performance.report_date_time) as date,
//                     SUM(actual_clicks) as total_clicks ,
//                     SUM(actual_impressions) as total_views,
//                     SUM(actual_cost) as total_costs,
//                     SUM(actual_25per_completions) as total_25per_completions,
//                     SUM(actual_50per_completions) as total_50per_completions,
//                     SUM(actual_75per_completions) as total_75per_completions,
//                     SUM(actual_100per_completions) as total_100per_completions,
//                     SUM(actual_sum_of_skips) as total_skips
//                    "))
//                ->where('publisher_campaigns_performance.campaign_id','=',$id)
//                ->whereBetween('publisher_campaigns_performance.report_date_time',[$fromDay,$toDay])
//                ->groupBy(DB::raw('date(publisher_campaigns_performance.report_date_time)'))->get();
        }
    return  Config::get('SQL.CampaignPerformanceShowDate2');
//        return DB::table('publisher_campaigns_performance')
//            ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
//            ->leftJoin('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','publisher_campaigns_status.campaign_id')
//            ->select(
//                'publisher_campaigns_performance.campaign_id',
//                'publisher_campaigns_status.delivery_status',
//                'publisher_campaigns.account_id','publisher_campaigns.media_id',
//                'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
//                'publisher_campaigns.period_to','publisher_campaigns.period_budget',
//                DB::raw("DATE(publisher_campaigns_performance.report_date_time) as date,
//                     SUM(actual_clicks) as total_clicks ,
//                     SUM(actual_impressions) as total_views,
//                     SUM(actual_cost) as total_costs,
//                     SUM(actual_25per_completions) as total_25per_completions,
//                     SUM(actual_50per_completions) as total_50per_completions,
//                     SUM(actual_75per_completions) as total_75per_completions,
//                     SUM(actual_100per_completions) as total_100per_completions,
//                     SUM(actual_sum_of_skips) as total_skips
//                    "))
//            ->where('publisher_campaigns_performance.campaign_id','=',$id)
//            ->groupBy(DB::raw('date(publisher_campaigns_performance.report_date_time)'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccordingToHour($id,$date)
    {
        return Config::get('SQL.CampaignPerformanceShowHour');
//        return DB::table('publisher_campaigns_performance')
//            ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
//            ->leftJoin('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','publisher_campaigns_status.campaign_id')
//            ->select(
//                'publisher_campaigns_performance.campaign_id',
//                'publisher_campaigns_status.delivery_status',
//                'publisher_campaigns.account_id','publisher_campaigns.media_id',
//                'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
//                'publisher_campaigns.period_to','publisher_campaigns.period_budget',
//                DB::raw("hour(publisher_campaigns_performance.report_date_time) as hour,
//                     SUM(actual_clicks) as total_clicks ,
//                     SUM(actual_impressions) as total_views,
//                     SUM(actual_cost) as total_costs,
//                     SUM(actual_25per_completions) as total_25per_completions,
//                     SUM(actual_50per_completions) as total_50per_completions,
//                     SUM(actual_75per_completions) as total_75per_completions,
//                     SUM(actual_100per_completions) as total_100per_completions,
//                     SUM(actual_sum_of_skips) as total_skips
//                    "))
//            ->where('publisher_campaigns_performance.campaign_id','=',$id)
//            ->where(DB::raw('date(publisher_campaigns_performance.report_date_time)'),'=',$date)
//            ->groupBy(DB::raw('hour(publisher_campaigns_performance.report_date_time)'))->get();
    }

    public function showAccordingToDay($id){
        $date= date("Y-m-d");
        return $this->showAccordingToHour($id,$date);
    }
    public function showAccordingThisWeek($id){
        $currentDate= date("Y-m-d");
        $firstDay = date('Y-m-d', strtotime("this week"));
        //dd($firstDay,$currentDate);
        return $this->showAccordingToDate($id,$firstDay,$currentDate);
    }
    public function showAccordingThisMonth($id){
        $currentDate=date("Y-m-d");
        $firstDay = date('Y-m-d', strtotime("first day of this month"));
        //dd($firstDay,$currentDate);
        return $this->showAccordingToDate($id,$firstDay,$currentDate);
    }

}
