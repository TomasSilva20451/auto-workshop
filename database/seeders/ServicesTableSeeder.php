<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random services
        for ($i = 1; $i <= 3; $i++) {
            Service::create([
                'Name' => 'Service ' . $i,
                'BookingID' => rand(1, 10), // Assuming you have 10 bookings
                'VehicleID' => rand(1, 10), // Assuming you have 10 vehicles
            ]);
        }
    }
}
