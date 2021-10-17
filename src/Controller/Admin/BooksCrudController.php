<?php

namespace App\Controller\Admin;

use App\Entity\Books;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
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

    public function configureAssets(Assets $assets): Assets
    {
        return $assets;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('status','Disponible / indispo'),
            TextField::new('name','Nom')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            SlugField::new('slug')->setTargetFieldName('name')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            TextField::new('author', 'Auteur')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            DateField::new('datePub', 'Date de publication')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            AssociationField::new('category','Catégorie')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            AssociationField::new('genre','Genre')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            TextareaField::new('description','Déscription')->setColumns('col-sm-12 col-lg-7 col-xxl-6'),
            ImageField::new('image')
                ->setUploadDir('public/uploads/images')
                ->setBasePath('uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->setColumns('col-sm-12 col-lg-7 col-xxl-6')
        ];
    }
    
}
