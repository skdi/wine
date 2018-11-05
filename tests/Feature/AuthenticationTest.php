<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginName()
    {
        $user = factory(\App\User::class)->create(['name' => 'Jesus']);

        $response = $this->actingAs($user)
                         ->withSession(['name' => 'Jesus'])
                         ->get('/');
        $response->assertSuccessful();
    }
    public function testLoginEmail()
    {
        $user = factory(\App\User::class)->create(['email' => 'jes@aaaa.com']);

        $response = $this->actingAs($user)
                         ->withSession(['email' => 'jes@aaaa.com'])
                         ->get('/');
        $response->assertSuccessful();
    }
    
}
