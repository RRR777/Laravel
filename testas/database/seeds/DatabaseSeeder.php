<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::create([
            'email' => 'admin@mail',
            'name' => "Petras Adminas",
            'password' => bcrypt('123')
        ]);

        \App\User::create([
            'email' => 'rrr@mail',
            'name' => "Rita",
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'email' => 'rasa@mail',
            'name' => "Rasa",
            'password' => bcrypt('456789')
        ]);
        //  $this->call(RadarsSeeder::class);
      
        //DB::table('radars')->insert([
        \App\Radar::create([
        'date' => Carbon::create(2017, 10, 10, 10, 20, 50),
        'number' => 'AAA111',
        'distance' => 8,
        'time' => 7,
        'user_id' => 1,
        'creator_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Radar::create([
        'date' => Carbon::create(2017, 11, 11, 11, 21, 51),
        'number' => 'BBB222',
        'distance' => 11,
        'time' => 4,
        'user_id' => 1,
        'creator_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Radar::create([
        'date' => Carbon::create(2017, 12, 12, 12, 22, 52),
        'number' => 'CCC333',
        'distance' => 10,
        'time' => 6,
        'user_id' => 1,
        'creator_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Radar::create([
        'date' => Carbon::create(2017, 13, 13, 13, 23, 53),
        'number' => 'EEE555',
        'distance' => 9,
        'time' => 5,
        'user_id' => 1,
        'creator_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        //DB::table('drivers')->insert([
        \App\Driver::create([
        'name' => 'Rasa Rasaitė',
        'city' => 'Zarasai',  
        'user_id' => 1,      
        'creator_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Driver::create([
        'name' => 'Jonas Jonaitis',
        'city' => 'Kaunas',
        'user_id' => 1,    
        'creator_id' => 1,    
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Driver::create([
        'name' => 'Petras Petraitis',
        'city' => 'Palanga',
        'user_id' => 1, 
        'creator_id' => 1,    
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Driver::create([
        'name' => 'Justas Justaitis',
        'city' => 'Ukmerge',
        'user_id' => 1, 
        'creator_id' => 1,   
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        \App\Driver::create([
        'name' => 'Darius Dariukas',
        'city' => 'Zarasai', 
        'user_id' => 1,  
        'creator_id' => 1,   
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        // rand(min, max)       
        $radarsDistance = [5000, 4500, 5100];
        $raide = 'ABCDEFGHIJKLMNOPRSTUVZ';
        $sk = strlen($raide) - 1;

        $timeFrom = Carbon::create(2017, 1, 1, 0, 0, 0)->timestamp;
        $timeTo = Carbon::now()->timestamp;

        for ($i = 0; $i < 1000; $i++) {
            
            $distance = $radarsDistance[ rand(0, 2)];
            $speed = rand(120, 190);
            $time = round($distance / ($speed / 3.6));  
            // https://www.unixtimestamp.com/index.php
            // 01/01/2017 - 10/23/2017 @ 1:14pm (UTC)
            $timestamp = rand($timeFrom, $timeTo);
            $number = $raide[rand(0, $sk)] . $raide[rand(0, $sk)] . $raide[rand(0, $sk)] .
                rand(0, 9) . rand(0, 9) . rand(0, 9);
/*             if (rand(0, 10) == 0) {
                $driverId = rand(1, 3);
            } else {
                $driverId = null;
            } */
            $radar = new \App\Radar();
            $radar->date = Carbon::createFromTimestamp($timestamp);
            $radar->number = $number;
            $radar->distance = $distance;
            $radar->time = $time;
                //'driver_id' => $driverId,
                
            $radar->created_at = Carbon::createFromTimestamp($timestamp);
            $radar->updated_at = Carbon::createFromTimestamp($timestamp);
                //'creator_id' => rand(1, 2),
                //'updater_id' => rand(1, 2)


            if( ($i % 10 ) == 0){
                $radar->driver_id = rand(1, 5);
            }
            $radar->user_id = 1;
            $radar->creator_id = 1;
            $radar->save();
        }
    }
}   
   