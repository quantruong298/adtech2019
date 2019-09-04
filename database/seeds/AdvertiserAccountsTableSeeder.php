<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertiserAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $media = DB::table('media')->get()->pluck('id')->toArray();
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $dataInsert = [];
        for ($i = 0; $i < 24; $i++) {
            $dataInsert[] = [
                'email'=>$faker->email,
                'account_name' => $faker->userName,
                'media_id' => $faker->randomElement($media),
                'client_name'=>$faker->name,
                'created_at' => $faker->dateTimeBetween($startDate = '-12 months', $endDate = '-6 months'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
                'flag_id'=>$faker->randomElement($flags),
            ];
        }
        DB::table('advertiser_accounts')->insert($dataInsert);
    }
}
