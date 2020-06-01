<?php

use Illuminate\Database\Seeder;
use App\Marker;
use Carbon\Carbon;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1500; $i++)
        {
            $randomLet =random_int(400.0000, 500.9999)/12;
            $randomLng =random_int(400.0000, 500.9999)/12;

            Marker::create([
                'lat' => number_format($randomLet, 4),
                'lng' => number_format($randomLng, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
