<?php

namespace Database\Seeders;

use App\Models\PartOrder;
use Illuminate\Database\Seeder;

class PartOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random part orders
        for ($i = 1; $i <= 3; $i++) {
            PartOrder::create([
                'PartOrderID' => $i,
                'BookingID' => rand(1, 10),
                'PartID' => rand(1, 10),
                'Quantity' => rand(1, 5),
                'CreationDate' => now(),
                'PurchaseOrderID' => rand(1, 10),
                'ServiceID' => rand(1, 10),
                'part_id' => rand(1, 10),
            ]);
        }
    }
}