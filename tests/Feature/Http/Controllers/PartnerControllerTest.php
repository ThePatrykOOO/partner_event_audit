<?php

namespace Http\Controllers;

use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class PartnerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllPartners()
    {
        Partner::factory()->count(4)->create();

        $response = $this->get('/api/partners');

        $response->assertStatus(JsonResponse::HTTP_OK);

        $this->assertCount(4, $response->json()['data']);
    }

    public function testGetSinglePartner()
    {
        $partner = Partner::factory()->create();

        $response = $this->get('/api/partners/' . $partner->id);

        $response->assertStatus(JsonResponse::HTTP_OK);

        $data = $response->json()['data'];
        $this->assertEquals($partner->id, $data['id']);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'description',
                'nip_number',
                'website',
                'created_at'
            ]
        ]);
    }

    public function testPartnerNotFound()
    {
        $response = $this->get('/api/partners/0');
        $response->assertStatus(JsonResponse::HTTP_NOT_FOUND);
    }

    public function testStorePartner()
    {
        $response = $this->post('/api/partners/', [
            'name' => 'test',
            'description' => 'lorem ipsum',
            'nip_number' => '1234567890',
            'website' => 'https://www.google.com',
        ]);

        $response->assertStatus(JsonResponse::HTTP_CREATED);

        $this->assertCount(1, Partner::all());

    }

    public function testUpdatePartner()
    {
        $partner = Partner::factory()->create();

        $response = $this->put('/api/partners/' . $partner->id, [
            'name' => 'test',
            'description' => 'lorem ipsum',
            'nip_number' => '1234567890',
            'website' => 'https://www.google.com',
        ]);

        $response->assertStatus(JsonResponse::HTTP_OK);
        $partner->refresh();

        $this->assertEquals('test', $partner->name);
        $this->assertEquals('lorem ipsum', $partner->description);
        $this->assertEquals('1234567890', $partner->nip_number);
        $this->assertEquals('https://www.google.com', $partner->website);
    }

    public function testDestroyPartner()
    {
        $partner = Partner::factory()->create();

        $response = $this->delete('/api/partners/' . $partner->id);

        $response->assertStatus(JsonResponse::HTTP_OK);

        $this->assertCount(0, Partner::all());
    }
}
