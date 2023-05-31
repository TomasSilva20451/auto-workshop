<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\ClientController;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test storing a client without providing a name.
     *
     * @return void
     */
    public function testCreateClientWithoutName()
    {
        $requestData = [
            'address' => '123 Main St',
            'phone_number' => '1234567890',
            'email' => 'test@example.com',
            'type' => 'individual',
        ];

        $response = $this->postJson(route('clients.store'), $requestData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }
}