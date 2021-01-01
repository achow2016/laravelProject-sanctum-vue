<?php

namespace Tests\Unit;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase; //allows get()
use App\Models\User;

class EntryTest extends TestCase
{
	/** @test */
	//tests accessing base url as a visitor
    public function visitorEntryTest()
    {
        $response = $this->get('/');
		$response->assertStatus(200);
		$response->dumpSession();
		$response->dump();
    }
	
	/** @test */
	//tests accessing login api request
	//should return 422 as user does not exist
    public function loginApiTest()
    {
		$response = $this->postJson('/api/login', ['email' => 'fake@fakeEmail.com', 'password' => 'fake']);
		$response->assertStatus(422);
			//->assertJson([
			//any json responses from login
			//])
    }
	
	/** @test */
	//tests accessing base url as a newly created user using a User factory
	/*
    public function newUserEntryTest()
    {
		$user = User::factory()->create();
		$response = $this
			->actingAs($user)
			->get('/welcome');
		$response->assertStatus(200);
		$response->dumpSession();
		$response->dump();
    }
	*/
}
