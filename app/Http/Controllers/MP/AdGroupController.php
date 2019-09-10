<?php

namespace App\Http\Controllers\MP;

use App\Enums\Pagination;
use App\Helpers\DateTime;
use App\Http\Controllers\Controller;
use App\Http\Requests\MP\StoreAdGroup;
use App\Http\Requests\MP\UpdateAdGroup;
use App\Models\AdGroup;
use App\Models\AdGroupDetail;
use App\Models\Campaign;
use Illuminate\Http\Request;

class AdGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adgroups = AdGroup::orderBy('id', 'desc')->paginate(Pagination::MEDIA_PLAN);
        return view('Component.MP.dashboard',compact('adgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaigns = Campaign::all();
        return view('Component.MP.AdGroup.add',compact('campaigns'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdGroup $request)
    {
        $adgroup = new AdGroup();
        $adgroup->name=$request->name;
        $adgroup->campaign_id = $request->campaign_id;
        $adgroup->flag_id = 1;
        $adgroup->save();
        $adgroupDetail = new AdGroupDetail();
        $adgroupDetail->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $adgroupDetail->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $adgroupDetail->ag_period_budget=$request->ag_period_budget;
        $adgroupDetail->ag_period_budget_from=$request->ag_period_budget_from;
        $adgroupDetail->ag_period_budget_to=$request->ag_period_budget_to;
        $adgroupDetail->std_daily_budget=$request->std_daily_budget;
        $adgroupDetail->std_bidding_method_id = Campaign::find($request->campaign_id)->std_bidding_method_id;
        $adgroupDetail->std_bidding_amount = $request->std_bidding_amount;
        $adgroup->adGroupDetail()->save($adgroupDetail);
        return $adgroup->adgroup_name;
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
        $campaigns = Campaign::all();
        $adGroup = AdGroup::find($id);
        return view('Component.MP.AdGroup.edit',compact('campaigns','adGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdGroup $request, $id)
    {
        $adgroup = AdGroup::find($id);
        $adgroup->name=$request->name;
        $adgroup->campaign_id = $request->campaign_id;
        $adgroup->flag_id = 1;
        $adgroup->save();
        $adgroupDetail = AdGroupDetail::find($id);
        $adgroupDetail->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $adgroupDetail->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $adgroupDetail->ag_period_budget=$request->ag_period_budget;
        $adgroupDetail->ag_period_budget_from=$request->ag_period_budget_from;
        $adgroupDetail->ag_period_budget_to=$request->ag_period_budget_to;
        $adgroupDetail->std_daily_budget=$request->std_daily_budget;
        $adgroupDetail->std_bidding_method_id = Campaign::find($request->campaign_id)->std_bidding_method_id;
        $adgroupDetail->std_bidding_amount = $request->std_bidding_amount;
        $adgroup->adGroupDetail()->save($adgroupDetail);
        return $adgroup->adgroup_name;
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
