<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    public function testApiFilterTest()
    {
        $response = $this->post('/api/filter', []);
        $response->assertStatus(200);

        //priceFrom
        $response = $this->post('/api/filter', ['priceFrom' => 1500000]);
        $response->assertJsonCount(1);

        //priceTo
        $response = $this->post('/api/filter', ['priceTo' => 270000]);
        $response->assertJsonCount(1);

        //yearFrom
        $response = $this->post('/api/filter', ['yearFrom' => 2017]);
        $response->assertJsonCount(2);

        //yearTo
        $response = $this->post('/api/filter', ['yearTo' => 2010]);
        $response->assertJsonCount(2);

        //bodyType
        $response = $this->post('/api/filter', ['bodyType' => 'Хетчбэк']);
        $response->assertJsonCount(1);

        //make
        $response = $this->post('/api/filter', ['make' => 'BMW']);
        $response->assertJsonCount(2);

        //all
        $response = $this->post('/api/filter', [
            'priceFrom' => 1000000,
            'priceTo' => 1500000,
            'yearFrom' => '2011',
            'yearTo' => '2011',
            'bodyType' => 'Внедорожник',
            'make' => 'Mitsubishi'
            ]);
        $response->assertJsonCount(1);


    }
}
