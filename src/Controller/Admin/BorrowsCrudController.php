<?php

namespace App\Controller\Admin;

use App\Entity\Borrows;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BorrowsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Borrows::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('createat', 'Date de l\'emprunt'),
            DateField::new('borrowdate', 'Date de retour'),
            BooleanField::new('status', 'Rendu / En cours')
        ];
    }
    
}
