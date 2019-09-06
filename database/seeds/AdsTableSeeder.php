<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsTableSeeder extends Seeder
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
        $adGroups = DB::table('ad_groups')->select('id', 'campaign_id')->get()->toArray();
        $creativeTypeIds = DB::table('creative_types')->get()->pluck('id')->toArray();
        for ($i = 0; $i < 300; $i++) {
            $adGroup = $faker->randomElement($adGroups);
            $dataAdsInsert[] = [
                'name'=>$faker->name,
                'campaign_id' =>$adGroup->campaign_id,
                'ad_group_id'=>$adGroup->id,
                'flag_id' => $faker->randomElement($flags),
            ];
            $adGroupDetail = DB::table('ad_groups_detail')->where('id',$adGroup->id)->first();
            $adPeriodFrom = $faker->dateTimeBetween($adGroupDetail->period_from,$adGroupDetail->period_to);
            $adPeriodBudget = rand(5000000,$adGroupDetail->ag_period_budget);
            $adPeriodBudgetFrom = rand(50000,$adPeriodBudget);
            $status = $faker->boolean;
            $dataAdsDetailInsert[]=[
                'status'=>$status,
                'creative_preview'=>$faker->imageUrl($width = 640, $height = 480),
                'creative_type_id'=>$faker->randomElement($creativeTypeIds),
                'spent'=>123,
                'click_through_rate'=>123,
                'cost_bidding'=>rand(5000,50000),
                'period_from'=>$adPeriodFrom,
                'period_to'=>$faker->dateTimeBetween($adPeriodFrom,$adGroupDetail->period_to),
                'ads_period_budget'=>$adPeriodBudget,
                'ads_period_budget_from'=>$adPeriodBudgetFrom,
                'ads_period_budget_to'=>rand($adPeriodBudgetFrom,$adPeriodBudget),
                'std_daily_budget'=>rand(50000,$adPeriodBudget),
                'std_bidding_method_id'=>$adGroupDetail->std_bidding_method_id,
                'std_bidding_amount'=>rand(500,50000),
            ];
            if($status==1){
                DB::table('ad_groups_detail')->where('id',$adGroup->id)->update(['status'=>1]);
                DB::table('campaigns_detail')->where('id',$adGroup->campaign_id)->update(['status'=>1]);
            }
        }
        DB::table('ads')->insert($dataAdsInsert);
        DB::table('ads_detail')->insert($dataAdsDetailInsert);
    }
}
