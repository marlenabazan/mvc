<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Entity\Books;
use App\Repository\BooksRepository;

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
    
    /**
     * testLibraryGet
     * test Books entity
     *
     * @return void
     */
    public function testLibraryGet(): void
    {
        $book = new Books();
        $book->setTitle('test title');
        $book->setIsbn(123456789);
        $book->setAuthor('test author');
        $book->setImage('test image');

        $bookRepository = $this->createMock(BooksRepository::class);
        $bookRepository->expects($this->any())
            ->method('findAll')
            ->willReturn($book);

        $this->assertEquals($book->getTitle(), 'test title');
        $this->assertEquals($book->getIsbn(), 123456789);
        $this->assertEquals($book->getAuthor(), 'test author');
        $this->assertEquals($book->getImage(), 'test image');
    }
}

