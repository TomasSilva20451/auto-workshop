<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Seeder;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parts = [
            [
                'name' => 'Part A',
                'description' => 'Sample description for Part A',
                'price' => 29.99,
                'location' => 'Warehouse A',
                'quantity' => 10,
            ],
            [
                'name' => 'Part B',
                'description' => 'Sample description for Part B',
                'price' => 39.99,
                'location' => 'Warehouse B',
                'quantity' => 5,
            ],
            [
                'name' => 'Part C',
                'description' => 'Sample description for Part C',
                'price' => 49.99,
                'location' => 'Warehouse C',
                'quantity' => 7,
            ],
        ];

        // Create 3 random parts
        foreach ($parts as $partData) {
            Part::create($partData);
        }
    }
}