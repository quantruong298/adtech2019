<?php

use App\CampaignPerformance;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//get all campaigns to advertiser_email
Route::get('campaigns-to-email/{email}', 'api\CampaignToEmailController@index');
Route::get('advertiser-emails', 'api\AdvertiserAccountController@index');
Route::post('campaigns', 'api\AdvertiserAccountController@campaigns');
Route::get('ad-groups','api\AdvertiserAccountController@showAdgroups');
Route::post('campaigns/{id}/ad-groups', 'api\AdvertiserAccountController@adgroups');
Route::post('campaigns/{id?}/ad-groups/{param?}/ads', 'api\AdvertiserAccountController@ads');

Route::post('bidding', 'api\DSPController@bidding');
Route::post('result', 'api\DSPController@resutl');

Route::post('auth/register', 'api\UserController@register');
Route::post('auth/login', 'api\SocialAccountController@login');
Route::group(['middleware' => 'jwt.auth'], function () {Route::get('user-info', 'api\UserController@getUserInfo');
});
//Route::get('social_accounts/ad_performance_report','api\CampaignController@index');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('social_accounts/campaigns','api\v2\reporting\CampaignPerformanceController@index');
    Route::get('social_accounts/campaigns/{campaign_id}/adgroups','api\v2\reporting\AdgroupPerformanceController@index');
    Route::get('social_accounts/campaigns/{campaign_id}/adgroups/{adgroup_id}/ads/','api\v2\reporting\AdgroupPerformanceController@index');

    Route::get('social_accounts/campaigns/{id}/report-date','api\v2\reporting\CampaignPerformanceController@showAccordingToDate');
    Route::get('social_accounts/campaigns/{id}/report-hour/{date}','api\v2\reporting\CampaignPerformanceController@showAccordingToHour');

    Route::get('social_accounts/adgroups/{id}/report-date','api\v2\reporting\AdgroupPerformanceController@showAccordingToDate');
    Route::get('social_accounts/adgroups/{id}/report-hour/{date}','api\v2\reporting\AdgroupPerformanceController@showAccordingToHour');

    Route::get('social_accounts/ads/{id}/report-date','api\v2\reporting\AdPerformanceController@showAccordingToDate');
    Route::get('social_accounts/ads/{id}/report-hour/{date}','api\v2\reporting\AdPerformanceController@showAccordingToHour');


    Route::get('social_accounts/campaigns/{id}/report-today','api\v2\reporting\CampaignPerformanceController@showAccordingToDay');
    Route::get('social_accounts/campaigns/{id}/report-this-week','api\v2\reporting\CampaignPerformanceController@showAccordingThisWeek');
    Route::get('social_accounts/campaigns/{id}/report-this-month','api\v2\reporting\CampaignPerformanceController@showAccordingThisMonth');



});
Route::group(['middleware' => 'cors'], function () {
    Route::get('social_accounts/ad_performance_report','api\CampaignController@index');
});
/*Route::resources([
    'campaigns'=>'api\v2\reporting\CampaignPerformanceController',
    'adgroups'=>'api\v2\reporting\AdgroupPerformanceController',
    'ads'=>'api\v2\reporting\AdPerformanceController'
]);*/
Route::get('test',function (){
/*   return DB::table('publisher_campaigns_performance')
        ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
        ->join('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','publisher_campaigns_status.campaign_id')
        ->select(
            'publisher_campaigns_performance.campaign_id',
            'publisher_campaigns_status.delivery_status',
            'publisher_campaigns.account_id','publisher_campaigns.media_id',
            'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
            'publisher_campaigns.period_to','publisher_campaigns.period_budget',
            DB::raw("SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips
                     
                    
                    "))
            ->groupBy('campaign_id')->get();*/
    /*return DB::table('publisher_adgroups_performance')
        ->join('publisher_adgroups','publisher_adgroups_performance.adgroup_id','publisher_adgroups.adgroup_id')
        ->join('publisher_campaigns','publisher_adgroups.campaign_id','publisher_campaigns.campaign_id')
        ->join('publisher_campaigns_status','publisher_adgroups.campaign_id','publisher_campaigns_status.campaign_id')
        ->select(
            'publisher_adgroups_performance.adgroup_performance_id',
            'publisher_adgroups_performance.adgroup_id',
            'publisher_campaigns_status.delivery_status',
            'publisher_campaigns.account_id','publisher_campaigns.media_id',
            'publisher_adgroups.adgroup_name','publisher_adgroups.period_from',
            'publisher_adgroups.period_to','publisher_adgroups.period_budget',
            DB::raw("SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips
                     
                    
                    "))
        ->groupBy('publisher_adgroups_performance.adgroup_id')->get();*/
   /* return DB::table('publisher_ads_performance')
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
        ->groupBy('publisher_ads_performance.ad_id')->get();*/
    /*return DB::table('publisher_campaigns_performance')
        ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
        ->join('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','publisher_campaigns_status.campaign_id')
        ->select(
            'publisher_campaigns_performance.campaign_id',
            'publisher_campaigns_status.delivery_status',
            'publisher_campaigns.account_id','publisher_campaigns.media_id',
            'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
            'publisher_campaigns.period_to','publisher_campaigns.period_budget',
            DB::raw("DATE(publisher_campaigns_performance.report_date_time) as hour,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
        ->where('publisher_campaigns_performance.campaign_id','=',1)
        ->groupBy(DB::raw('date(publisher_campaigns_performance.report_date_time)'))->get();*/
    /*return DB::table('publisher_campaigns_performance')
        ->join('publisher_campaigns','publisher_campaigns_performance.campaign_id','publisher_campaigns.campaign_id')
        ->join('publisher_campaigns_status','publisher_campaigns_performance.campaign_id','publisher_campaigns_status.campaign_id')
        ->select(
            'publisher_campaigns_performance.campaign_id',
            'publisher_campaigns_status.delivery_status',
            'publisher_campaigns.account_id','publisher_campaigns.media_id',
            'publisher_campaigns.campaign_name','publisher_campaigns.period_from',
            'publisher_campaigns.period_to','publisher_campaigns.period_budget',
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
        ->where('publisher_campaigns_performance.campaign_id','=',1)
        ->where(DB::raw('date(publisher_campaigns_performance.report_date_time)'),'=','2016-10-12')
        ->groupBy(DB::raw('hour(publisher_campaigns_performance.report_date_time)'))->get();*/
    /*return DB::table('publisher_adgroups_performance')
        ->join('publisher_adgroups','publisher_adgroups_performance.adgroup_id','publisher_adgroups.adgroup_id')
        ->join('publisher_campaigns','publisher_adgroups.campaign_id','publisher_campaigns.campaign_id')
        ->join('publisher_campaigns_status','publisher_adgroups.campaign_id','publisher_campaigns_status.campaign_id')
        ->select(
            'publisher_adgroups_performance.adgroup_performance_id',
            'publisher_adgroups_performance.adgroup_id',
            'publisher_campaigns_status.delivery_status',
            'publisher_campaigns.account_id','publisher_campaigns.media_id',
            'publisher_adgroups.adgroup_name','publisher_adgroups.period_from',
            'publisher_adgroups.period_to','publisher_adgroups.period_budget',
            DB::raw("DATE(publisher_adgroups_performance.report_date_time) as hour,
                     SUM(actual_clicks) as total_clicks ,
                     SUM(actual_impressions) as total_views,
                     SUM(actual_cost) as total_costs,
                     SUM(actual_25per_completions) as total_25per_completions,
                     SUM(actual_50per_completions) as total_50per_completions,
                     SUM(actual_75per_completions) as total_75per_completions,
                     SUM(actual_100per_completions) as total_100per_completions,
                     SUM(actual_sum_of_skips) as total_skips                 
                    "))
        ->where('publisher_adgroups_performance.adgroup_id','=',1)
        ->where(DB::raw('date(publisher_adgroups_performance.report_date_time)'),'=','2012-11-11')
        ->groupBy(DB::raw('date(publisher_adgroups_performance.report_date_time)'))
        ->get();*/

});
