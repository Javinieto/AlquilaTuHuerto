<?php

namespace App\Entity;

use App\Repository\HuertoProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HuertoProductoRepository::class)
 */
class HuertoProducto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * @ORM\OneToMany(targetEntity=Huerto::class, mappedBy="huertoProducto")
     */
    private $IdHuerto;

    /**
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="huertoProducto")
     */
    private $IdProducto;

    public function __construct()
    {
        $this->IdHuerto = new ArrayCollection();
        $this->IdProducto = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function addIdHuerto(Huerto $idHuerto): self
    {
        if (!$this->IdHuerto->contains($idHuerto)) {
            $this->IdHuerto[] = $idHuerto;
            $idHuerto->setHuertoProducto($this);
        }

        return $this;
    }

    public function removeIdHuerto(Huerto $idHuerto): self
    {
        if ($this->IdHuerto->removeElement($idHuerto)) {
            // set the owning side to null (unless already changed)
            if ($idHuerto->getHuertoProducto() === $this) {
                $idHuerto->setHuertoProducto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Producto[]
     */
    public function getIdProducto(): Collection
    {
        return $this->IdProducto;
    }

    public function addIdProducto(Producto $idProducto): self
    {
        if (!$this->IdProducto->contains($idProducto)) {
            $this->IdProducto[] = $idProducto;
            $idProducto->setHuertoProducto($this);
        }

        return $this;
    }

    public function removeIdProducto(Producto $idProducto): self
    {
        if ($this->IdProducto->removeElement($idProducto)) {
            // set the owning side to null (unless already changed)
            if ($idProducto->getHuertoProducto() === $this) {
                $idProducto->setHuertoProducto(null);
            }
        }

        return $this;
    }
}
