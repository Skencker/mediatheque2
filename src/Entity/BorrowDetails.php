<?php

namespace App\Entity;

use App\Repository\BorrowDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowDetailsRepository::class)
 */
class BorrowDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Borrows::class, inversedBy="borrowDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrow;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $book;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    
    public function __toString() 
    {
        return $this->getBook();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrow(): ?Borrows
    {
        return $this->borrow;
    }

    public function setBorrow(?Borrows $borrow): self
    {
        $this->borrow = $borrow;

        return $this;
    }

    public function getBook(): ?string
    {
        return $this->book;
    }

    public function setBook(string $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
