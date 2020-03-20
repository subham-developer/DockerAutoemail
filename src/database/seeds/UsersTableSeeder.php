<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Sargar',
                'email' => 'sagar@nimapinfotech.com',
                'email_verified_at' => '',
                'password' => '1511919f603e917ae2f763b63c5c15b6',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Priyank',
                'email' => 'priyank@nimapinfotech.com',
                'email_verified_at' => '',
                'password' => '8562ae5e286544710b2e7ebe9858833b',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sonatan Bera',
                'email' => 'sonatan@nimapinfotech.com',
                'email_verified_at' => '',
                'password' => 'cda72177eba360ff16b7f836e2754370',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kunal Jagtap',
                'email' => 'kunaljagtap@nimapinfotech.com',
                'email_verified_at' => '',
                'password' => 'cda72177eba360ff16b7f836e2754370',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Brijesh',
                'email' => 'brijesh@nimapinfotech.com',
                'email_verified_at' => '',
                'password' => 'cda72177eba360ff16b7f836e2754370',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sonali',
                'email' => 'sonali@nimapinfotech.com',
                'email_verified_at' => '',
                'password' => 'cda72177eba360ff16b7f836e2754370',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
