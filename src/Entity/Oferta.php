<?php

namespace App\Entity;

use App\Repository\OfertaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfertaRepository::class)
 */
class Oferta
{
    public function __toString()
    {
        return $this->Usuario . ' - ' . $this->Vehiculo;
    }


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $Cantidad;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="ofertas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Vehiculo::class, inversedBy="ofertas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Vehiculo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?float
    {
        return $this->Cantidad;
    }

    public function setCantidad(float $Cantidad): self
    {
        $this->Cantidad = $Cantidad;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->Usuario;
    }

    public function setUsuario(?Usuario $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getVehiculo(): ?Vehiculo
    {
        return $this->Vehiculo;
    }

    public function setVehiculo(?Vehiculo $Vehiculo): self
    {
        $this->Vehiculo = $Vehiculo;

        return $this;
    }
}
