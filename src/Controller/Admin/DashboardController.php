<?php

namespace App\Controller\Admin;

use App\Entity\Books;
use App\Entity\Borrows;
use App\Entity\BorrowDetails;
use App\Entity\Categories;
use App\Entity\Genres;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator ;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
         // redirige vers un contrôleur CRUD
         $routeBuilder = $this->get(AdminUrlGenerator::class);

         return $this->redirect($routeBuilder->setController(BooksCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mediatheque');
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToUrl('Site', 'far fa-window-maximize', 'catalogue');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Users::class);
        yield MenuItem::linkToCrud('Genre de livre', 'fas fa-list-alt', Genres::class);
        yield MenuItem::linkToCrud('Catégorie de livre', 'far fa-list-alt', Categories::class);
        yield MenuItem::linkToCrud('Livres', 'fas fa-book', Books::class);
        // yield MenuItem::linkToCrud('Emprunts', 'fas fa-caret-right', Borrows::class);
        yield MenuItem::linkToCrud('Emprunt', 'fas fa-caret-right', BorrowDetails::class);
        yield MenuItem::linkToLogout('Deconnexion', 'fas fa-sign-out-alt', 'app_logout');
    }
}
