<?php

namespace App\Controller;

use App\Entity\Borrows;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserBorrowController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/vos-emprunts', name: 'user_borrow')]
    public function index(): Response
    {
        $borrow = $this->entityManager->getRepository((Borrows::class))->findSucessBorrow($this->getUser());
        return $this->render('account/borrow.html.twig', [
            'borrows' => $borrow
        ]);
    }
}
