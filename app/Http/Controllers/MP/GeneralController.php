<?php

namespace App\Http\Controllers\MP;

use App\Enums\Pagination;
use App\Models\Ad;
use App\Models\AdGroup;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class GeneralController extends Controller
{
    public function index(){
        $campaigns = Campaign::orderBy('id', 'desc')->paginate(Pagination::MEDIA_PLAN);
        return view('Component.MP.dashboard',compact('campaigns'));
    }
    public function getAdGroupsByCampaignId($id){
        $adgroups = AdGroup::where('campaign_id',$id)->orderBy('id', 'desc')->paginate(Pagination::MEDIA_PLAN);
        return view('Component.MP.General.adgroups',compact('adgroups'));
    }
    public function getAdsByAdGroupId($id){
        $campaignId = AdGroup::find($id)->campaign_id;
        $ads = Ad::where('ad_group_id',$id)->orderBy('id', 'desc')->paginate(Pagination::MEDIA_PLAN);
        return view('Component.MP.General.ads',['ads'=>$ads,'campaignId'=>$campaignId]);
    }
}
