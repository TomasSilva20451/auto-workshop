<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random purchase orders
        for ($i = 1; $i <= 3; $i++) {
            PurchaseOrder::create([
                'ServiceID' => rand(1, 10),
                'BookingID' => rand(1, 10),
                'ItemName' => "Item {$i}",
                'ItemPrice' => rand(10, 100),
            ]);
        }
    }
}
