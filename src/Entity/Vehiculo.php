<?php

namespace App\Entity;

use App\Repository\VehiculoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculoRepository::class)
 */
class Vehiculo
{

    public function __toString()
    {
        return $this->matricula; //or anything else
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $matricula;

    /**
     * @ORM\ManyToMany(targetEntity=EstadoVehiculo::class, inversedBy="vehiculos")
     */
    private $estado;

    /**
     * @ORM\OneToOne(targetEntity=DetalleVehiculo::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $detalle;

    /**
     * @ORM\OneToMany(targetEntity=Cita::class, mappedBy="vehiculo", orphanRemoval=true)
     */
    private $citas;

    /**
     * @ORM\OneToMany(targetEntity=Oferta::class, mappedBy="Vehiculo", orphanRemoval=true)
     */
    private $ofertas;

    public function __construct()
    {
        $this->estado = new ArrayCollection();
        $this->citas = new ArrayCollection();
        $this->ofertas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * @return Collection<int, EstadoVehiculo>
     */
    public function getEstado(): Collection
    {
        return $this->estado;
    }

    public function addEstado(EstadoVehiculo $estado): self
    {
        if (!$this->estado->contains($estado)) {
            $this->estado[] = $estado;
        }

        return $this;
    }

    public function removeEstado(EstadoVehiculo $estado): self
    {
        $this->estado->removeElement($estado);

        return $this;
    }

    public function getDetalle(): ?DetalleVehiculo
    {
        return $this->detalle;
    }

    public function setDetalle(DetalleVehiculo $detalle): self
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * @return Collection<int, Cita>
     */
    public function getCitas(): Collection
    {
        return $this->citas;
    }

    public function addCita(Cita $cita): self
    {
        if (!$this->citas->contains($cita)) {
            $this->citas[] = $cita;
            $cita->setVehiculo($this);
        }

        return $this;
    }

    public function removeCita(Cita $cita): self
    {
        if ($this->citas->removeElement($cita)) {
            // set the owning side to null (unless already changed)
            if ($cita->getVehiculo() === $this) {
                $cita->setVehiculo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Oferta>
     */
    public function getOfertas(): Collection
    {
        return $this->ofertas;
    }

    public function addOferta(Oferta $oferta): self
    {
        if (!$this->ofertas->contains($oferta)) {
            $this->ofertas[] = $oferta;
            $oferta->setVehiculo($this);
        }

        return $this;
    }

    public function removeOferta(Oferta $oferta): self
    {
        if ($this->ofertas->removeElement($oferta)) {
            // set the owning side to null (unless already changed)
            if ($oferta->getVehiculo() === $this) {
                $oferta->setVehiculo(null);
            }
        }

        return $this;
    }
}
