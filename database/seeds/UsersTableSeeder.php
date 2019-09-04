<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $dataInsert = [];
        $dataInsert[] = [
            'name' => 'intern fellow',
            'email' => 'admin@gmail.com',
            'role_id'=>1,
            'status_id' => 1,
            'gender'=> 1,
            'year_of_birth' =>1997,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => bcrypt(12345678),
        ];
        $dataInsert[] = [
            'name' => 'media fellow',
            'email' => 'media@gmail.com',
            'role_id'=>\App\Enums\Roles::MP,
            'status_id' => 1,
            'gender'=> 1,
            'year_of_birth' =>1997,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => bcrypt(12345678),
        ];
        $roles = DB::table('auth_roles')->get()->pluck('id')->toArray();
        $statues = DB::table('auth_statuses')->get()->pluck('id')->toArray();
        for ($i = 0; $i < 24; $i++) {
            $dataInsert[] = [
                'name' => $faker->userName,
                'email' => $faker->email,
                'role_id'=>$faker->randomElement($roles),
                'status_id' => $faker->randomElement($statues),
                'gender'=> rand(0,1),
                'year_of_birth' =>rand(1901,Carbon::now()->year),
                'email_verified_at' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
                'created_at' => $faker->dateTimeBetween($startDate = '-12 months', $endDate = '-6 months'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
                'password' => bcrypt(12345678),
            ];
        }
        DB::table('users')->insert($dataInsert);
    }
}
