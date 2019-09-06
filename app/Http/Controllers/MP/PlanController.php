<?php

namespace App\Http\Controllers\MP;

use App\Helpers\DateTime;
use App\Http\Controllers\Controller;
use App\Http\Requests\MP\StorePlan;
use App\Http\Requests\MP\UpdatePlan;
use App\Models\Campaign;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::orderBy('id', 'desc')->paginate(5);
        return view('Component.MP.dashboard',compact('plans'));
    }
    public function getCampaign($id){
        $campaign = Campaign::find($id);
        return view('Component.MP.Plan.campaignDetail',compact('campaign'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaigns = Campaign::all();
        return view('Component.MP.Plan.add',compact('campaigns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlan $request)
    {
        $plan = new Plan();
        $plan->area_name=$request->area_name;
        $plan->media_id = Campaign::find($request->campaign_id)->media_id;
        $plan->campaign_id=$request->campaign_id;
        $plan->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $plan->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $plan->flag_id=1;
        $plan->save();
        return $plan->plan_name;
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
        $plan = Plan::find($id);
        return view('Component.MP.Plan.edit',compact('campaigns','plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlan $request, $id)
    {
        $plan = Plan::find($id);
        $plan->area_name=$request->area_name;
        $plan->media_id = Campaign::find($request->campaign_id)->media_id;
        $plan->campaign_id=$request->campaign_id;
        $plan->period_from = Datetime::handlerDateTime($request->period_from_date, $request->period_from_time);
        $plan->period_to=Datetime::handlerDateTime($request->period_to_date, $request->period_to_time);
        $plan->flag_id=1;
        $plan->save();
        return $plan->plan_name;
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
