<?php

namespace App\Http\Controllers\api;

use App\Models\AdDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DSPController extends Controller
{
    public function bidding(Request $request)
    {
        $now = Carbon::now();
        $ads = DB::table('ads')
            ->join('ads_detail', 'ads.id', '=', 'ads_detail.id')
            ->join('creative_types','ads_detail.creative_type_id','=','creative_types.id')
            ->join('std_bidding_methods','ads_detail.std_bidding_method_id','=','std_bidding_methods.id')
            ->where('period_from','<=',$now)
            ->where('period_to','>=',$now)
            ->where('status','!=',0)
            ->select('ads.*','ads_detail.*','creative_types.name as creative_type','std_bidding_methods.name as bidding_method')
            ->get();
        return $ads;
    }
    public function result(Request $request){
        $results = $request->toArray();
        foreach ($results as $result){
             if($result["status"]=="won"){
                 $adDetail = AdDetail::find($result["id"]);
                 $currentBudget = $adDetail->ads_period_budget;
                 $price_won = $result["price_won"];
                 $adDetail->ads_period_budget = $currentBudget - $price_won;
                 $adDetail->save();
                 break;
             }
        }
        return response()->json([
            'status' => 200,
            'message' => 'OK',
        ]);
    }
}
