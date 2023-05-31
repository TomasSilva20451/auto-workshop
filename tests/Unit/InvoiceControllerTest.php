<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\InvoiceController;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * Test creating an invoice without providing a creation date.
     *
     * @return void
     */
    public function testCreateInvoiceWithoutCreationDate()
    {
        $requestData = [
            'InvoiceID' => '12345',
            'BookingID' => '789',
            'TotalPrice' => 100,
            'PartOrderID' => null,
        ];

        $response = $this->postJson(route('invoices.store'), $requestData);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['CreationDate']);
    }

    /**
     * Test storing an invoice with valid data.
     *
     * @return void
     */
    public function testStoreInvoiceWithValidData()
    {
        $requestData = [
            'InvoiceID' => '12345',
            'BookingID' => '789',
            'TotalPrice' => 100,
            'CreationDate' => '2023-05-30',
            'PartOrderID' => null,
        ];

        $response = $this->postJson(route('invoices.store'), $requestData);

        $response->assertStatus(201);
        $response->assertJson(['message' => 'Invoice created successfully']);
        $this->assertDatabaseHas('invoices', [
            'InvoiceID' => '12345',
            'BookingID' => '789',
            'TotalPrice' => 100,
            'CreationDate' => '2023-05-30',
            'PartOrderID' => null,
        ]);
    }
}
