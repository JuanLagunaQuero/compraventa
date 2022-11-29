<?php

namespace App\Entity;

use App\Repository\MovimientoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovimientoRepository::class)
 */
class Movimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TipoMovimiento::class, inversedBy="movimientos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /**
     * @ORM\OneToOne(targetEntity=Oferta::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Oferta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?TipoMovimiento
    {
        return $this->tipo;
    }

    public function setTipo(?TipoMovimiento $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getOferta(): ?Oferta
    {
        return $this->Oferta;
    }

    public function setOferta(Oferta $Oferta): self
    {
        $this->Oferta = $Oferta;

        return $this;
    }
}
