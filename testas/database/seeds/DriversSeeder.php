<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
        'name' => 'Rasa Rasaitė',
        'city' => 'Zarasai',        
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    }
}
