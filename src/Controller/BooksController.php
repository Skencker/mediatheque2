<?php

namespace App\Controller;

use App\Entity\Books;
use App\Classe\Search;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BooksController extends AbstractController
{
    private  $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/catalogue', name: 'books')]
    public function index(Request $request): Response
    {
        $books = $this ->entityManager->getRepository(Books::class)->findAll();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        
        $form->handleRequest($request); 

        if ($form->isSubmitted() && $form->isValid()) {
            
            $books = $this->entityManager->getRepository(Books::class)->findWithSearch($search);
        }

        return $this->render('books/index.html.twig', [
            'books' => $books,
            'form' => $form->createView()
        ]);
    }

    #[Route('/livre/{slug}', name: 'book')]
    public function show($slug): Response
    {
        $book = $this->entityManager->getRepository(Books::class)->findOneBySlug($slug);

        if (!$book) {
            return $this->redirectToRoute('books');
        }
        return $this->render('books/book.html.twig', [
            'book' => $book
        ]);
    }
}