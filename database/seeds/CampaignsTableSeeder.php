<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignsTableSeeder extends Seeder
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
        $advertisers = DB::table('advertiser_accounts')->select('email', 'media_id')->get()->toArray();
        for ($i = 0; $i < 20; $i++) {
            $advertiser = $faker->randomElement($advertisers);
            $dataInsert[] = [
                'name'=>$faker->name,
                'advertiser_email' => $advertiser->email,
                'media_id' =>$advertiser->media_id,
                'flag_id' => $faker->randomElement($flags),
            ];
        }
        DB::table('campaigns')->insert($dataInsert);
    }
}
