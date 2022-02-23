<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
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
    private $tiempo;

    /**
     * @ORM\ManyToOne(targetEntity=HuertoProducto::class, inversedBy="IdProducto")
     */
    private $huertoProducto;

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

    public function getTiempo(): ?int
    {
        return $this->tiempo;
    }

    public function setTiempo(int $tiempo): self
    {
        $this->tiempo = $tiempo;

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
