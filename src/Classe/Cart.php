<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Books;
use Doctrine\ORM\EntityManagerInterface;

class Cart 
{
    private $entityManager;
    private $session;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
    }
    
    public function add($id) 
    {
        $cart = $this->session->get('cart', []);

        if (count($cart) < 5) 
        {
           $cart[$id] = 1; 
            $this->session->set('cart', $cart);
        }
    }

    public function get() 
    {
        return $this->session->get('cart');
    }

    public function remove() 
    {
        return $this->session->remove('cart');
    }

    public function delete($id) 
    {
        $cart = $this->session->get('cart', []);
         //retir du tableau cart le cart avec l'id que je dois supprimer
        unset($cart[$id]);

        return  $this->session->set('cart', $cart);
    }

    public function getFull() {
        $cartComplete = [];

        if ($this->get()) {

            foreach ((array)$this->get() as $id => $quantity) {
                $bookObject = $this->entityManager->getRepository((Books::class))->findOneById([`id`=>$id]);
                if (!$bookObject) {
                    $this->delete($id);
                    continue;
                }
                $cartComplete[] = [
                    'book' => $bookObject,
                    'quantity' => $quantity
                ];
            }
        }

        return $cartComplete;
    }

    public function getBookDetail() {
        
    }

}