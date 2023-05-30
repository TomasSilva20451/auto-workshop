<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 3 random appointments
        for ($i = 1; $i <= 3; $i++) {
            $date = date('Y-m-d', strtotime("+{$i} days"));
            $time = rand(9, 17) . ':00';
            $serviceTypes = ['Service A', 'Service B', 'Service C'];
            $serviceType = $serviceTypes[rand(0, count($serviceTypes) - 1)];
            $email = "sample{$i}@example.com";

            Appointment::create([
                'date' => $date,
                'time' => $time,
                'service_type' => $serviceType,
                'email' => $email,
            ]);
        }
    }
}