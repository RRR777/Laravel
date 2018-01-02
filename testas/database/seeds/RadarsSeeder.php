<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RadarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('radars')->insert([
        'date' => Carbon::create(2017, 11, 15, 23, 25, 50),
        'number' => 'BBB111',
        'distance' => 14,
        'time' => 8,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    }
}
