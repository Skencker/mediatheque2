<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Books;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\Length;

class CartController extends AbstractController
{
 
    #[Route('/mon-panier', name: 'cart')]
    
    public function index(Cart $cart): Response
    {
        $this->addFlash('cartfull', 'Vous avez atteints le nombre de livre maximun à emptrunter (5).');
        
        return $this->render('cart/index.html.twig', [
            'cart' => $cart->getFull()
        ]);
    }

    // fonction pour ajouter au panier
    #[Route('/cart/add/{id}', name: 'add_to_cart')]

    public function add(Cart $cart, $id): Response
    {
        $cart->add($id);
        

        return $this->redirectToRoute('cart');
    }


    // fonction pour vider le panier
    #[Route('/cart/remove', name: 'remove_my_cart')]

    public function remove(Cart $cart): Response
    {
        $cart->remove();

        return $this->redirectToRoute('books');
    }


    // fonction supprimer un livre du panier
    #[Route('/cart/delete/{id}', name: 'delete_to_cart')]

    public function delete(Cart $cart, $id): Response
    {
        $cart->delete($id);

        return $this->redirectToRoute('cart');
    }
}
