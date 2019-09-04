<?php

use Illuminate\Database\Seeder;

class AuthStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses=['active','non active','block'];
        $dataInsert = [];
        foreach ($statuses as $status){
            $dataInsert[]=[
                'name'=>$status
            ];
        }
        DB::table('auth_statuses')->insert($dataInsert);
    }
}
