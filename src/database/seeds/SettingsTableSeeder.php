<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'address' => '41, 4th floor A-wing, Todi Industrial Estate Sun Mill compound Road, Lower Parel, Mumbai, Maharashtra 400013',
            'logo' => '/docs/logo.png',
            'contact' => '070214 31876',
            'accountant_email' => 'mahesh@nimapinfotech.com',
            'cc_email' => 'mahesh@nimapinfotech.com,sagar@nimapinfotech.com',
            'salesperson' => 'mahesh@nimapinfotech.com',
            'from_email' => 'mahesh@nimapinfotech.com',
            'tech_head_email' => 'mahesh@nimapinfotech.com',
            'geofence_email' => 'mahesh@nimapinfotech.com',
            'reminder_email' => 'mahesh@nimapinfotech.com,sagar@nimapinfotech.com',
            'reminder_days' => '30',
            'deleted' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
