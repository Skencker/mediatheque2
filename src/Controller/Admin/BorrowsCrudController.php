<?php

namespace App\Controller\Admin;

use App\Entity\Borrows;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BorrowsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Borrows::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
