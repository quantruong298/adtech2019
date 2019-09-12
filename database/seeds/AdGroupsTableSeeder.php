<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdGroupsTableSeeder extends Seeder
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
        $campaignIds = DB::table('campaigns')->where('flag_id','!=',3)->get()->pluck('id')->toArray();
        for ($i = 0; $i < 100; $i++) {
            $campaignId = $faker->randomElement($campaignIds);
            $dataAdGroupsInsert[] = [
                'name'=>$faker->name,
                'campaign_id' =>$campaignId,
                'flag_id' => $faker->randomElement($flags),
            ];
            $campaign = DB::table('campaigns_detail')->where('id','=',$campaignId)->first();
            $periodFrom = $faker->dateTimeBetween($campaign->period_from,$campaign->period_to);
            $adGroupPeriodBudget = rand(100000000,$campaign->campaign_period_budget);
            $adGroupPeriodBudgetFrom = rand(10000000,$adGroupPeriodBudget);
            $dataAdGroupsDetailInsert[]=[
              'status'=>0,
              'period_from'=>$periodFrom,
              'period_to'=>$faker->dateTimeBetween($periodFrom,$campaign->period_to),
              'ag_period_budget'=> $adGroupPeriodBudget,
              'ag_period_budget_from'=>$adGroupPeriodBudgetFrom,
              'ag_period_budget_to'=>rand($adGroupPeriodBudgetFrom,$adGroupPeriodBudget),
              'std_daily_budget'=>rand(1000000,100000000),
              'std_bidding_method_id'=>$campaign->std_bidding_method_id,
              'std_bidding_amount'=>rand(0,$adGroupPeriodBudget),
            ];
        }
        DB::table('ad_groups')->insert($dataAdGroupsInsert);
        DB::table('ad_groups_detail')->insert($dataAdGroupsDetailInsert);
    }
}
