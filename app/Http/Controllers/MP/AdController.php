<?php

namespace App\Http\Controllers\MP;

use App\Enums\Pagination;
use App\Helpers\DateTime;
use App\Http\Controllers\Controller;
use App\Http\Requests\MP\StoreAd;
use App\Http\Requests\MP\UpdateAd;
use App\Models\Ad;
use App\Models\AdDetail;
use App\Models\AdGroup;
use App\Models\AdGroupDetail;
use App\Models\Campaign;
use App\Models\CreativeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use JD\Cloudder\Facades\Cloudder;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy('id', 'desc')->paginate(Pagination::MEDIA_PLAN);
        return view('Component.MP.dashboard',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdGroup($id){
        $adgroup = AdGroup::find($id);
        return view('Component.MP.Ads.adgroupDetail',compact('adgroup'));
    }
    public function create()
    {
        $adgroups = AdGroup::all();
        $creativeTypes = CreativeType::all();
        return view('Component.MP.Ads.add',compact('adgroups','creativeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAd $request)
    {
        $ad = new Ad();
        $ad->name = $request->name;
        $ad->campaign_id = AdGroup::find($request->ad_group_id)->campaign_id;
        $ad->ad_group_id = $request->ad_group_id;
        $ad->flag_id = 1;
        $ad->save();
        $adDetail = new AdDetail();
        $adDetail->creative_type_id = $request->creative_type_id;
        $adDetail->creative_preview = $this->uploadFile($request->file('creative_preview'));
        $adDetail->url = $request->url;
        $adDetail->spent = 111;
        $adDetail->click_through_rate = 111;
        $adDetail->cost_bidding = $request->cost_bidding;
        $adDetail->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $adDetail->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $adDetail->ads_period_budget = $request->ads_period_budget;
        $adDetail->ads_period_budget_from = $request->ads_period_budget_from;
        $adDetail->ads_period_budget_to = $request->ads_period_budget_to;
        $adDetail->std_daily_budget = $request->std_daily_budget;
        $adDetail->std_bidding_method_id = AdGroupDetail::find($request->ad_group_id)->std_bidding_method_id;
        $adDetail->std_bidding_amount = $request->std_daily_budget;
        $ad->adDetail()->save($adDetail);
        return $ad->name;
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
        $adgroups = AdGroup::all();
        $creativeTypes = CreativeType::all();
        $ad = Ad::find($id);
        return view('Component.MP.Ads.edit',compact('adgroups','creativeTypes','ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAd $request, $id)
    {
        $ad = Ad::find($id);
        $ad->name = $request->name;
        $ad->campaign_id = AdGroup::find($request->ad_group_id)->campaign_id;
        $ad->ad_group_id = $request->ad_group_id;
        $ad->flag_id = 1;
        $ad->save();
        $adDetail = AdDetail::find($id);
        $adDetail->creative_type_id = $request->creative_type_id;
        $adDetail->creative_preview = $request->creative_preview;
        $adDetail->url = $request->url;
        $adDetail->spent = 111;
        $adDetail->click_through_rate = 111;
        $adDetail->cost_bidding = $request->cost_bidding;
        $adDetail->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $adDetail->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $adDetail->ads_period_budget = $request->ads_period_budget;
        $adDetail->ads_period_budget_from = $request->ads_period_budget_from;
        $adDetail->ads_period_budget_to = $request->ads_period_budget_to;
        $adDetail->std_daily_budget = $request->std_daily_budget;
        $adDetail->std_bidding_method_id = AdGroupDetail::find($request->ad_group_id)->std_bidding_method_id;
        $adDetail->std_bidding_amount = $request->std_daily_budget;
        $ad->adDetail()->save($adDetail);
        return $ad->name;
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
    public function uploadFile($file){
        Cloudder::upload($file);
        return "http://res.cloudinary.com/hfmikccfm/image/upload/".Cloudder::getPublicId().".jpg";
    }
}
