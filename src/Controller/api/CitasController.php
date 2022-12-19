<?php

namespace App\Controller\api;

use stdClass;
use App\Entity\Cita;
use App\Entity\Usuario;
use App\Entity\Vehiculo;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 

class CitasController extends AbstractController
{
    /**
     * @Route("api/addCita/{id_vehiculo}", name="addCita")
     */
    public function nuevaCita(ManagerRegistry $doctrine, $id_vehiculo): Response
    {
        $correo = $_SESSION['_sf2_attributes']['_security.last_username'];

        $u = new Usuario();
        $repositoryUsuario = $doctrine->getRepository(Usuario::class);
        $u = $repositoryUsuario->findOneBy(array('email' => $correo));
        var_dump($u->getId());


        $v = new Vehiculo();
        $repositoryVehiculo = $doctrine->getRepository(Vehiculo::class);
        $v = $repositoryVehiculo->findOneBy(['id' => $id_vehiculo]);;

        $c = new Cita();
        $c->setFecha(new \DateTime('now'));
        $c->setUsuario($u);
        $c->setVehiculo($v);
        $repositoryCita = $doctrine->getRepository(Cita::class);
        $repositoryCita->add($c);

        
        return new Response("Hola");
    }
}
