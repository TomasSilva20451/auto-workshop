<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random vehicles
        for ($i = 1; $i <= 3; $i++) {
            Vehicle::create([
                'make' => 'Sample Make',
                'model' => 'Sample Model',
                'year' => 2023,
                'price' => 50000.00,
                'status' => 'Active',
            ]);
        }
    }
}