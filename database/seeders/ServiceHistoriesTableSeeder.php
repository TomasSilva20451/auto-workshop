<?php

namespace Database\Seeders;

use App\Models\ServiceHistory;
use Illuminate\Database\Seeder;

class ServiceHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random service histories
        for ($i = 1; $i <= 3; $i++) {
            ServiceHistory::create([
                'vehicle_id' => rand(1, 10), // Assuming vehicle IDs range from 1 to 10
                'service_type' => 'Sample Service',
                'date' => now()->subDays($i),
                'duration' => rand(1, 5),
                'cost' => rand(50, 200),
            ]);
        }
    }
}
