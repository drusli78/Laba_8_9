<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CommentCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Blog Site')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('На главное', 'fas fa-home', '/');
        yield MenuItem::linkToCrud('Коментарии', 'fas fa-question-circle', Comment::class);
        yield MenuItem::linkToCrud('Посты', 'fas fa-info', Post::class);
        yield MenuItem::linkToLogout('Выход', 'fas fa-sign-out');
        //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
