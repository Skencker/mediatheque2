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
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname','Prénom')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            TextField::new('lastname','Nom')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            TextField::new('adress','Adresse')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            IntegerField::new('zipcode','Code postal')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            TextField::new('city','Ville')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            EmailField::new('email', 'Email')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            DateField::new('birthday','Date anniversaire')->setColumns('col-sm-12 col-lg-7 col-xxl-6')
        ];
    }
    
}