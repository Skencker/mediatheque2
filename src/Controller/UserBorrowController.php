<?php

namespace App\Controller;

use App\Entity\BorrowDetails;
use App\Entity\Borrows;
use DateTime;
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
        $dateTime = new DateTime();
        foreach ($borrow as $borrowDate) {
            if($borrowDate->getBorrowDate() < $dateTime ) {
                $this->addFlash('retard', 'Merci de bien vouloir retourner votre livre dans les plus brefs détails');
            }
            // dd($dateTime);
        }
        return $this->render('account/borrow.html.twig', [
            'borrows' => $borrow
        ]);


        if($borrow) {
            $this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs détails');
        }
    }
}
