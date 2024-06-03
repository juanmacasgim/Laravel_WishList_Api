<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * This class is used to test the Wish controller.
 */
class WishTest extends TestCase
{
    /**
     * This method is used to seed the database with testing data.
     */
    public function test_get_wish_list(): void
    {
        $response = $this->get('/api/wishes');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
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
    }

    /**
     * This method is used to test the get wish detail endpoint.
     */
    public function test_get_wish_detail()
    {
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

    /**
     * This method is used to test the get not existing wish detail endpoint.
     */
    public function test_get_not_existing_wish_detail()
    {
        $response = $this->get('/api/wishes/100');
        $response->assertStatus(404);
    }

    /**
     * This method is used to test the create wish endpoint.
     */
    public function test_create_wish()
    {
        $response = $this->post('/api/wishes', [
            'title' => 'Deseo Test 4',
            'text' => 'Deseo Test 4',
            'isCompleted' => false,
            'date' => '26/5/2024 22:59:59',
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'id',
                'title',
                'text',
                'isCompleted',
                'date',
                'created_at',
                'updated_at',
            ]
        ]);
        $response->assertJsonFragment([
            'title' => 'Deseo Test 4',
        ]);
    }

    /**
     * This method is used to test the update wish endpoint.
     */
    public function test_update_wish()
    {
        $response = $this->put('/api/wishes/4', [
            'title' => 'Deseo Test 4',
            'text' => 'Deseo Test 4 pero actualizado',
            'isCompleted' => true,
            'date' => '2021-12-12',
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'id',
                'title',
                'text',
                'isCompleted',
                'date',
                'created_at',
                'updated_at',
            ]
        ]);
        $response->assertJsonFragment([
            'isCompleted' => true,
        ]);
    }

    /**
     * This method is used to test the delete wish endpoint.
     */
    public function test_delete_wish()
    {
        $response = $this->delete('/api/wishes/1');
        $response->assertStatus(200);
    }
}
