<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . '11|GQWzJcz5vbUaQYsY1vCwzGVUD2cmkXimiaUwUaVT')
            ->json('POST','api/create-driver',[
            'phone'=>'987654123',
            'name'=>'tessst',
            'password'=>"123456",
            'car_model_id'=>1,
            'active'=>0
        ]);
        $response->assertStatus(201);
    }
}
