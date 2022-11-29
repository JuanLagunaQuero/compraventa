<?php

namespace App\Entity;

use App\Repository\DetalleVehiculoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetalleVehiculoRepository::class)
 */
class DetalleVehiculo
{
    public function __toString()
    {
        return '  '.$this->id;
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
    private $marca;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modelo;

    /**
     * @ORM\Column(type="integer")
     */
    private $caballos;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometros;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getCaballos(): ?int
    {
        return $this->caballos;
    }

    public function setCaballos(int $caballos): self
    {
        $this->caballos = $caballos;

        return $this;
    }

    public function getKilometros(): ?int
    {
        return $this->kilometros;
    }

    public function setKilometros(int $kilometros): self
    {
        $this->kilometros = $kilometros;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(?float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
