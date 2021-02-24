<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data = [
            [
                'name'=>'Paints',
                'email'=>'info@paint.com',
                'password'=>bcrypt('paint@123'),
                'publish'=>1,
                'role'=>'admin',
                'flag'=>1,
               
            ],
            [
                'name'=>'Paint',
                'email'=>'info@user.com',
                'password'=>bcrypt('secret'),
                'publish'=>1,
                'role'=>'admin',
                'flag'=>1,
                           ]
            ];
        \App\User::insert($data);
    }
}
