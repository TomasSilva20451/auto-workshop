<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 3 random clients
        $clients = [
            [
                'name' => 'John Doe',
                'address' => '123 Main St',
                'phone_number' => '555-1234',
                'email' => 'john@example.com',
                'creation_date' => '2023-05-27',
                'type' => 'Individual',
            ],
            [
                'name' => 'Jane Smith',
                'address' => '456 Elm St',
                'phone_number' => '555-5678',
                'email' => 'jane@example.com',
                'creation_date' => '2023-05-28',
                'type' => 'Individual',
            ],
            [
                'name' => 'Acme Corporation',
                'address' => '789 Oak St',
                'phone_number' => '555-9012',
                'email' => 'info@acme.com',
                'creation_date' => '2023-05-29',
                'type' => 'Company',
            ],
        ];

        // Create the clients in the database
        foreach ($clients as $clientData) {
            Client::create($clientData);
        }
    }
}