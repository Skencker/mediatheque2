<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Borrows;
use App\Entity\BorrowDetails;
use App\Form\BorrowType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BorrowController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/emprunt', name: 'borrow')]
    public function index(Cart $cart): Response
    {
        $date = new DateTime();
        $form = $this->createForm(BorrowType::class, null, [
            'user' => $this->getUser()
        ]);

        return $this->render('borrow/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart->getFull(),
            'date' => $date
        ]);
    }
    
    //creation de la commande
    #[Route('/emprunt/recapitulatif', name: 'borrow_recap')]
    public function add(Cart $cart, Request $request): Response
    {
        $form = $this->createForm(BorrowType::class, null, [
            'user' => $this->getUser()
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $date = new DateTime();
            // $dateReturn = date('12-10-2021', '+20days');
            // dd($dateReturn);
            //enregister l'emprunt
            $dateBorrow = clone $date;
            $borrow = new Borrows();
            $dateBorrow->modify('+21 days');
            $borrow->setBorrowDate($dateBorrow);
            $borrow->setCreateAt($date);
            $borrow->setUser($this->getUser());
            $borrow->setCreateAt($date);
            $borrow->setStatus(1);

            $this->entityManager->persist($borrow);
            
            //enregitrer les detail de l'emprunt
            foreach ($cart->getFull() as $book) {
                $borrowDetails = new BorrowDetails();
                $borrowDetails ->setBorrow($borrow);
                $borrowDetails ->setBook($book['book']->getName());
                //le livre n'est plaus dispo
                $borrowDetails ->getBook($book['book']->setStatus(1));
                $borrowDetails ->setQuantity($book['quantity']);
                $this->entityManager->persist($borrowDetails);
            }
            
            $this->entityManager->flush();
        }
            $cart->remove();
            return $this->render('borrow/add.html.twig', [
                // 'form' => $form->createView(),
                'cart' => $cart->getFull()
            ]);

      
    }
}
