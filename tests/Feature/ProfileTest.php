<?php

declare(strict_types=1);

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    public function test_profile_accessibility()
    {
        $response = $this->get('/profile');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_profile_completion()
    {
        $response = $this->call('GET', '/api/completion', [
            'input' => 'Is the sky blue?',
            'type' => 'generate'
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_profile_completion_without_input()
    {
        $response = $this->call('GET', '/api/completion');

        $response->assertSessionHasErrors('input');
    }
}
