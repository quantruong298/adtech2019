<?php

namespace App\Http\Controllers\api;

use App\Models\Ad;
use App\Models\AdDetail;
use App\Models\Campaign;
use App\Models\CampaignDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Campaign::all();
    }

    public function campaignRecommend(){
        $time = Carbon::now();
        $ads = Ad::with('adDetail')->where('ad_detail.period_from','<=',$time)->get();
//        $ads = Ad::with('adDetail')->where('ads_detail.period_from','<=',$time)->where('ads_detail.period_to','>=',$time)->get();
        return $ads;
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
