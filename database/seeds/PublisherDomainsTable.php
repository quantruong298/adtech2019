<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherDomainsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisherAccounts = DB::table('publisher_accounts')->select('id')->get()->pluck('id')->toArray();
        $flags = DB::table('flags')->get()->pluck('id')->toArray();
        $faker = Faker\Factory::create();
        $dataInsert=[];
        for($i=0;$i<30;$i++){
            $dataInsert[]=[
                'url'=>$faker->domainName,
                'account_id'=>$faker->randomElement($publisherAccounts),
                'flag_id'=>$faker->randomElement($flags)
            ];
        }
        DB::table('publisher_domains')->insert($dataInsert);
    }
}
