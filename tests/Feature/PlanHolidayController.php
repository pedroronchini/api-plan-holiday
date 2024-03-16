<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanHolidayController extends TestCase
{
    /**
     * Test index endpoint.
     */
    public function test_index_endpoint(): void
    {
        $response = $this->get('/api/showPlanHoliday');

        $response->assertStatus(200);
    }

    /**
     * Test store endpoint.
     */
    public function test_store_endpoint(): void
    {
        $response = $this->post('/api/storePlanHoliday', [
            "title" => "New Holiday",
            "description" => "A new holiday",
            "date" => "2023-05-01",
            "location" => "New York",
            "participants" => "John Doe, Jane Doe"
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test update endpoint.
     */
    public function test_update_endpoint(): void
    {
        $response = $this->put('/api/updatePlanHoliday/1', [
            "title" => "Updated Holiday",
            "description" => "An updated holiday",
            "date" => "2023-05-01",
            "location" => "New York",
            "participants" => "John Doe, Jane Doe"
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test delete endpoint.
     */
    public function test_delete_endpoint(): void
    {
        $response = $this->delete('/api/deletePlanHoliday/1');

        $response->assertStatus(200);
    }

    /**
     * Test show endpoint.
     */
    public function test_show_endpoint(): void
    {
        $response = $this->get('/api/showPlanHoliday/1');

        $response->assertStatus(200);
    }
}
