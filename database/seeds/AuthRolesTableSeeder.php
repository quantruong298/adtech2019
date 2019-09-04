<?php

use Illuminate\Database\Seeder;

class AuthRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=['Admin','User','Media Planning','Advertiser','DMP','SSP','DSP','Publisher'];
        $dataInsert = [];
        foreach ($roles as $role){
            $dataInsert[]=[
                'name'=>$role
            ];
        }
        DB::table('auth_roles')->insert($dataInsert);
    }
}
