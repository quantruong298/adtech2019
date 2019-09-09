<?php

namespace App\Http\Controllers\api;
use App\Models\AdGroup;
use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertiserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertiser_emails = Advertiser::get('email')->toArray();
        return response()->json($advertiser_emails);

    }
    public function campaigns(Request $request)
    {
        $email = $request->input('advertiserEmails');
        $campaigns = [];
        for ($i = 0; $i < count($email); $i++)
        {
            $campaigns[$i] = DB::table('campaigns')
                ->join('media', 'campaigns.media_id', '=', 'media.id')
                ->join('flags', 'campaigns.flag_id', '=', 'flags.id')
                ->join('campaigns_detail', 'campaigns.id', '=', 'campaigns_detail.id')
                ->join('objectives', 'campaigns_detail.objective_id', '=', 'objectives.id')
                ->join('std_bidding_methods', 'campaigns_detail.std_bidding_method_id', '=', 'std_bidding_methods.id')
                ->join('campaign_budget_types', 'campaigns_detail.budget_type_id', '=', 'campaign_budget_types.id')
                ->join('campaign_statuses', 'campaigns_detail.id', '=', 'campaign_statuses.id')
                ->join('delivery_statuses','campaign_statuses.delivery_status_id', '=', 'delivery_statuses.id' )
                ->select('campaigns.id', 'campaigns.name', 'campaigns_detail.status', 'media.name as media_name', 'flags.flag_name as flag_name', 'campaigns_detail.kpi as kpi', 'objectives.name as object_name', 'campaign_budget_types.name as budget_type', 'campaigns_detail.campaign_period_budget', 'campaigns_detail.std_daily_budget', 'std_bidding_methods.name as bidding_name', 'campaigns_detail.period_from', 'campaigns_detail.period_to', 'delivery_statuses.name as delivery_status_name')
                ->where('advertiser_email', $email[$i])->get();
        }
        return response()->json($campaigns);
    }

    public function showAdgroups()
    {
        $adgroups = AdGroup::get('name')->toArray();
        //dd($adgroups );
        return response()->json($adgroups);
    }
    public function adgroups($id, Request $request)
    {
        $email = $request->input('advertiserEmails');
        $adgroups = [];
        for ($i = 0; $i < count($email); $i = $i + 1)
        {
            $adgroups[$i] = DB::table('ad_groups')
                ->join('campaigns', 'ad_groups.campaign_id', '=', 'campaigns.id')
                ->join('ad_groups_detail', 'ad_groups.id', '=', 'ad_groups_detail.id')
                ->join('flags', 'ad_groups.flag_id', '=', 'flags.id')
                ->join('std_bidding_methods', 'ad_groups_detail.std_bidding_method_id', '=', 'std_bidding_methods.id')
                ->select('ad_groups.id', 'ad_groups.name', 'ad_groups_detail.status', 'campaigns.name as campaign_name', 'flags.flag_name as flag_name', 'ad_groups_detail.period_from', 'ad_groups_detail.period_to', 'ad_groups_detail.ag_period_budget', 'ad_groups_detail.ag_period_budget_from', 'ad_groups_detail.ag_period_budget_to', 'ad_groups_detail.std_daily_budget', 'std_bidding_methods.name as std_bidding_method_name', 'ad_groups_detail.std_bidding_amount' )
                ->where('advertiser_email', $email[$i])
                ->where('campaign_id', $id)
                ->get();
        }
        return response()->json($adgroups);
    }

    public function ads($id, $param, Request $request)
    {
        $email = $request->input('advertiserEmails');
        $ads = [];
        for ($i = 0; $i < count($email); $i = $i + 1)
        {
            $ads[$i] = DB::table('ads')
                ->join('campaigns', 'ads.campaign_id', '=', 'campaigns.id')
                ->join('ad_groups', 'ads.ad_group_id', '=', 'ad_groups.id')
                ->join('flags', 'ads.flag_id', '=', 'flags.id')
                ->join('ads_detail','ads.id', '=', 'ads_detail.id')
                ->join('std_bidding_methods', 'ads_detail.std_bidding_method_id', '=', 'std_bidding_methods.id')
                ->join('creative_types', 'ads_detail.creative_type_id', '=', 'creative_types.id')
                ->select('ads.id', 'ads.name', 'ads_detail.status', 'campaigns.name as campaign_name', 'ad_groups.name as ad_group_name', 'flags.flag_name', 'ads_detail.creative_preview', 'creative_types.name as create_type_name', 'ads_detail.spent', 'ads_detail.click_through_rate', 'ads_detail.cost_bidding', 'ads_detail.period_from', 'ads_detail.period_to', 'ads_detail.ads_period_budget', 'ads_detail.ads_period_budget_from', 'ads_detail.ads_period_budget_to', 'ads_detail.std_daily_budget', 'std_bidding_methods.name')
                ->where('advertiser_email', $email[$i])
                ->where('ads.campaign_id', $id)
                ->where('ads.ad_group_id', $param)
                ->get();
        }
        return response()->json($ads);

    }

}

