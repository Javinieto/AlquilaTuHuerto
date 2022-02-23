<?php

namespace App\Entity;

use App\Repository\HuertoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HuertoRepository::class)
 */
class Huerto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $disponibilidad;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @ORM\ManyToOne(targetEntity=HuertoProducto::class, inversedBy="IdHuerto")
     */
    private $huertoProducto;

    /**
     * @ORM\Column(type="array")
     */
    //private $productos = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getDisponibilidad(): ?string
    {
        return $this->disponibilidad;
    }

    public function setDisponibilidad(string $disponibilidad): self
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getHuertoProducto(): ?HuertoProducto
    {
        return $this->huertoProducto;
    }

    public function setHuertoProducto(?HuertoProducto $huertoProducto): self
    {
        $this->huertoProducto = $huertoProducto;

        return $this;
    }
}
