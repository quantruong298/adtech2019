<?php

namespace App\Http\Controllers\MP;

use App\Enums\Pagination;
use App\Helpers\DateTime;
use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use App\Models\BiddingMethod;
use App\Models\BudgetType;
use App\Models\Campaign;
use App\Models\CampaignDetail;
use App\Models\Media;
use App\Models\Objective;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::orderBy('id', 'desc')->paginate(Pagination::MEDIA_PLAN);
        return view('Component.MP.dashboard',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medias = Media::all();
        $advertisers = Advertiser::all();
        $objectives = Objective::all();
        $budgetTypes= BudgetType::all();
        $biddingMethods = BiddingMethod::all();
        return view('Component.MP.Campaign.add',compact('medias','advertisers','objectives','budgetTypes','biddingMethods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campaign = new Campaign();
        $campaign->name=$request->name;
        $campaign->media_id=$request->media_id;
        $campaign->advertiser_email=$request->advertiser_email;
        $campaign->flag_id = 1;
        $campaign->save();
        $campaignDetail = new CampaignDetail();
        $campaignDetail->kpi=$request->kpi;
        $campaignDetail->objective_id=$request->objective_id;
        $campaignDetail->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $campaignDetail->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $campaignDetail->budget_type_id=$request->budget_type_id;
        $campaignDetail->campaign_period_budget=$request->campaign_period_budget;
        $campaignDetail->std_daily_budget=$request->std_daily_budget;
        $campaignDetail->std_bidding_method_id = $request->std_bidding_method_id;
        $campaign->campaignDetail()->save($campaignDetail);
        return $campaign;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::find($id);
        $medias = Media::all();
        $advertisers = Advertiser::all();
        $objectives = Objective::all();
        $budgetTypes= BudgetType::all();
        $biddingMethods = BiddingMethod::all();
        return view('Component.MP.Campaign.edit',compact('campaign','medias','advertisers','objectives','budgetTypes','biddingMethods'));
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
        $campaign = Campaign::find($id);
        $campaign->name=$request->name;
        $campaign->media_id=$request->media_id;
        $campaign->advertiser_email=$request->advertiser_email;
        $campaign->flag_id = 1;
        $campaign->save();
        $campaignDetail = CampaignDetail::find($id);
        $campaignDetail->kpi=$request->kpi;
        $campaignDetail->objective_id=$request->objective_id;
        $campaignDetail->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $campaignDetail->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $campaignDetail->budget_type_id=$request->budget_type_id;
        $campaignDetail->campaign_period_budget=$request->campaign_period_budget;
        $campaignDetail->std_daily_budget=$request->std_daily_budget;
        $campaignDetail->std_bidding_method_id = $request->std_bidding_method_id;
        $campaign->campaignDetail()->save($campaignDetail);
        return response()->json([
            'data' => $campaign->name,
        ], 200);
        //        return $campaign->name;
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
