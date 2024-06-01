<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_wish_list(): void
    {
        $response = $this->get('/api/wishes');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' =>[
                'id',
                'title',
                'text',
                'isCompleted',
                'date',
                'created_at',
                'updated_at',
            ],
        ]);
        $response->assertJsonFragment([
            'title' => 'Deseo Test 2',
        ]);
        $response->assertJsonCount(3);
    }

    public function test_get_wish_detail(){
        $response = $this->get('/api/wishes/2');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                'id',
                'title',
                'text',
                'isCompleted',
                'date',
                'created_at',
                'updated_at',
        ]);
        $response->assertJsonFragment([
            'title' => 'Deseo Test 2',
        ]);
    }

    public function test_get_not_existing_wish_detail(){
        $response = $this->get('/api/wishes/100');
        $response->assertStatus(404);
    }
}
