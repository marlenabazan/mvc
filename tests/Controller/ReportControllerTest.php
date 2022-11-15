<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReportControllerTest extends WebTestCase
{        
    /**
     * testAbout
     * test clicking a link
     *
     * @return void
     */
    public function testAbout(): void
    {
        $client = static::createClient();

        $client->request('GET', '/about');

        $this->assertResponseIsSuccessful();
        $client->clickLink('Kursrepo på GitHub');
    }
    
    /**
     * testReport
     * test if title Redovisning exists
     *
     * @return void
     */
    public function testReport(): void
    {
        $client = static::createClient();

        $client->request('GET', '/report');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Redovisning');
    }
    
    /**
     * testMetrics
     * test if title Metrics exists
     *
     * @return void
     */
    public function testMetrics(): void
    {
        $client = static::createClient();

        $client->request('GET', '/metrics');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Metrics');
    }
}

