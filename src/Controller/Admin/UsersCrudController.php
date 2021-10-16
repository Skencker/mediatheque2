<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('valid','Valide'),
            IdField::new('id'),
            TextField::new('firstname','Prénom'),
            TextField::new('lastname','Nom'),
            TextField::new('adress','Adresse'),
            IntegerField::new('zipcode','Code postal'),
            TextField::new('city','Ville'),
            EmailField::new('email', 'Email'),
            DateField::new('birthday','Date anniversaire')
        ];
    }
    
}