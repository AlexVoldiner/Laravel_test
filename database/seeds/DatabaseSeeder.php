<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('hierarchy')->insert([
            'full_name' => str_random(6),
            'position' => 'Director',
            'start_date' => \Carbon\Carbon::now(),
            'salary' => rand(120000, 140000),
            'dir_id' => 0,
        ]);
        for ($i = 2; $i <= 500; $i++) {

            DB::table('hierarchy')->insert([
                'full_name' => str_random(6),
                'position' => 'ProjectManager',
                'start_date' => \Carbon\Carbon::now(),
                'salary' => rand(90000, 120000),
                'dir_id' => 1,
            ]);
        }
        for ($i = 501; $i <= 5000; $i++) {

            DB::table('hierarchy')->insert([
                'full_name' => str_random(6),
                'position' => 'TeamLead',
                'start_date' => \Carbon\Carbon::now(),
                'salary' => rand(70000, 90000),
                'dir_id' => rand(2, 500),
            ]);
        }
        for ($i = 5001; $i <= 25000; $i++) {

            DB::table('hierarchy')->insert([
                'full_name' => str_random(6),
                'position' => 'Senior',
                'start_date' => \Carbon\Carbon::now(),
                'salary' => rand(50000, 70000),
                'dir_id' => rand(501, 5000),
            ]);
        }
        for ($i = 25001; $i <= 40000; $i++) {

            DB::table('hierarchy')->insert([
                'full_name' => str_random(6),
                'position' => 'Middle',
                'start_date' => \Carbon\Carbon::now(),
                'salary' => rand(25000, 50000),
                'dir_id' => rand(5001, 25000),
            ]);
        }
        for ($i = 40001; $i <= 50000; $i++) {

            DB::table('hierarchy')->insert([
                'full_name' => str_random(6),
                'position' => 'Junior',
                'start_date' => \Carbon\Carbon::now(),
                'salary' => rand(10000, 25000),
                'dir_id' => rand(25001, 40000),
            ]);
        }
    }
}