<?php

namespace App\Entity;

use App\Repository\BalanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BalanceRepository::class)
 */
class Balance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Vehiculo::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Vehiculo;

    /**
     * @ORM\OneToOne(targetEntity=Movimiento::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Movimiento;

    /**
     * @ORM\Column(type="float")
     */
    private $precioCompra;

    /**
     * @ORM\Column(type="float")
     */
    private $precioVenta;

    /**
     * @ORM\Column(type="float")
     */
    private $gastos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehiculo(): ?Vehiculo
    {
        return $this->Vehiculo;
    }

    public function setVehiculo(Vehiculo $Vehiculo): self
    {
        $this->Vehiculo = $Vehiculo;

        return $this;
    }

    public function getMovimiento(): ?Movimiento
    {
        return $this->Movimiento;
    }

    public function setMovimiento(Movimiento $Movimiento): self
    {
        $this->Movimiento = $Movimiento;

        return $this;
    }

    public function getPrecioCompra(): ?float
    {
        return $this->precioCompra;
    }

    public function setPrecioCompra(float $precioCompra): self
    {
        $this->precioCompra = $precioCompra;

        return $this;
    }

    public function getPrecioVenta(): ?float
    {
        return $this->precioVenta;
    }

    public function setPrecioVenta(float $precioVenta): self
    {
        $this->precioVenta = $precioVenta;

        return $this;
    }

    public function getGastos(): ?float
    {
        return $this->gastos;
    }

    public function setGastos(float $gastos): self
    {
        $this->gastos = $gastos;

        return $this;
    }
}
