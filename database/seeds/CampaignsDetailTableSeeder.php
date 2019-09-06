<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        //$campaignIds = DB::table('campaigns')->pluck('id')->toArray();
        $objectiveIds = DB::table('objectives')->pluck('id')->toArray();
        $budgetTypeIds = DB::table('campaign_budget_types')->pluck('id')->toArray();
        $stdBiddingMethodIds = DB::table('std_bidding_methods')->pluck('id')->toArray();
        for ($i = 0; $i < 20; $i++) {
            $dataInsert[] = [
                'status'=>0,
                'kpi'=> rand(10000,10000000),
                'objective_id' => $faker->randomElement($objectiveIds),
                'period_from' => $faker->dateTimeBetween('-40 days', '-20 days'),
                'period_to' => $faker->dateTimeBetween('+30 days', '+60 days'),
                'budget_type_id'=>$faker->randomElement($budgetTypeIds),
                'campaign_period_budget'=>rand(500000000,1000000000),
                'std_daily_budget'=>rand(50000000,500000000),
                'std_bidding_method_id'=>$faker->randomElement($stdBiddingMethodIds),
            ];
        }
        DB::table('campaigns_detail')->insert($dataInsert);
    }
}
