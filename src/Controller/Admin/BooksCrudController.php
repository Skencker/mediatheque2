<?php

namespace App\Controller\Admin;

use App\Entity\Books;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BooksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Books::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('status','Disponible / indispo'),
            TextField::new('name','Nom'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextField::new('author', 'Auteur'),
            TextareaField::new('description','Déscription'),
            DateField::new('datePub', 'Date de publication'),
            AssociationField::new('category','Catégorie'),
            AssociationField::new('genre','Genre'),
            ImageField::new('image')
                ->setUploadDir('public/uploads/images')
                ->setBasePath('uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
        ];
    }
    
}
