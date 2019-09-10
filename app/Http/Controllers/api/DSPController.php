<?php

namespace App\Http\Controllers\api;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DSPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $ads = DB::table('ads')
            ->join('ads_detail', 'ads.id', '=', 'ads_detail.id')
            ->join('creative_types','ads_detail.creative_type_id','=','creative_types.id')
            ->join('std_bidding_methods','ads_detail.std_bidding_method_id','=','std_bidding_methods.id')
            ->where('period_from','<=',$now)
            ->where('period_to','>=',$now)
            ->select('ads.*','ads_detail.*','creative_types.name AS creative_type','std_bidding_methods.name AS bidding_method')
            ->get();
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
