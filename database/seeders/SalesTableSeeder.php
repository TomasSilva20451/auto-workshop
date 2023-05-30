<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random sales records
        for ($i = 1; $i <= 3; $i++) {
            Sale::create([
                'name' => 'Sale ' . $i,
                'quantity' => rand(1, 10),
                'price' => rand(10, 100),
            ]);
        }
    }
}
