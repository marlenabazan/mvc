<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LibraryControllerTest extends WebTestCase
{    
    
    /**
     * testLibrary
     * test if title Library exists
     *
     * @return void
     */
    public function testLibrary(): void
    {
        $client = static::createClient();

        $client->request('GET', '/library');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Library');
    }
    
    /**
     * testLibraryShowBooksLink
     * test clicking a link
     *
     * @return void
     */
    public function testLibraryShowBooksLink(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library');
        
        $this->assertResponseIsSuccessful();
        $client->clickLink('Visa alla böcker');      
    }
    
    /**
     * testLibraryCreate
     * test submitting to create a book
     *
     * @return void
     */
    public function testLibraryCreate(): void
    {
        $client = static::createClient();
        $client->request('GET', '/library/create');

        $this->assertResponseIsSuccessful();
        $client->submitForm('Lägg till');
    }
}

