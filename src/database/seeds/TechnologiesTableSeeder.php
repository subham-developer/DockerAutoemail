<?php

use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
            [
                'technology' => 'Angualr JS',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'PHP',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'JAVA',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => '.Net',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'HTML',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'CSS',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'Node Js',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'Javascript',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'Python',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'technology' => 'React JS',
                'deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
