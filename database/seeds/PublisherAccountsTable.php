<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherAccountsTable extends Seeder
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
        $dataInsert=[];
        for($i=0;$i<30;$i++){
            $dataInsert[]=[
                'name'=>$faker->userName,
                'email'=>$email = $faker->userName,
                'client_id'=>$email.time(),
                'password'=>bcrypt('12345678'),
                'flag_id'=>$faker->randomElement($flags)
            ];
        }
        DB::table('publisher_accounts')->insert($dataInsert);
    }
}
