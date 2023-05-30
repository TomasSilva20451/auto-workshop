<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 3 random bookings
        for ($i = 1; $i <= 3; $i++) {
            Booking::create([
                'BookingID' => $i,
                'VehicleID' => rand(1, 100),
                'ClientID' => rand(1, 100),
                'BookingDate' => now()->toDateString(),
                'BookingType' => 'Sample Booking Type',
                'Status' => 'Sample Status',
                'CreationDate' => now()->toDateString(),
                'CustomerID' => rand(1, 100),
                'appointment_id' => rand(1, 100),
                'vehicle_id' => rand(1, 100),
                'client_id' => rand(1, 100),
                'booking_date' => now()->toDateString(),
                'booking_type' => 'Sample Booking Type',
            ]);
        }
    }
}