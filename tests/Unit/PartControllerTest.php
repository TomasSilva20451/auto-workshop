<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\PartController;
use App\Models\Part;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $data = [
            'name' => 'Engine Oil',
            'description' => 'High-quality engine oil for all vehicles',
            'price' => 50.99,
            'location' => 'Aisle 2, Shelf 3',
            'quantity' => 100,
        ];

        $response = $this->post('/parts', $data);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Part created successfully',
                'part' => [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'location' => $data['location'],
                    'quantity' => $data['quantity'],
                ],
            ]);

        $this->assertDatabaseHas('parts', $data);
    }
}
