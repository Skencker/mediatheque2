<?php

namespace App\Controller\Admin;

use App\Entity\BorrowDetails;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BorrowDetailsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BorrowDetails::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('borrow','Emprunteur'),
            TextField::new('book', 'Livres')
        ];
    }
    
}

