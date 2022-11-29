<?php

namespace App\Entity;

use App\Repository\EstadoVehiculoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadoVehiculoRepository::class)
 */
class EstadoVehiculo
{
    public function __toString()
    {
        return $this->descripcion;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity=Vehiculo::class, mappedBy="estado")
     */
    private $vehiculos;

    public function __construct()
    {
        $this->vehiculos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection<int, Vehiculo>
     */
    public function getVehiculos(): Collection
    {
        return $this->vehiculos;
    }

    public function addVehiculo(Vehiculo $vehiculo): self
    {
        if (!$this->vehiculos->contains($vehiculo)) {
            $this->vehiculos[] = $vehiculo;
            $vehiculo->addEstado($this);
        }

        return $this;
    }

    public function removeVehiculo(Vehiculo $vehiculo): self
    {
        if ($this->vehiculos->removeElement($vehiculo)) {
            $vehiculo->removeEstado($this);
        }

        return $this;
    }
}
