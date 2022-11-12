<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Books;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\BooksRepository;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'library')]
    public function index(): Response
    {
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

    /**
     * @Route("/library/show", name="library-show-all")
     */
    public function showAllBooks(
        BooksRepository $booksRepository
    ): Response {
        $books = $booksRepository
            ->findAll();

        return $this->json($books);
    }

     /**
     * @Route("/library/create", name="library-create", methods={"GET"})
     */
    public function createBook(): Response {
        $data = [
            'title' => 'Create',
        ];

        return $this->render('library/addBookForm.html.twig', $data);
    }

    /**
     * @Route("/library/create", name="create-process", methods={"POST"})
     */
    public function createProduct(
        ManagerRegistry $doctrine,
        Request $request
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Books();

        $book->setTitle($request->request->get('title'));
        $book->setAuthor($request->request->get('author'));
        $book->setISBN($request->request->get('ISBN'));
        $book->setImage($request->request->get('image'));

        $entityManager->persist($book);
 
        $entityManager->flush();

        return $this->redirectToRoute('library');
    }

}
