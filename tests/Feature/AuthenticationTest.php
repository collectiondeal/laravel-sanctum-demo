<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user_data_is_returned()
    {
        Sanctum::actingAs(
            $user = factory(User::class)->create(),
            ['*']
        );

        $response = $this->get('/api/user');

        $response->assertOk();

        $response->assertJsonFragment([
            'id' => $user->id,
            'email' => $user->email
        ]);
    }
}
