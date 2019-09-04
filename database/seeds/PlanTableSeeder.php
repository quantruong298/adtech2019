<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $campaigns = DB::table('campaigns')
            ->join('campaigns_detail','campaigns.id','=','campaigns_detail.id')
            ->select('campaigns.id', 'media_id','period_from','period_to')->get();
        foreach ($campaigns as $campaign) {
            $adGroupIds = DB::table('ad_groups')
                ->where('campaign_id', '=', $campaign->id)
                ->select('id')->get()->pluck('id')->toArray();
            for ($i=0;$i<3;$i++) {
                $periodFrom = $faker->dateTimeBetween($campaign->period_from,$campaign->period_to);
                $dataInsert[] = [
                    'media_id' => $campaign->media_id,
                    'campaign_id' => $campaign->id,
                    'ad_group_id'=>$faker->randomElement($adGroupIds),
                    'area_name'=>$faker->domainWord,
                    'period_from'=>$periodFrom,
                    'period_to'=>$faker->dateTimeBetween($periodFrom,$campaign->period_to),
                    'flag_id'=>$faker->randomElement($flags),
                ];
            }
        }
        DB::table('mp_plans')->insert($dataInsert);
    }
}
