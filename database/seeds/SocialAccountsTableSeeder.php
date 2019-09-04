<?php

use Illuminate\Database\Seeder;

class SocialAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $dataInsert[] = [
                'name' => $faker->userName,
                'email' => $faker->email,
                'domain'=>$faker->domainName,
                'password' => bcrypt(12345678),
            ];
        }
        DB::table('social_accounts')->insert($dataInsert);
    }
}
