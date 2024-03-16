<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PdfController extends TestCase
{
    /**
     * Test generatePdf endpoint.
     */
    public function test_generatePdf_endpoint(): void
    {
        $response = $this->get('/api/generatePdfPlanHoliday/1');

        $response->assertStatus(200);
    }
}
