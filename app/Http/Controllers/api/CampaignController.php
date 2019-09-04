<?php

namespace App\Http\Controllers\api;


use App\CampaignPerformance;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    public function index(){
        $campaigns = CampaignPerformance::with('adgroups.adses')->get();
        return $campaigns;
    }
    public function show($id){

    }
    public function campaignReportingHours(){

    }
    public function campaignReportingDates(){

    }
}