<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="blob")
     */
    private $imagenes;

    /**
     * @ORM\Column(type="blob")
     */
    private $videos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagenes()
    {
        return $this->imagenes;
    }

    public function setImagenes($imagenes): self
    {
        $this->imagenes = $imagenes;

        return $this;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    public function setVideos($videos): self
    {
        $this->videos = $videos;

        return $this;
    }
}
