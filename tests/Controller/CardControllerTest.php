<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CardControllerTest extends WebTestCase
{        
    /**
     * testCardLink
     * test clicking a link
     *
     * @return void
     */
    public function testCardLink(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card');
        
        $this->assertResponseIsSuccessful();
        $client->clickLink('Deck');      
    }
    
    /**
     * testShuffleLink
     * test clicking a link
     *
     * @return void
     */
    public function testShuffleLink(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/shuffle');
        
        $this->assertResponseIsSuccessful();
        $client->clickLink('Draw');      
    }
    
    /**
     * testDealManyLink
     * test clearing the game
     *
     * @return void
     */
    public function testDealManyLink(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/deal/2/3');
        
        $this->assertResponseIsSuccessful();
        $client->submitForm('clear'); 
    }
    
    /**
     * testDrawManyClear
     * test clearing the game
     *
     * @return void
     */
    public function testDrawManyClear(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/draw/3');
        
        $this->assertResponseIsSuccessful();
        $client->submitForm('clear'); 
    }
    
    /**
     * testDrawClear
     * test clearing the game
     *
     * @return void
     */
    public function testDrawClear(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/draw');
        
        $this->assertResponseIsSuccessful();
        $client->submitForm('clear'); 
    }
    
    /**
     * testDeck2Link
     * test clicking a link
     *
     * @return void
     */
    public function testDeck2Link(): void
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck2');
        
        $this->assertResponseIsSuccessful();
        $client->clickLink('DeckJson');
    }
}

