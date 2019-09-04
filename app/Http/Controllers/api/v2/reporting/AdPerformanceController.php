<?php

namespace App\Http\Controllers\api\v2\reporting;

use App\AdPerformance;
use App\CampaignPerformance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdPerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* CampaignPerformance::all();*/
        return DB::table('publisher_ads_performance')
            ->join('publisher_ads','publisher_ads_performance.ad_id','publisher_ads.ad_id')
            ->join('publisher_adgroups','publisher_ads.adgroup_id','publisher_adgroups.adgroup_id')
            ->join('publisher_campaigns','publisher_adgroups.campaign_id','publisher_campaigns.campaign_id')
            ->join('publisher_campaigns_status','publisher_campaigns.campaign_id','publisher_campaigns_status.campaign_id')
            ->select(
                'publisher_ads_performance.ad_performance_id',
                'publisher_ads_performance.ad_id',
                'publisher_campaigns_status.delivery_status',
                'publisher_campaigns.account_id','publisher_campaigns.media_id',
                'publisher_ads.ad_name','publisher_ads.period_from',
                'publisher_ads.period_to','publisher_ads.period_budget',
                DB::raw("SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips
                    "))
            ->groupBy('publisher_ads_performance.ad_id')->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccordingToDate($id)
    {
        return DB::table('publisher_ads_performance')
            ->join('publisher_ads','publisher_ads_performance.ad_id','publisher_ads.ad_id')
            ->join('publisher_adgroups','publisher_ads.adgroup_id','publisher_adgroups.adgroup_id')
            ->join('publisher_campaigns','publisher_adgroups.campaign_id','publisher_campaigns.campaign_id')
            ->join('publisher_campaigns_status','publisher_campaigns.campaign_id','publisher_campaigns_status.campaign_id')
            ->select(
                'publisher_ads_performance.ad_performance_id',
                'publisher_ads_performance.ad_id',
                'publisher_campaigns_status.delivery_status',
                'publisher_campaigns.account_id','publisher_campaigns.media_id',
                'publisher_ads.ad_name','publisher_ads.period_from',
                'publisher_ads.period_to','publisher_ads.period_budget',
                DB::raw("DATE(publisher_ads_performance.report_date_time) as date,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
            ->where('publisher_ads_performance.ad_id','=',$id)
            ->groupBy(DB::raw('date(publisher_ads_performance.report_date_time)'))
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccordingToHour($id,$date)
    {
        return DB::table('publisher_ads_performance')
            ->join('publisher_ads','publisher_ads_performance.ad_id','publisher_ads.ad_id')
            ->join('publisher_adgroups','publisher_ads.adgroup_id','publisher_adgroups.adgroup_id')
            ->join('publisher_campaigns','publisher_adgroups.campaign_id','publisher_campaigns.campaign_id')
            ->join('publisher_campaigns_status','publisher_campaigns.campaign_id','publisher_campaigns_status.campaign_id')
            ->select(
                'publisher_ads_performance.ad_performance_id',
                'publisher_ads_performance.ad_id',
                'publisher_campaigns_status.delivery_status',
                'publisher_campaigns.account_id','publisher_campaigns.media_id',
                'publisher_ads.ad_name','publisher_ads.period_from',
                'publisher_ads.period_to','publisher_ads.period_budget',
                DB::raw("HOUR(publisher_ads_performance.report_date_time) as hour,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
            ->where('publisher_ads_performance.ad_id','=',$id)
            ->where(DB::raw('date(publisher_ads_performance.report_date_time)'),'=',$date)
            ->groupBy(DB::raw('hour(publisher_ads_performance.report_date_time)'))
            ->get();

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return AdPerformance::where('ad_id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
