<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => "Sur",
            "municipality" => "Tuxtla Gutierrez"
        ]);

        Location::create([
            'name' => "Centro",
            "municipality" => "Ciudad de mexico"
        ]);

        Location::create([
            'name' => "Norte",
            "municipality" => "Monterrey"
        ]);

        Location::create([
            'name' => "Sur",
            "municipality" => "Cancun"
        ]);

        
    }
}
