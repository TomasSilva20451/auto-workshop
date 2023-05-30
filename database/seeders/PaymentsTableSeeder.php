<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 3 random payments
        for ($i = 1; $i <= 3; $i++) {
            Payment::create([
                'PaymentID' => $i,
                'BookingID' => rand(1, 10), // Adjust the range as per your data
                'PaymentType' => 'Sample Payment Type',
                'PaymentAmount' => rand(10, 1000), // Adjust the range as per your data
                'CreationDate' => now(),
                'PurchaseOrderID' => rand(1, 5), // Adjust the range as per your data
            ]);
        }
    }
}
