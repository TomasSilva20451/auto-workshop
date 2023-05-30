<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random invoices
        for ($i = 1; $i <= 3; $i++) {
            Invoice::create([
                'InvoiceID' => $i,
                'BookingID' => rand(1, 10), // Assuming there are 10 bookings
                'TotalPrice' => rand(100, 1000),
                'CreationDate' => now(),
                'PartOrderID' => rand(1, 5), // Assuming there are 5 part orders
            ]);
        }
    }
}