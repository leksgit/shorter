<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\DomCrawler\Crawler;
use Tests\TestCase;

class MainPageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('short.create');

        $response = $this->get('/addShort');

        $response->assertStatus(200);
    }

    public function test_get_wrong_short(): void
    {
        $response = $this->get('/add');

        $response->assertStatus(404);

        $response = $this->get('/1EoGnbQA');

        $response->assertStatus(404);
    }

    public function test_add_short_link(): void
    {
        $data = [
            'source_url' => 'https://example.com',
            'allowed_number_of_uses' => 5,
            'hours_available' => 12,
        ];

        $response = $this->post(route('createShort'), $data);

        $response->assertStatus(200);
        $response->assertViewIs('short.ready');

        $responseContent = $response->getContent();

        $this->assertStringContainsString(
            'Congratulations! You have successfully created a short link that you can share with everyone!',
            $responseContent
        );

        $crawler = new Crawler($responseContent);

        $linkValues = $crawler->filter('table a')->each(function ($node) {
            return $node->text();
        });

        $this->assertCount(1, $linkValues);

        $response = $this->get($linkValues[0]);

        $response->assertStatus(302);
    }
}
