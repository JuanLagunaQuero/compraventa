<?php

namespace App\Controller\api;

use stdClass;
use App\Entity\Vehiculo;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VehiculosController extends AbstractController
{
    /**
     * @Route("api/obtenDetalleVehiculo/{id}", name="obtenDetalleVehiculo")
     */
    public function obtenDetalleVehiculo(ManagerRegistry $doctrine, $id): Response
    {
        $obj = new stdClass();
        $repositoryVehiculo = $doctrine->getRepository(Vehiculo::class);
        $obj->detalle = $repositoryVehiculo->obtenDetalleVehiculo($id);
        return new Response(json_encode($obj));
    }

    /**
     * @Route("api/obtenVehiculos", name="obtenVehiculos")
     */
    public function obtenVehiculos(ManagerRegistry $doctrine): Response
    {
        $obj = new stdClass();
        $repositoryVehiculo = $doctrine->getRepository(Vehiculo::class);
        $obj->v = $repositoryVehiculo->obtenVehiculos();
        return new Response(json_encode($obj));
    }

    /**
     * @Route("api/obtenVehiculosDetalle", name="obtenVehiculos")
     */
    public function obtenVehiculosDetalle(ManagerRegistry $doctrine)
    {
        $obj = new stdClass();
        $repositoryVehiculo = $doctrine->getRepository(Vehiculo::class);
        $obj->v = $repositoryVehiculo->obtenVehiculosDetalle();
        return new Response(json_encode($obj));

    }
}
