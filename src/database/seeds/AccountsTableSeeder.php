<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
                'name' => 'amit sharma',
                'phone' => '9987776656',
                'email' => 'amitsharma@nimapinfotech.com',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
