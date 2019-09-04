<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('campaign_statuses')->truncate();
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $campaigns = DB::table('campaigns')->select('id')->get()->pluck('id')->toArray();
        $deliveryStatuses = DB::table('delivery_statuses')->get()->pluck('id')->toArray();
        foreach ($campaigns as $campaign){
            $dataInsert[]=[
                'update_datetime'=>$faker->dateTime,
                'delivery_status_id'=>$faker->randomElement($deliveryStatuses),
                'flag_id'=>1
            ];
        }
        DB::table('campaign_statuses')->insert($dataInsert);
    }
}
