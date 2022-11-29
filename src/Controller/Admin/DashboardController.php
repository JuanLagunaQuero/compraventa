<?php

namespace App\Controller\Admin;

use App\Entity\Cita;
use App\Entity\Media;
use App\Entity\Balance;
use App\Entity\Oferta;;
use App\Entity\Usuario;
use App\Entity\Vehiculo;
use App\Entity\Movimiento;
use App\Entity\EstadoVehiculo;
use App\Entity\TipoMovimiento;
use App\Entity\DetalleVehiculo;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\UsuarioCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UsuarioCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
        /* if ('jane' === $this->getUser()->getUsername()) {
                     return $this->redirect('...');
                 } */

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('COMPRAVENTA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Balance', 'fas fa-list', Balance::class);
        yield MenuItem::linkToCrud('Cita', 'fas fa-list', Cita::class);
        yield MenuItem::linkToCrud('Detalle vehículo', 'fas fa-list', DetalleVehiculo::class);
        yield MenuItem::linkToCrud('Estado vehículo', 'fas fa-list', EstadoVehiculo::class);
        yield MenuItem::linkToCrud('Media', 'fas fa-list', Media::class);   
        yield MenuItem::linkToCrud('Movimiento', 'fas fa-list', Movimiento::class);
        yield MenuItem::linkToCrud('Oferta', 'fas fa-list', Oferta::class);
        yield MenuItem::linkToCrud('Tipo de Movimiento', 'fas fa-list', TipoMovimiento::class);
        yield MenuItem::linkToCrud('Vehiculo', 'fas fa-list', Vehiculo::class);

     
    }
}
