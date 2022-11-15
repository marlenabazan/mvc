<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{    
    /**
     * testGameRules
     * test if title Regler exists
     *
     * @return void
     */
    public function testGame(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/game');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Regler');
    }
    
    /**
     * testGameDoc
     * test clicking a link
     *
     * @return void
     */
    public function testGameDoc(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game/doc');
        
        $this->assertResponseIsSuccessful();
        $client->clickLink('Go back to game');
    }
    
    /**
     * testGamePlayStop
     * test stoping the game
     *
     * @return void
     */
    public function testGamePlayStop(): void
    {
        $client = static::createClient();
        $client->request('GET', '/game/play');

        $this->assertResponseIsSuccessful();
        $client->submitForm('stop');
    }
}