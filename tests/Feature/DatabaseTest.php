<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testInDatabaseName()
    {
        $user = factory(\App\User::class)->create(['name' => 'Jose']);
        $this->assertDatabaseHas('users',['name' => 'Jose']);
    }
    public function testInDatabaseEmail()
    {
        $user = factory(\App\User::class)->create(['email' => 'jose@hotmail.com']);
        $this->assertDatabaseHas('users',['email' => 'jose@hotmail.com']);
    }
    public function testInDatabaseToken()
    {
        $user = factory(\App\User::class)->create(['remember_token' => 'l2xn4BGmkA']);
        $this->assertDatabaseHas('users',['remember_token' => 'l2xn4BGmkA']);
    }
}
