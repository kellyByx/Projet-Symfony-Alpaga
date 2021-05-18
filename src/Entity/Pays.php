<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Ville::class, mappedBy="pays")
     */
    private $villes;

    /**
     * @ORM\OneToMany(targetEntity=AnnonceVisites::class, mappedBy="pays")
     */
    private $dsPays;



    public function __construct()
    {
        $this->contient = new ArrayCollection();
        $this->villes = new ArrayCollection();
        $this->dsPays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Ville[]
     */
    public function getVilles(): Collection
    {
        return $this->villes;
    }

    public function addVille(Ville $ville): self
    {
        if (!$this->villes->contains($ville)) {
            $this->villes[] = $ville;
            $ville->setPays($this);
        }

        return $this;
    }

    public function removeVille(Ville $ville): self
    {
        if ($this->villes->removeElement($ville)) {
            // set the owning side to null (unless already changed)
            if ($ville->getPays() === $this) {
                $ville->setPays(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnnonceVisites[]
     */
    public function getDsPays(): Collection
    {
        return $this->dsPays;
    }

    public function addDsPay(AnnonceVisites $dsPay): self
    {
        if (!$this->dsPays->contains($dsPay)) {
            $this->dsPays[] = $dsPay;
            $dsPay->setPays($this);
        }

        return $this;
    }

    public function removeDsPay(AnnonceVisites $dsPay): self
    {
        if ($this->dsPays->removeElement($dsPay)) {
            // set the owning side to null (unless already changed)
            if ($dsPay->getPays() === $this) {
                $dsPay->setPays(null);
            }
        }

        return $this;
    }

   
}
