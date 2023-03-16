<?php

declare(strict_types=1);

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function test_homepage_accessibility(): void
    {
        $response = $this->get('/');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_completion()
    {
        $response = $this->call('GET', '/api/completion', [
            'input' => 'Is the sky blue?'
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
