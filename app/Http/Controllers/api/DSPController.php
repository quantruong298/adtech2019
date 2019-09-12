<?php

namespace App\Http\Controllers\api;

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
            ->select('ads.*','ads_detail.*','creative_types.name as creative_type','std_bidding_methods.name as bidding_method')
            ->get();
        return $ads;
    }
    public function result(Request $request){
        return response()->json([
            'status' => 200,
            'message' => 'OK',
        ]);
    }
}
