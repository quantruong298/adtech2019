<?php

return [
    'AdgroupPerformanceIndex' => '
       DB::table(\'publisher_adgroups_performance\')
                ->join(\'publisher_adgroups\',\'publisher_adgroups_performance.adgroup_id\',\'publisher_adgroups.adgroup_id\')
                ->join(\'publisher_campaigns\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->join(\'publisher_campaigns_status\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_adgroups_performance.adgroup_performance_id\',
                    \'publisher_adgroups_performance.adgroup_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_adgroups.adgroup_name\',\'publisher_adgroups.period_from\',
                    \'publisher_adgroups.period_to\',\'publisher_adgroups.period_budget\',
                    DB::raw("SUM(actual_clicks) as total_clicks ,
                         SUM(actual_impressions) as total_views,
                         SUM(actual_cost) as total_costs,
                         SUM(actual_25per_completions) as total_25per_completions,
                         SUM(actual_50per_completions) as total_50per_completions,
                         SUM(actual_75per_completions) as total_75per_completions,
                         SUM(actual_100per_completions) as total_100per_completions,
                         SUM(actual_sum_of_skips) as total_skips
                         
                        
                        "))
                ->groupBy(\'publisher_adgroups_performance.adgroup_id\')->get()
   ',
    'AdgroupPerformanceShowDate' => '
        DB::table(\'publisher_adgroups_performance\')
                ->join(\'publisher_adgroups\',\'publisher_adgroups_performance.adgroup_id\',\'publisher_adgroups.adgroup_id\')
                ->join(\'publisher_campaigns\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->join(\'publisher_campaigns_status\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_adgroups_performance.adgroup_performance_id\',
                    \'publisher_adgroups_performance.adgroup_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_adgroups.adgroup_name\',\'publisher_adgroups.period_from\',
                    \'publisher_adgroups.period_to\',\'publisher_adgroups.period_budget\',
                    DB::raw("DATE(publisher_adgroups_performance.report_date_time) as date,
                         SUM(actual_clicks) as total_clicks ,
                         SUM(actual_impressions) as total_views,
                         SUM(actual_cost) as total_costs,
                         SUM(actual_25per_completions) as total_25per_completions,
                         SUM(actual_50per_completions) as total_50per_completions,
                         SUM(actual_75per_completions) as total_75per_completions,
                         SUM(actual_100per_completions) as total_100per_completions,
                         SUM(actual_sum_of_skips) as total_skips                 
                        "))
                ->where(\'publisher_adgroups_performance.adgroup_id\',\'=\',$id)
                ->groupBy(DB::raw(\'date(publisher_adgroups_performance.report_date_time)\'))
                ->get()
    ',
    'AdgroupPerformanceShowHour' => '
        DB::table(\'publisher_adgroups_performance\')
                ->join(\'publisher_adgroups\',\'publisher_adgroups_performance.adgroup_id\',\'publisher_adgroups.adgroup_id\')
                ->join(\'publisher_campaigns\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->join(\'publisher_campaigns_status\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_adgroups_performance.adgroup_performance_id\',
                    \'publisher_adgroups_performance.adgroup_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_adgroups.adgroup_name\',\'publisher_adgroups.period_from\',
                    \'publisher_adgroups.period_to\',\'publisher_adgroups.period_budget\',
                    DB::raw("HOUR(publisher_adgroups_performance.report_date_time) as hour,
                         SUM(actual_clicks) as total_clicks ,
                         SUM(actual_impressions) as total_views,
                         SUM(actual_cost) as total_costs,
                         SUM(actual_25per_completions) as total_25per_completions,
                         SUM(actual_50per_completions) as total_50per_completions,
                         SUM(actual_75per_completions) as total_75per_completions,
                         SUM(actual_100per_completions) as total_100per_completions,
                         SUM(actual_sum_of_skips) as total_skips                 
                        "))
                ->where(\'publisher_adgroups_performance.adgroup_id\',\'=\',$id)
                ->where(DB::raw(\'date(publisher_adgroups_performance.report_date_time)\'),\'=\',$date)
                ->groupBy(DB::raw(\'hour(publisher_adgroups_performance.report_date_time)\'))
                ->get()
    ',

    'AdPerformanceIndex' => '
        DB::table(\'publisher_ads_performance\')
                ->join(\'publisher_ads\',\'publisher_ads_performance.ad_id\',\'publisher_ads.ad_id\')
                ->join(\'publisher_adgroups\',\'publisher_ads.adgroup_id\',\'publisher_adgroups.adgroup_id\')
                ->join(\'publisher_campaigns\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->join(\'publisher_campaigns_status\',\'publisher_campaigns.campaign_id\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_ads_performance.ad_performance_id\',
                    \'publisher_ads_performance.ad_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_ads.ad_name\',\'publisher_ads.period_from\',
                    \'publisher_ads.period_to\',\'publisher_ads.period_budget\',
                    DB::raw("SUM(actual_clicks) as total_clicks ,
                         SUM(actual_impressions) as total_views,
                         SUM(actual_cost) as total_costs,
                         SUM(actual_25per_completions) as total_25per_completions,
                         SUM(actual_50per_completions) as total_50per_completions,
                         SUM(actual_75per_completions) as total_75per_completions,
                         SUM(actual_100per_completions) as total_100per_completions,
                         SUM(actual_sum_of_skips) as total_skips
                        "))
                ->groupBy(\'publisher_ads_performance.ad_id\')->get()
    ',

    'AdPerformanceShowDate' => '
        DB::table(\'publisher_ads_performance\')
                ->join(\'publisher_ads\',\'publisher_ads_performance.ad_id\',\'publisher_ads.ad_id\')
                ->join(\'publisher_adgroups\',\'publisher_ads.adgroup_id\',\'publisher_adgroups.adgroup_id\')
                ->join(\'publisher_campaigns\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->join(\'publisher_campaigns_status\',\'publisher_campaigns.campaign_id\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_ads_performance.ad_performance_id\',
                    \'publisher_ads_performance.ad_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_ads.ad_name\',\'publisher_ads.period_from\',
                    \'publisher_ads.period_to\',\'publisher_ads.period_budget\',
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
                ->where(\'publisher_ads_performance.ad_id\',\'=\',$id)
                ->groupBy(DB::raw(\'date(publisher_ads_performance.report_date_time)\'))
                ->get()
    ',
    'AdPerformanceShowHour' => '
        DB::table(\'publisher_ads_performance\')
                ->join(\'publisher_ads\',\'publisher_ads_performance.ad_id\',\'publisher_ads.ad_id\')
                ->join(\'publisher_adgroups\',\'publisher_ads.adgroup_id\',\'publisher_adgroups.adgroup_id\')
                ->join(\'publisher_campaigns\',\'publisher_adgroups.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->join(\'publisher_campaigns_status\',\'publisher_campaigns.campaign_id\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_ads_performance.ad_performance_id\',
                    \'publisher_ads_performance.ad_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_ads.ad_name\',\'publisher_ads.period_from\',
                    \'publisher_ads.period_to\',\'publisher_ads.period_budget\',
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
                ->where(\'publisher_ads_performance.ad_id\',\'=\',$id)
                ->where(DB::raw(\'date(publisher_ads_performance.report_date_time)\'),\'=\',$date)
                ->groupBy(DB::raw(\'hour(publisher_ads_performance.report_date_time)\'))
                ->get()
    ',

    'CampaignPerformanceIndex' => '
    DB::table(\'publisher_campaigns_performance\')
        ->join(\'publisher_campaigns\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns.campaign_id\')
        ->leftJoin(\'publisher_campaigns_status\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns_status.campaign_id\')
        ->select(
            \'publisher_campaigns_performance.campaign_id\',
            \'publisher_campaigns_status.delivery_status\',
            \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
            \'publisher_campaigns.campaign_name\',\'publisher_campaigns.period_from\',
            \'publisher_campaigns.period_to\',\'publisher_campaigns.period_budget\',
            DB::raw("SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
        ->groupBy(\'campaign_id\')->get()
    ',

    'CampaignPerformanceShowDate1' => '
    DB::table(\'publisher_campaigns_performance\')
                ->join(\'publisher_campaigns\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns.campaign_id\')
                ->leftJoin(\'publisher_campaigns_status\',\'publisher_campaigns_performance.campaign_id\',\'=\',\'publisher_campaigns_status.campaign_id\')
                ->select(
                    \'publisher_campaigns_performance.campaign_id\',
                    \'publisher_campaigns_status.delivery_status\',
                    \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                    \'publisher_campaigns.campaign_name\',\'publisher_campaigns.period_from\',
                    \'publisher_campaigns.period_to\',\'publisher_campaigns.period_budget\',
                    DB::raw("DATE(publisher_campaigns_performance.report_date_time) as date,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
                ->where(\'publisher_campaigns_performance.campaign_id\',\'=\',$id)
                ->whereBetween(\'publisher_campaigns_performance.report_date_time\',[$fromDay,$toDay])
                ->groupBy(DB::raw(\'date(publisher_campaigns_performance.report_date_time)\'))->get()
    ',
    'CampaignPerformanceShowDate2' => '
    return DB::table(\'publisher_campaigns_performance\')
            ->join(\'publisher_campaigns\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns.campaign_id\')
            ->leftJoin(\'publisher_campaigns_status\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns_status.campaign_id\')
            ->select(
                \'publisher_campaigns_performance.campaign_id\',
                \'publisher_campaigns_status.delivery_status\',
                \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                \'publisher_campaigns.campaign_name\',\'publisher_campaigns.period_from\',
                \'publisher_campaigns.period_to\',\'publisher_campaigns.period_budget\',
                DB::raw("DATE(publisher_campaigns_performance.report_date_time) as date,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
            ->where(\'publisher_campaigns_performance.campaign_id\',\'=\',$id)
            ->groupBy(DB::raw(\'date(publisher_campaigns_performance.report_date_time)\'))->get()
    ',
    'CampaignPerformanceShowHour' => '
    DB::table(\'publisher_campaigns_performance\')
            ->join(\'publisher_campaigns\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns.campaign_id\')
            ->leftJoin(\'publisher_campaigns_status\',\'publisher_campaigns_performance.campaign_id\',\'publisher_campaigns_status.campaign_id\')
            ->select(
                \'publisher_campaigns_performance.campaign_id\',
                \'publisher_campaigns_status.delivery_status\',
                \'publisher_campaigns.account_id\',\'publisher_campaigns.media_id\',
                \'publisher_campaigns.campaign_name\',\'publisher_campaigns.period_from\',
                \'publisher_campaigns.period_to\',\'publisher_campaigns.period_budget\',
                DB::raw("hour(publisher_campaigns_performance.report_date_time) as hour,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
            ->where(\'publisher_campaigns_performance.campaign_id\',\'=\',$id)
            ->where(DB::raw(\'date(publisher_campaigns_performance.report_date_time)\'),\'=\',$date)
            ->groupBy(DB::raw(\'hour(publisher_campaigns_performance.report_date_time)\'))->get()
    '
];
